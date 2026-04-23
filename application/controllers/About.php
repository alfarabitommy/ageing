<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'About Us | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Learn more about the collaboration between St Luke\'s ElderCare (SLEC) and Nanyang Academy of Fine Arts (NAFA).';
        
        // TRIGGER HEADER GELAP (Karena bagian atas adalah carousel/hero ungu)
        $data['is_dark_header'] = TRUE; 

        $this->load->view('public/layout/header', $data);
        $this->load->view('public/about');
        $this->load->view('public/layout/footer');
    }
}