<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('tag_name', 'ASC');
        return $this->db->get('tags')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tags', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('tags', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tags', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tags');
    }
}