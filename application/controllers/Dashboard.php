<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
            'title' => "Dashboard",
            'page' => "Dashboard"
        );
        $this->load->view('dashboard/dashboard', $data);
    }
}
