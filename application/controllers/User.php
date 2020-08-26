<?php
class User extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
	public function index()
	{
        $data['title'] = 'OK RAB - PT PLN (Persero)';
        $this->load->view('halaman_utama', $data);
        $this->load->view('templates/footer');
    }
    public function home() {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } else{
            $data['title'] = 'Home - OK RAB';
            $cek = $this->User_model->login();
            $data['user'] = $cek['nama_user'];
            if ($this->session->login['role_id'] == 1) {
                $this->load->view('templates/headeradmin', $data);
            }
            else {
                $this->load->view('templates/header', $data);
            }
            $data['user']= $this->User_model->getuserbynip($this->session->login['nip']);
            $this->load->view('home', $data);
            $this->load->view('templates/footer');
        }
    }

    public function log_in()
    {
            $this->form_validation->set_rules('nip','NIP','required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('password','Password','required|trim', ["required" => "%s wajib diisi."]);
            if($this->form_validation->run() == FALSE){
                $data['title'] = 'Login - OK RAB';
                $this->load->view('login', $data);
            }else{
                $cek = $this->User_model->login();
                $password = $this->input->post("password",true);
                if(password_verify($password, $cek["password"])){
                    $nip = $this->input->post('nip');
                    $password = $this->input->post('password');
        
                    $login = [
                        'nip' => $nip,
                        'password' => $password,
                        'email' => $cek['email'],
                        'role_id' => $cek['role_id'],
                    ];
                    $this->session->set_userdata('login', $login);
                    redirect('User/home');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">NIP atau password Anda salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/log_in');
                }
            }
    }

    public function tambah_user()
    {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        }
        else{
            $this->form_validation->set_rules('nip','NIP','required|trim|is_unique[user.nip]', ["required" => "%s wajib diisi.", "is_unique" => "Akun yang menggunakan %s ini sudah terdaftar."]);
            $this->form_validation->set_rules('nama','Nama Lengkap','required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('password','Password','required|trim|min_length[6]', ["required" => "%s wajib diisi.", "min_length" => "%s minimal 6 karakter."]);
            $this->form_validation->set_rules('email','Email','required|trim|is_unique[user.email]', ["required" => "%s wajib diisi.", "is_unique" => "Akun yang menggunakan %s ini sudah terdaftar."]);
            $this->form_validation->set_rules('alamat','Alamat','required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('no_telepon','Nomor Telepon','required|trim', ["required" => "%s wajib diisi."]);
            if($this->form_validation->run() == FALSE){
                $data['title'] = 'Tambah Pengguna - OK RAB';
                $this->load->view('templates/headeradmin', $data);
                $this->load->view('register', $data);
                $this->load->view('templates/footer');
            }else{
                $this->User_model->addUser();
                $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">Data pengguna berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/Kelolapengguna');
            }
        }
        
    }
    public function Signout(){
        $this->session->unset_userdata('login');
        $this->session->sess_destroy();
        redirect('User/index');
    }
    
    public function editprofile(){
        if ($this->session->has_userdata('login')) {
            $data["title"] = "Ubah Profil - OK RAB";
            $data["user"] = $this->User_model->getuserbynip($this->session->login['nip']);
            $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('alamat', 'Alamat','required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('notelepon', 'No.Telepon', 'required|trim', ["required" => "%s wajib diisi."]);
            if ($this->session->login['email'] != $this->input->post('email', true)) {
                $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', ["required" => "%s wajib diisi.", "is_unique" => "Akun yang menggunakan %s tersebut sudah terdaftar."]);
            }
            if ($this->form_validation->run() == FALSE) {
                if ($this->session->login['role_id'] == 1) {
                    $this->load->view('templates/headeradmin', $data);
                } else {
                    $this->load->view('templates/header', $data);
                }
                $this->load->view('EditProfile', $data);
                $this->load->view('templates/footer');
            }else{
                $update = [
                    "nip" => $this->session->login['nip'],
                    "password" => $this->input->post("passwordbaru", true),
                    "email" => $this->input->post('email',true),
                    "role_id" => $this->session->login['role_id'],
                ];
                $this->User_model->ubahDataProfil($this->session->login['nip']);
                $this->session->unset_userdata('login');
                $this->session->set_userdata('login', $update);
                $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">Profil Anda berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('User/home');

            }
        }else{
            redirect('User/index');
        }
    }

    public function ubahpassword(){
        $data["title"] = 'Ubah Password - OK RAB';
        $data["user"] = $this->User_model->getuserbynip($this->session->login['nip']);
        if ($this->session->has_userdata('login')) {
            $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim|min_length[6]', ["required" => "%s wajib diisi.", "min_length" => "%s minimal 6 karakter."]);
            $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim|min_length[6]', ["required" => "%s wajib diisi.", "min_length" => "%s minimal 6 karakter."]);
            $this->form_validation->set_rules('konfirmasipasswordbaru', 'Konfirmasi Password Baru', 'required|matches[passwordbaru]', ["required" => "%s wajib diisi.", "matches" => "%s yang Anda masukkan tidak sama dengan Password Baru."]);
            if ($this->form_validation->run() == FALSE) {
                if ($this->session->login['role_id'] == 1){
                    $this->load->view('templates/headeradmin', $data);
                } else {
                    $this->load->view('templates/header', $data);
                }
                $this->load->view('Ubahpassword', $data);
                $this->load->view('templates/footer');
            }else{
                $passwordlama = $this->input->post('passwordlama',true);
                $passwordbaru = $this->input->post('passwordbaru',true);
                if (!password_verify($passwordlama, $data['user']['password'])) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">Password yang Anda masukkan salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/Ubahpassword');
                }else{
                    if($passwordlama == $passwordbaru){
                        $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">Password baru tidak boleh sama dengan password lama.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/Ubahpassword');
                    }else{
                        $update =  [
                            "nip" => $this->session->login['nip'],
                            "password" => $this->input->post("passwordbaru", true),
                            "email" => $this->session->login['email'],
                            "role_id" => $this->session->login['role_id'],
                        ];
                        $this->User_model->ubahDataPassword($this->session->login['nip']);
                        $this->session->unset_userdata('login');
                        $this->session->set_userdata('login', $update);
                        $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">Password Anda berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('User/home');
                    }     
                }
            }
        }else{
            redirect('User/index');
        }
    
    }
    public function Kelolapengguna(){
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } 
        else{
            $data['title'] = 'Data Pengguna Aplikasi - OK RAB';
            $data['user'] = $this->User_model->getAllUser();
            if ($this->input->post('keyword')){
                $data['user'] = $this->User_model->cariDataUser();
            }
            if ($this->session->login['role_id'] == 1) {
                $this->load->view('templates/headeradmin', $data);
            } else {
                $this->load->view('templates/header', $data);
            }
            $this->load->view('Tabel_user', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function hapuspengguna($nip)
    {
        if(!isset($nip)){
            show_404();
        }
        if($this->User_model->hapusDataUser($nip)){
            $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">Data pengguna berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/Kelolapengguna');
        }
    }
    public function resetpassword($nip)
    {
        if(!isset($nip)) {
            show_404();
        }
        if($this->User_model->resetPasswordUser($nip)){
            $this->session->set_flashdata('message', '<div class="alert alert-warning " role="alert">Password pengguna berhasil direset.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/Kelolapengguna');
        }
    }

}
?>
