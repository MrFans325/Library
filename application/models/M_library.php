<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_library extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function simpan_library($data)
    {
        $this->db->insert('library', $data);
        return $this->db->insert_id();
    }
    public function search_data($data = '')
    {
        if ($data != '') {
            $this->db->like('judul', $data);
        }
        return $this->db->get('library');
    }
    public function tampil_data($data = '')
    {
        if ($data != '') {
            $this->db->where($data);
        }
        return $this->db->get('library');
    }
    public function get_user_id($id)
    {
        return $this->db->get_where('library', ['id_user' => $id])->row_array();
    }
    public function update_library($data, $id)
    {
        $this->db->where('id_item', $id);
        return $this->db->update('library', $data);
    }
    public function delete_library($id)
    {
        $this->db->where('id_item', $id);
        return $this->db->delete('library');
    }
}
