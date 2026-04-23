<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('plenary_speakers')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('plenary_speakers', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('plenary_speakers', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('plenary_speakers', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('plenary_speakers');
    }
}