<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login

        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Admin');
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
            'title' => "List Barang",
            'page' => "List Barang",
            'barang' => $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC")
        );

        $this->load->view('barang/list-barang', $data);
    }

    public function tambah_barang()
    {
        $data = array(
            'title' => "Tambah Barang",
            'page' => "Tambah Barang",
            'kats' => $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC")->result_array()
        );

        $this->load->view('barang/tambah', $data);
    }

    public function detail()
    {
        $data = array(
            'title' => "Detail Barang",
            'page' => "Detail Barang",
            'barang' => $this->M_Admin->get_tableid_edit('barang', 'id_barang', $this->uri->segment('3')),
            'kats' => $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC")->result_array()
        );

        $this->load->view('barang/detail', $data);
    }

    public function edit_barang()
    {
        $data = array(
            'title' => "Edit Barang",
            'page' => "Edit Barang",
            'barang' => $this->M_Admin->get_tableid_edit('barang', 'id_barang', $this->uri->segment('3')),
            'kats' => $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC")->result_array()
        );

        $this->load->view('barang/edit', $data);
    }

    public function proses_barang()
    {
        if (!empty($this->input->get('barang_id'))) {

            $barang = $this->M_Admin->get_tableid_edit('barang', 'id_barang', htmlentities($this->input->get('barang_id')));

            $foto = './uploads/file/' . $barang->foto;
            if (file_exists($foto)) {
                unlink($foto);
            }

            $this->M_Admin->delete_table('barang', 'id_barang', $this->input->get('barang_id'));

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Berhasil Hapus Buku !</p>
			</div></div>');
            redirect(base_url('barang'));
        }
        if (!empty($this->input->post('tambah'))) {

            $post = $this->input->post();
            // setting konfigurasi upload
            $config['upload_path'] = './uploads/file/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc';
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            // load library upload
            $this->load->library('upload', $config);
            $barang_id = $this->M_Admin->buat_kode('barang', 'BK', 'id_barang', 'ORDER BY id_barang DESC LIMIT 1');

            // upload foto 1
            if (!empty($_FILES['foto']['name'])) {

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $this->upload->data();
                    $file1 = array('upload_data' => $this->upload->data());
                } else {
                    return false;
                }
                $data = array(
                    'barang_id' => $barang_id,
                    'id_kategori' => htmlentities($post['kategori']),
                    'serial_number' => htmlentities($post['serial_number']),
                    'foto' => $file1['upload_data']['file_name'],
                    'nama_barang'  => htmlentities($post['nama_barang']),
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'tipe'  => htmlentities($post['tipe']),
                    'no_daftar'  => htmlentities($post['no_daftar']),
                    'nama_daftar'  => htmlentities($post['nama_daftar']),
                    'email_daftar'  => htmlentities($post['email_daftar']),
                    'pass_daftar'  => htmlentities($post['pass_daftar'])
                );
            } elseif (!empty($_FILES['foto']['name'])) {
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $this->upload->data();
                    $file1 = array('upload_data' => $this->upload->data());
                } else {
                    return false;
                }
                $data = array(
                    'barang_id' => $barang_id,
                    'id_kategori' => htmlentities($post['kategori']),
                    'serial_number' => htmlentities($post['serial_number']),
                    'foto' => $file1['upload_data']['file_name'],
                    'nama_barang'  => htmlentities($post['nama_barang']),
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'tipe'  => htmlentities($post['tipe']),
                    'label'  => htmlentities($post['label']),
                    'no_daftar'  => htmlentities($post['no_daftar']),
                    'nama_daftar'  => htmlentities($post['nama_daftar']),
                    'email_daftar'  => htmlentities($post['email_daftar']),
                    'pass_daftar'  => htmlentities($post['pass_daftar'])
                );
            } else {
                $data = array(
                    'barang_id' => $barang_id,
                    'id_kategori' => htmlentities($post['kategori']),
                    'serial_number' => htmlentities($post['serial_number']),
                    'foto' => '0',
                    'nama_barang'  => htmlentities($post['nama_barang']),
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'tipe'  => htmlentities($post['tipe']),
                    'label'  => htmlentities($post['label']),
                    'no_daftar'  => htmlentities($post['no_daftar']),
                    'nama_daftar'  => htmlentities($post['nama_daftar']),
                    'email_daftar'  => htmlentities($post['email_daftar']),
                    'pass_daftar'  => htmlentities($post['pass_daftar'])
                );
            }
            $this->db->insert('barang', $data);
            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Buku Sukses !</p>
			</div></div>');
            redirect(base_url('barang'));
        }
        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            // setting konfigurasi upload
            $config['upload_path'] = './uploads/file/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            // load library upload
            $this->load->library('upload', $config);
            // upload foto 1
            if (!empty($_FILES['foto']['name'])) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $this->upload->data();
                    $file1 = array('upload_data' => $this->upload->data());
                } else {
                    return false;
                }
                $foto = './uploads/file/' . htmlentities($post['fotoo']);
                if (file_exists($foto)) {
                    unlink($foto);
                }

                $data = array(
                    'id_kategori' => htmlentities($post['kategori']),
                    'serial_number' => htmlentities($post['serial_number']),
                    'foto' => $file1['upload_data']['file_name'],
                    'nama_barang'  => htmlentities($post['nama_barang']),
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'tipe'  => htmlentities($post['tipe']),
                    'label'  => htmlentities($post['label']),
                    'no_daftar'  => htmlentities($post['no_daftar']),
                    'nama_daftar'  => htmlentities($post['nama_daftar']),
                    'email_daftar'  => htmlentities($post['email_daftar']),
                    'pass_daftar'  => htmlentities($post['pass_daftar'])
                );
            } elseif (!empty($_FILES['foto']['name'])) {
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $this->upload->data();
                    $file1 = array('upload_data' => $this->upload->data());
                } else {
                    return false;
                }

                $foto = './uploads/file/' . htmlentities($post['fotoo']);
                if (file_exists($foto)) {
                    unlink($foto);
                }

                $data = array(
                    'id_kategori' => htmlentities($post['kategori']),
                    'serial_number' => htmlentities($post['serial_number']),
                    'foto' => $file1['upload_data']['file_name'],
                    'nama_barang'  => htmlentities($post['nama_barang']),
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'tipe'  => htmlentities($post['tipe']),
                    'label'  => htmlentities($post['label']),
                    'no_daftar'  => htmlentities($post['no_daftar']),
                    'nama_daftar'  => htmlentities($post['nama_daftar']),
                    'email_daftar'  => htmlentities($post['email_daftar']),
                    'pass_daftar'  => htmlentities($post['pass_daftar'])
                );
            } else {
                $data = array(
                    'id_kategori' => htmlentities($post['kategori']),
                    'serial_number' => htmlentities($post['serial_number']),
                    'foto' => '0',
                    'nama_barang'  => htmlentities($post['nama_barang']),
                    'tgl_masuk' => date('Y-m-d H:i:s'),
                    'tipe'  => htmlentities($post['tipe']),
                    'label'  => htmlentities($post['label']),
                    'no_daftar'  => htmlentities($post['no_daftar']),
                    'nama_daftar'  => htmlentities($post['nama_daftar']),
                    'email_daftar'  => htmlentities($post['email_daftar']),
                    'pass_daftar'  => htmlentities($post['pass_daftar'])
                );
            }

            $this->db->where('id_barang', htmlentities($post['edit']));
            $this->db->update('barang', $data);

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Buku Sukses !</p>
			</div></div>');
            redirect(base_url('barang'));
        }
    }
    public function kategori()
    {
        $data = array(
            'title' => "Kategori",
            'page' => "Kategori",
            'kategori' => $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC"),
            'kat' => $this->db->query("SELECT *FROM kategori WHERE id_kategori")->row()
        );
        $this->load->view('kategori/kategori', $data);
    }

    public function katproses()
    {
        if (!empty($this->input->post('tambah'))) {
            $post = $this->input->post();
            $data = array(
                'nama_kategori' => htmlentities($post['kategori']),
            );

            $this->db->insert('kategori', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Kategori Sukses !</p>
			</div></div>');
            redirect(base_url('barang/kategori'));
        }

        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $data = array(
                'nama_kategori' => htmlentities($post['kategori']),
            );
            $this->db->where('id_kategori', htmlentities($post['edit']));
            $this->db->update('kategori', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Kategori Sukses !</p>
			</div></div>');
            redirect(base_url('barang/kategori'));
        }

        if (!empty($this->input->get('kat_id'))) {
            $this->db->where('id_kategori', $this->input->get('kat_id'));
            $this->db->delete('kategori');

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Kategori Sukses !</p>
			</div></div>');
            redirect(base_url('barang/kategori'));
        }
    }
}
