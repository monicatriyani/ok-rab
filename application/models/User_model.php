<?php
class User_model extends CI_model 
{
    public function addUser()
    {
        $nip = $this->input->post('nip',true);
        $nama_user = $this->input->post('nama',true); 
        $password = $this->input->post('password',true);
        $email = $this->input->post('email',true);
        $alamat = $this->input->post('alamat',true);
        $no_telepon =  $this->input->post('no_telepon',true);
        $data = [
            "nip" => $nip,
            "nama_user" => $nama_user, 
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "email" => $email,
            "alamat" => $alamat,
            "no_telepon" => $no_telepon,
            "role_id" => 2,
        ];
        return $this->db->insert('user',$data);
    }
    public function login()
    {
        $data = [
            'nip' =>$this->input->post('nip',true),
        ];
        return $this->db->get_where('user', $data)->row_array();   
    }

    public function getuserbynip($nip)
    {
        $this->db->where('nip',$nip);
        return $this->db->get('user')->row_array();
    }
    public function cek_email($email)
    {
        $this->db->where('email',$email);
        return $this->db->get('user')->num_rows();
    }

    public function ubahDataPassword($nip){
        $data = [
            "password" => password_hash($this->input->post("passwordbaru", true), PASSWORD_DEFAULT),
        ];
        $this->db->where('nip', $nip);
        return $this->db->update('user', $data);        
    }
    public function ubahDataProfil($nip){
        $data = [
            "nama_user" => $this->input->post('nama_user',true),
            "email" => $this->input->post('email',true),
            "alamat" => $this->input->post('alamat',true),
            "no_telepon" => $this->input->post('notelepon',true),
        ];
        $this->db->where('nip',$nip);
        return $this->db->update('user',$data);
    }
    public function getAllUser() {
        $data = $this->db->get('user');
        return $data->result_array();
    }
    public function hapusDataUser($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->delete('user');
    }
    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword',true);
        $this->db->like('nama_user', $keyword);
        $query = $this->db->get('user');
        return $query->result_array();
        $this->session->set_flashdata('flash', 'Data telah ditemukan.');
    }
    public function resetPasswordUser($nip) {
        $data = [
            "password" => password_hash($nip, PASSWORD_DEFAULT),
        ];
        $this->db->where('nip', $nip);
        return $this->db->update('user', $data);
    }
}
?>