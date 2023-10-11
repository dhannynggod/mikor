<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login

        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Admin');
        $this->load->library(array('cart'));
        if ($this->session->userdata('status') != "Logged") {
?>
            <script type="text/javascript">
                alert('Anda tidak berhak mengakses halaman ini!');
                window.location = '<?php echo base_url("Login/home"); ?>'
            </script>
        <?php
        }
    }
    public function index()
    {
        $data = array(
            'title' => "Peminjaman",
            'page' => "Peminjaman",
            'pinjam' => $this->db->query("SELECT DISTINCT `pinjam_id`, `id_anggota`, 
            `status`, `tgl_pinjam`, `tgl_kembali` 
            FROM pinjam WHERE status = 'Dipinjam' ORDER BY pinjam_id DESC")
        );
        $this->load->view('transaksi/peminjaman', $data);
    }
    public function proses_pinjam()
    {
        $post = $this->input->post();

        if (!empty($post['tambah'])) {

            $hasil_cart = array_values(unserialize($this->session->userdata('cart')));
            foreach ($hasil_cart as $isi) {
                $data[] = array(
                    'pinjam_id' => htmlentities($post['nopinjam']),
                    'id_anggota' => htmlentities($post['id_anggota']),
                    'barang_id' => $isi['id'],
                    'status' => 'Dipinjam',
                    'tgl_pinjam' => htmlentities($post['tgl']),
                    'tgl_kembali'  => '0',
                    'nama_pelanggan' => htmlentities($post['nama_pelanggan']),
                    'alamat_pelanggan' => htmlentities($post['alamat_pelanggan']),
                    'no_inet' => htmlentities($post['no_inet']),
                    'lok_pasang' => htmlentities($post['lok_pasang']),
                    'alasan_pasang' => htmlentities($post['alasan_pasang']),
                    'no_tiket' => htmlentities($post['no_tiket']),
                    'no_pelanggan' => htmlentities($post['no_pelanggan'])
                );
            }
            $total_array = count($data);
            if ($total_array != 0) {
                $this->db->insert_batch('pinjam', $data);

                $cart = array_values(unserialize($this->session->userdata('cart')));
                for ($i = 0; $i < count($cart); $i++) {
                    unset($cart[$i]);
                    // $this->session->unset_userdata($cart[$i]);
                    // $this->session->unset_userdata('cart');
                }
            }
            redirect(base_url('transaksi'));
        }

        if ($this->input->get('pinjam_id')) {
            $this->M_Admin->delete_table('pinjam', 'pinjam_id', $this->input->get('pinjam_id'));

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p>  Hapus Transaksi Pinjam Buku Sukses !</p>
			</div></div>');
            redirect(base_url('transaksi'));
        }

        if ($this->input->get('kembali')) {

            $data = array(
                'status' => 'Di Kembalikan',
                'tgl_kembali'  => date('Y-m-d H:i:s'),
            );

            $total_array = count($data);
            if ($total_array != 0) {
                $this->db->where('pinjam_id', $this->input->get('kembali'));
                $this->db->update('pinjam', $data);
            }
            redirect(base_url('transaksi'));
        }
    }
    public function kembali()
    {
        $data = array(
            'title' => "Data Pengembalian",
            'page' => "Data Pengembalian",
            'pinjam' => $this->db->query("SELECT DISTINCT `pinjam_id`, `id_anggota`, 
            `status`, `tgl_pinjam`, `tgl_kembali` 
            FROM pinjam WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC")
        );
        $this->load->view('kembali/pengembalian', $data);
    }
    public function kembalipinjam()
    {
        $id = $this->uri->segment('3');
        $data = array(
            'title' => "Data Pengembalian",
            'page' => "Data Pengembalian",
            'pinjam' => $this->db->query("SELECT DISTINCT `pinjam_id`, 
			`id_anggota`, `status`, 
			`tgl_pinjam`, 
			`tgl_kembali`, `nama_pelanggan`,`alamat_pelanggan`,`no_inet`,`lok_pasang`,`alasan_pasang`,`no_tiket`,`no_pelanggan`
			FROM pinjam WHERE pinjam_id = '$id'")->row()
        );
        $this->load->view('transaksi/kembali', $data);
    }

    public function detail_kembali()
    {
        $id = $this->uri->segment('3');
        $data = array(
            'title' => "Data Pengembalian",
            'page' => "Data Pengembalian",
            'pinjam' => $this->db->query("SELECT DISTINCT `pinjam_id`, 
			`id_anggota`, `status`, 
			`tgl_pinjam`, 
			`tgl_kembali`, `nama_pelanggan`,`alamat_pelanggan`,`no_inet`,`lok_pasang`,`alasan_pasang`,`no_tiket`,`no_pelanggan` 
			FROM pinjam WHERE pinjam_id = '$id'")->row()
        );
        $this->load->view('transaksi/detail-kembali', $data);
    }

    public function berita_acara()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $id = $this->uri->segment('3');
        $data = array(
            'title' => "Data Pengembalian",
            'page' => "Data Pengembalian",
            'pinjam' => $this->db->query("SELECT DISTINCT `pinjam_id`, `barang_id`, 
			`id_anggota`, `status`, 
			`tgl_pinjam`, `tgl_kembali`, `nama_pelanggan`, `alamat_pelanggan`, `no_inet`, `lok_pasang`, `alasan_pasang`
			FROM pinjam WHERE pinjam_id = '$id'")->row()
        );
        $this->load->view('transaksi/berita_acara', $data);
        $html = $this->output->get_output();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Berita_Acara.pdf');
    }

    public function result()
    {
        $user = $this->M_Admin->get_tableid_edit('user', 'nip', $this->input->post('kode_anggota'));
        error_reporting(0);
        if ($user->nama != null) {
            echo '<table class="table table-striped">
						<tr>
							<td>Nama Anggota</td>
							<td>:</td>
							<td>' . $user->nama . '</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>' . $user->telepon . '</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>:</td>
							<td>' . $user->email . '</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>' . $user->alamat . '</td>
						</tr>
						<tr>
							<td>Level</td>
							<td>:</td>
							<td>' . $user->level . '</td>
						</tr>
					</table>';
        } else {
            echo 'Anggota Tidak Ditemukan !';
        }
    }
    public function barang()
    {
        $id = $this->input->post('kode_barang');
        $row = $this->db->query("SELECT * FROM barang WHERE label ='$id'");

        if ($row->num_rows() > 0) {
            $tes = $row->row();
            $item = array(
                'id'      => $id,
                'qty'     => 1,
                'name'    => $tes->nama_barang,
                'options' => array('label' => $tes->label)
            );
            if (!$this->session->has_userdata('cart')) {
                $cart = array($item);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $index = $this->exists($id);
                $cart = array_values(unserialize($this->session->userdata('cart')));
                if ($index == -1) {
                    array_push($cart, $item);
                    $this->session->set_userdata('cart', serialize($cart));
                } else {
                    $cart[$index]['quantity']++;
                    $this->session->set_userdata('cart', serialize($cart));
                }
            }
        } else {
        }
    }
    public function barang_list()
    {
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Label</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach (array_values(unserialize($this->session->userdata('cart'))) as $items) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $items['name']; ?></td>
                        <td><?= $items['options']['label']; ?></td>
                        <td style="width:17%">
                            <a href="javascript:void(0)" id="delete_barang<?= $no; ?>" data_<?= $no; ?>="<?= $items['id']; ?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <script>
                        $(document).ready(function() {
                            $("#delete_barang<?= $no; ?>").click(function(e) {
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('transaksi/del_cart'); ?>",
                                    data: 'kode_barang=' + $(this).attr("data_<?= $no; ?>"),
                                    beforeSend: function() {},
                                    success: function(html) {
                                        $("#tampil").html(html);
                                    }
                                });
                            });
                        });
                    </script>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <?php foreach (array_values(unserialize($this->session->userdata('cart'))) as $items) { ?>
            <input type="hidden" value="<?= $items['id']; ?>" name="idbarang[]">
        <?php } ?>
        <div id="tampil"></div>
<?php
    }
    public function del_cart()
    {
        error_reporting(0);
        $id = $this->input->post('label');
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        // redirect('jual/tambah');
        echo '<script>$("#result_barang").load("' . base_url('transaksi/barang_list') . '");</script>';
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['label'] == $id) {
                return $i;
            }
        }
        return -1;
    }
    public function pinjam()
    {
        $data = array(
            'title' => "Peminjaman",
            'page' => "Peminjaman",
            'user' => $this->M_Admin->get_table('user'),
            'nop' => $this->M_Admin->buat_kode('pinjam', 'PJ', 'id_pinjam', 'ORDER BY id_pinjam DESC LIMIT 1'),
            'barang' => $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC")
        );
        $this->load->view('transaksi/tambah', $data);
    }

    public function export()
	{
		date_default_timezone_set("Asia/Jakarta");
		$data =  $this->M_Admin->getAll();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama Pelanggan');
		$sheet->setCellValue('C1', 'No Internet');
		$sheet->setCellValue('D1', 'No Tiket');
		$sheet->setCellValue('E1', 'PIC Pelanggan');
		$sheet->setCellValue('F1', 'No Label Mikor');
		$sheet->setCellValue('G1', 'Tanggal Pinjam');
        $sheet->setCellValue('H1', 'Tanggal Kembali');
        $sheet->setCellValue('I1', 'Status');

		$column = 2;
		foreach ($data as $key => $value) {
			$sheet->setCellValue('A' . $column, ($column - 1));
			$sheet->setCellValue('B' . $column, ($value->nama_pelanggan));
			$sheet->setCellValue('C' . $column, ($value->no_inet));
			$sheet->setCellValue('D' . $column, ($value->no_tiket));
			$sheet->setCellValue('E' . $column, ($value->no_pelanggan));
			$sheet->setCellValue('F' . $column, ($value->barang_id));
			$sheet->setCellValue('G' . $column, ($value->tgl_pinjam));
            $sheet->setCellValue('H' . $column, ($value->tgl_kembali));
			$sheet->setCellValue('I' . $column, ($value->status));
			$column++;
		}

		$sheet->getStyle('A1:I1')->getFont()->setBold(true);
		$sheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF00');

		$styleArray = ['borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['argb' => 'FF000000'],],],];
		$sheet->getStyle('A1:I'.($column-1))->applyFromArray($styleArray);

		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);

		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="MIKOR_' . date('d-m-Y H:i') . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
		exit();
	}
}
