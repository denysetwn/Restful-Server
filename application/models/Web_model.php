<?php 

class Web_model extends CI_model {

    public function getAllMenu()
    {
        return $this->db->get('menu')->result_array();
    }

    public function hapusDataMenu($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('menu', ['id' => $id]);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('menu', ['id' => $id])->row_array();
    }

    public function ubahDataMenu()
    {
        $data = [
            "kategori" => $this->input->post('kategori', true),
            "nama" => $this->input->post('nama', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "harga" => $this->input->post('harga', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('menu', $data);
    }

    public function tambahDataMenu()
    {
        $data = [
            "kategori" => $this->input->post('kategori', true),
            "nama" => $this->input->post('nama', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "harga" => $this->input->post('harga', true)
        ];

        $this->db->insert('menu', $data);
    }
}
 ?>
