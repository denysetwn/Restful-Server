<?php

class Menu_model extends CI_Model{
    public function getMenu($id = null){
        if ($id === null){
            return $this->db->get('menu')->result_array();
        } else{
            return $this->db->get_where('menu', ['id' => $id])->result_array();
        }
    }

    public function deleteMenu($id){
        $this->db->delete('menu', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMenu($data){
        $this->db->insert('menu', $data);
        return $this->db->affected_rows();
    }

    public function updateMenu($data, $id){
        $this->db->update('menu', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>