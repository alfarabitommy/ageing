<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function about()
    {
        // Setup SEO Meta
        $data['title'] = 'About Us | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Learn about our vision and the collaboration between St Luke’s ElderCare and Nanyang Academy of Fine Arts.';
        
        // TRIGGER HEADER GELAP
        $data['is_dark_header'] = TRUE; 
        
        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/about', $data);
        $this->load->view('public/layout/footer');
    }

    public function getting_here()
    {
        // Setup SEO Meta
        $data['title'] = 'Getting Here | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Directions to NAFA Campus 1 for the Ageing Artfully Conference. Find train, bus, and car parking information.';
        
        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/getting_here');
        $this->load->view('public/layout/footer');
    }
}