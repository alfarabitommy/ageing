<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model {

    public function get_all()
    {
        // Diurutkan berdasarkan tanggal, lalu jam mulai agar timeline rapi
        $this->db->order_by('event_date', 'ASC');
        $this->db->order_by('time_start', 'ASC');
        return $this->db->get('schedules')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('schedules', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('schedules', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('schedules', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('schedules');
    }
}