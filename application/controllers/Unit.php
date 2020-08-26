<?php
class Unit extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Unit_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } 
        else{
            $data['title'] = 'Data Aset PLN Area Bandung - OK RAB';
            $data['unit'] = $this->Unit_model->getAllUnit();
            $data['hitungTotal']=$this->Unit_model->hitungTotal();
            $data['hitungTotalPrinter']=$this->Unit_model->hitungTotalPrinter();
            if ($this->input->post('keyword')){
                $data['unit'] = $this->Unit_model->cariDataUnit();
            }
            if ($this->session->login['role_id'] == 1) {
                $this->load->view('templates/headeradmin', $data);
            } else {
                $this->load->view('templates/header', $data);
            }
            $this->load->view('show_unit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } 
        else {
            $data['title'] = 'Tambah Data Aset';
            $this->form_validation->set_rules('nama','Unit / Bagian', 'required|trim|is_unique[unit.nama_unit]', ["required" => "%s wajib diisi.", "is_unique" => "%s tersebut sudah terdaftar."]);
            $this->form_validation->set_rules('alamat','Alamat', 'required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('no_telepon','Nomor Telepon','required|trim', ["required" => "Jumlah %s wajib diisi."]);
            $this->form_validation->set_rules('pc','PC','required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('printer','Printer','required|trim', ["required" => "Jumlah %s wajib diisi."]);
            if($this->form_validation->run() == FALSE){
                if ($this->session->login['role_id'] == 1) {
                    $this->load->view('templates/headeradmin', $data);
                } else {
                    $this->load->view('templates/header', $data);
                }
                $this->load->view('show_tambah_unit', $data);
                $this->load->view('templates/footer');
            }else{
                $data['unit'] = $this->Unit_model->tambahDataUnit();
                $this->session->set_flashdata('flash', 'ditambahkan.');
                redirect('Unit/index');
            }
        }
    }

    public function hapus($id_unit)
    {
        if(!isset($id_unit)){
            show_404();
        }
        if($this->Unit_model->hapusDataUnit($id_unit)){
            $this->session->set_flashdata('flash', 'dihapus.');
            redirect('Unit/index');
        }
    }

    public function ubah($id_unit)
    {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } 
        else{
            $data['title'] = 'Ubah Data Aset';
            $data['unit'] = $this->Unit_model->getUnitById($id_unit);
            if ($data['unit']['nama_unit'] != $this->input->post('nama', true)) {
                $this->form_validation->set_rules('nama','Unit / Bagian', 'required|trim|is_unique[unit.nama_unit]', ["required" => "%s wajib diisi.", "is_unique" => "%s tersebut sudah terdaftar."]);
            }
            $this->form_validation->set_rules('alamat','Alamat', 'required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('no_telepon','Nomor Telepon','required|trim', ["required" => "%s wajib diisi."]);
            $this->form_validation->set_rules('pc','PC','required|trim', ["required" => "Jumlah %s wajib diisi."]);
            $this->form_validation->set_rules('printer','Printer','required|trim', ["required" => "Jumlah %s wajib diisi."]);

            if($this->form_validation->run() == FALSE){
                if ($this->session->login['role_id'] == 1) {
                    $this->load->view('templates/headeradmin', $data);
                } else {
                    $this->load->view('templates/header', $data);
                }
                $this->load->view('show_ubah_unit', $data);
                $this->load->view('templates/footer');
            }else{
                $this->Unit_model->ubahDataUnit($id_unit);
                $this->session->set_flashdata('flash', 'diubah.');
                redirect('Unit/index');
            }
        }
    }
    
}
?>
