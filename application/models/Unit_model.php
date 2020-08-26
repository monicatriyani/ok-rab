<?php
class Unit_model extends CI_Model
{
    public function getAllUnit() 
    {
        $data = $this->db->get('unit');
        return $data->result_array();
    }

    public function tambahDataUnit()
    {
        $data = [
            "nama_unit" => $this->input->post('nama',true),
            "alamat" => $this->input->post('alamat',true),
            "no_telepon" => $this->input->post('no_telepon',true),
            "pc" => $this->input->post('pc',true),
            "printer" =>$this->input->post('printer',true),
        ];
        return $this->db->insert('unit', $data);
    }

    public function hapusDataUnit($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        return $this->db->delete('unit');
    }

    public function getUnitById($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        return $this->db->get('unit')->row_array();
    }

    public function ubahDataUnit($id_unit)
    {
        $data =[
            "nama_unit" => $this->input->post('nama',true),
            "alamat" => $this->input->post('alamat',true),
            "no_telepon" => $this->input->post('no_telepon',true),
            "pc" => $this->input->post('pc', true),
            "printer" =>$this->input->post('printer',true),
        ];
        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', $data);
    }

    public function cariDataUnit()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('nama_unit', $keyword);
        $query = $this->db->get('unit');
        return $query->result_array();
        $this->session->set_flashdata('flash', 'Data telah ditemukan.');
    }
    
    public function hitungTotal()
    {
        return $this->db->query("SELECT SUM(pc) AS jumlah FROM unit")->row_array();

    }
    public function hitungTotalPrinter()
    {
        return $this->db->query("SELECT SUM(printer) AS jml FROM unit")->row_array();
    }

}
?>