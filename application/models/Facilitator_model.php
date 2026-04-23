<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facilitator_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('name', 'ASC');
        return $this->db->get('facilitators')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('facilitators', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('facilitators', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('facilitators', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('facilitators');
    }
}