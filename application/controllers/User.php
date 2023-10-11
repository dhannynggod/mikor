<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            'title' => "Data Pengguna",
            'page' => "Data Pengguna",
            'user' => $this->M_Admin->get_table('user')
        );
        $this->load->view('user/data-pengguna', $data);
    }

    public function tambah()
    {
        $data = array(
            'title' => "Tambah User",
            'page' => "Tambah User"
        );
        $this->load->view('user/tambah', $data);
    }

    public function add()
    {
        // format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
        $id = $this->M_Admin->buat_kode('user', 'AG', 'id_login', 'ORDER BY id_login DESC LIMIT 1');
        $nama = htmlentities($this->input->post('nama', TRUE));
        $username = htmlentities($this->input->post('username', TRUE));
        $password = md5(htmlentities($this->input->post('password', TRUE)));
        $level = htmlentities($this->input->post('level', TRUE));
        $jenkel = htmlentities($this->input->post('jenkel', TRUE));
        $telepon = htmlentities($this->input->post('telepon', TRUE));
        $nip = htmlentities($this->input->post('nip', TRUE));
        $alamat = htmlentities($this->input->post('alamat', TRUE));
        $email = $_POST['email'];

        $dd = $this->db->query("SELECT * FROM user WHERE username = '$username' OR email = '$email'");
        if ($dd->num_rows() > 0) {
            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Gagal Update User : ' . $nama . ' !, Username / Email Anda Sudah Terpakai</p>
			</div></div>');
            redirect(base_url('user/tambah'));
        } else {
            // setting konfigurasi upload
            $nmfile = "user_" . time();
            $config['upload_path'] = './uploads/file/';
            $config['max_size'] = '2048';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('foto');
            $result1 = $this->upload->data();
            $result = array('foto' => $result1);
            $data1 = array('upload_data' => $this->upload->data());
            $data = array(
                'id_anggota' => $id,
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'level' => $level,
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'level' => $level,
                'email' => $_POST['email'],
                'telepon' => $telepon,
                'foto' => $data1['upload_data']['file_name'],
                'jenkel' => $jenkel,
                'nip' => $nip,
                'alamat' => $alamat,
                'tgl_gabung' => date('Y-m-d')
            );
            $this->db->insert('user', $data);

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Daftar User telah berhasil !</p>
            </div></div>');
            redirect(base_url('user'));
        }
    }

    public function detail()
    {
        $data = array(
            'title' => "Detail Anggota",
            'page' => "Detail Anggota",
            'user' => $this->M_Admin->get_tableid_edit('user', 'id_login', $this->uri->segment('3'))
        );
        $this->load->view('user/detail', $data);
    }

    public function edit()
    {
        $data = array(
            'title' => "Edit User",
            'page' => "Edit User",
            'user' => $this->M_Admin->get_tableid_edit('user', 'id_login', $this->uri->segment('3'))
        );
        $this->load->view('user/edit', $data);
    }

    public function update()
    {
        $nama = htmlentities($this->input->post('nama', TRUE));
        $user = htmlentities($this->input->post('username', TRUE));
        $pass = htmlentities($this->input->post('password'));
        $level = htmlentities($this->input->post('level', TRUE));
        $jenkel = htmlentities($this->input->post('jenkel', TRUE));
        $telepon = htmlentities($this->input->post('telepon', TRUE));
        $alamat = htmlentities($this->input->post('alamat', TRUE));
        $nip = htmlentities($this->input->post('nip', TRUE));
        $id_login = htmlentities($this->input->post('id_login', TRUE));

        // setting konfigurasi upload
        $nmfile = "user_" . time();
        $config['upload_path'] = './uploads/file/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1

        if (!$this->upload->do_upload('foto')) {
            if ($this->input->post('password') !== '') {
                $data = array(
                    'nama' => $nama,
                    'username' => $user,
                    'password' => md5($pass),
                    'tempat_lahir' => $_POST['tempat_lahir'],
                    'tgl_lahir' => $_POST['tgl_lahir'],
                    'level' => $level,
                    'email' => $_POST['email'],
                    'telepon' => $telepon,
                    'nip' => $nip,
                    'jenkel' => $jenkel,
                    'alamat' => $alamat,
                );
                $this->M_Admin->update_table('user', 'id_login', $id_login, $data);
                redirect('user/index');
            } else {
                $data = array(
                    'nama' => $nama,
                    'username' => $user,
                    'tempat_lahir' => $_POST['tempat_lahir'],
                    'tgl_lahir' => $_POST['tgl_lahir'],
                    'level' => $level,
                    'email' => $_POST['email'],
                    'telepon' => $telepon,
                    'nip' => $nip,
                    'jenkel' => $jenkel,
                    'alamat' => $alamat,
                );
                $this->M_Admin->update_table('user', 'id_login', $id_login, $data);
                redirect('user/index');
            }
        } else {
            $result1 = $this->upload->data();
            $result = array('foto' => $result1);
            $data1 = array('upload_data' => $this->upload->data());
            unlink('./uploads/file/' . $this->input->post('foto'));
            if ($this->input->post('password') !== '') {
                $data = array(
                    'nama' => $nama,
                    'username' => $user,
                    'tempat_lahir' => $_POST['tempat_lahir'],
                    'tgl_lahir' => $_POST['tgl_lahir'],
                    'password' => md5($pass),
                    'level' => $level,
                    'email' => $_POST['email'],
                    'telepon' => $telepon,
                    'nip' => $nip,
                    'foto' => $data1['upload_data']['file_name'],
                    'jenkel' => $jenkel,
                    'alamat' => $alamat
                );
                $this->M_Admin->update_table('user', 'id_login', $id_login, $data);
            } else {
                $data = array(
                    'nama' => $nama,
                    'username' => $user,
                    'tempat_lahir' => $_POST['tempat_lahir'],
                    'tgl_lahir' => $_POST['tgl_lahir'],
                    'level' => $level,
                    'email' => $_POST['email'],
                    'telepon' => $telepon,
                    'nip' => $nip,
                    'foto' => $data1['upload_data']['file_name'],
                    'jenkel' => $jenkel,
                    'alamat' => $alamat
                );
                $this->M_Admin->update_table('user', 'id_login', $id_login, $data);
                redirect('user/index');
            }
        }
    }

    public function del()
    {
        if ($this->uri->segment('3') == '') {
            echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('user') . '";</script>';
        }

        $user = $this->M_Admin->get_tableid_edit('user', 'id_login', $this->uri->segment('3'));
        unlink('./uploads/file/' . $user->foto);
        $this->M_Admin->delete_table('user', 'id_login', $this->uri->segment('3'));

        $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus User !</p>
		</div></div>');
        redirect(base_url('user'));
    }
}
