<?php
class HPS extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('HPS_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Unit_model');
    }

    public function index()
    {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } 
        else {
            $data['title'] = 'Analisa HPS HAR PC dan Printer - OK RAB';
            $data['barangpc'] = $this->HPS_model->getBarangById('1');
            $data['barangprinter'] = $this->HPS_model->getBarangById('2');
            $data['totalpc'] = $this->Unit_model->hitungTotal();
            $data['totalprinter'] = $this->Unit_model->hitungTotalPrinter();
            if ($this->session->login['role_id'] == 1) {
                $this->load->view('templates/headeradmin', $data);
            } else {
                $this->load->view('templates/header', $data);
            }
            $this->load->view('show_HPS', $data);
            $this->load->view('templates/footer');
        }
    }

    public function printHPS()
    {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } 
        else {
            $data['title'] = 'Laporan RAB Pemeliharaan dan Perbaikan Komputer dan Printer - OK RAB';
            $data['barangpc'] = $this->HPS_model->getBarangById('1');
            $data['barangprinter'] = $this->HPS_model->getBarangById('2');
            $data['totalpc'] = $this->Unit_model->hitungTotal();
            $data['totalprinter'] = $this->Unit_model->hitungTotalPrinter();
            $this->load->view('print_HPS', $data);
        }
    }
    public function ubah_harga($id_barang)
    {
        if (empty($_SESSION['login'])) {//belum login
            redirect('User/index');
        } 
        else{
            $data['barang'] = $this->HPS_model->getBarangById($id_barang);

            $this->form_validation->set_rules('harga_satuan','Harga Baru', 'required|trim', ["required" => "%s wajib diisi."]);

            if($this->form_validation->run() == FALSE){
                if ($this->session->login['role_id'] == 1) {
                    $this->load->view('templates/headeradmin', $data);
                } else {
                    $this->load->view('templates/header', $data);
                }
                $this->load->view('Show_HPS', $data);
                $this->load->view('templates/footer');
            }else{
                $this->HPS_model->ubahDataBarang($id_barang);
                $this->session->set_flashdata('flash', 'diubah.');
                redirect('HPS/index');
            }
        }
    } 
    public function excel()
    {
        $data['barangpc'] = $this->HPS_model->getBarangById('1');
        $data['barangprinter'] = $this->HPS_model->getBarangById('2');
        $data['totalpc'] = $this->Unit_model->hitungTotal();
        $data['totalprinter'] = $this->Unit_model->hitungTotalPrinter();     

        $this->load->view('excel' , $data);

    }
}

?>
