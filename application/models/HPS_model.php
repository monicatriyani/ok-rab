<?php
class HPS_model extends CI_Model
{
    public function getAllBarang() 
    {
        $data = $this->db->get('barang');
        return $data->result_array();
    }

    public function getBarangById($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->row_array();
    }
    public function ubahDataBarang($id_barang)
    {
        $data =[
            "harga_satuan" => $this->input->post('harga_satuan',true),
        ];
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
    }  
}
?>