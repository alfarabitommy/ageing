<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah login. Jika belum, lempar ke halaman login.
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth');
        }
    }
}