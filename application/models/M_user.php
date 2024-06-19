<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function simpan_user($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    public function tampil_data($data = '')
    {
        if ($data != '') {
            $this->db->where($data);
        }
        return $this->db->get('user');
    }
    public function get_user_id($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
    public function update_user($data, $id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }
    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('user');
    }
}
