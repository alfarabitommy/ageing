<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        // Jika sudah login, langsung arahkan ke dashboard
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard'); // Controller ini akan kita buat di Fase 3
        }

        $this->load->view('admin/login');
    }

    public function process_login()
    {
        // Ambil input dari form
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $admin = $this->Admin_model->get_admin_by_username($username);

        // Verifikasi keberadaan user dan kecocokan password hash Bcrypt
        if ($admin && password_verify($password, $admin->password_hash)) {
            
            // Set session data
            $session_data = array(
                'admin_id'        => $admin->id,
                'admin_username'  => $admin->username,
                'admin_logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);

            // Update waktu login terakhir
            $this->Admin_model->update_last_login($admin->id);

            redirect('admin/dashboard');

        } else {
            // Jika gagal login
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    public function logout()
    {
        // Hancurkan semua sesi
        $this->session->sess_destroy();
        redirect('auth');
    }
}