<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_admin_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('admins');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }

    public function update_last_login($admin_id)
    {
        $this->db->where('id', $admin_id);
        $this->db->update('admins', array('last_login' => date('Y-m-d H:i:s')));
    }
}