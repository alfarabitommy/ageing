<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speakers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Speaker_model');
        $this->load->model('Workshop_model');
        $this->load->model('Tag_model');
        $this->load->model('Facilitator_model');
    }

    public function index()
    {
        // Setup SEO Meta & Theme
        $data['title'] = 'The Programme & Speakers | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Discover our plenary speakers and explore breakout workshops designed to reimagine ageing through the arts.';
        
        // TRIGGER HEADER GELAP (Ungu/Putih)
        $data['is_dark_header'] = TRUE; 
        
        // Mengambil Master Data
        $data['speakers'] = $this->Speaker_model->get_all();
        $data['tags'] = $this->Tag_model->get_all();
        $data['workshops'] = $this->Workshop_model->get_all();

        // Looping untuk menyisipkan data fasilitator utama ke dalam masing-masing workshop
        foreach ($data['workshops'] as $w) {
            $fac_ids = $this->Workshop_model->get_related_facilitators($w->id);
            if (!empty($fac_ids)) {
                $w->primary_facilitator = $this->Facilitator_model->get_by_id($fac_ids[0]);
            } else {
                $w->primary_facilitator = null;
            }
        }

        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/speakers', $data);
        $this->load->view('public/layout/footer');
    }
}