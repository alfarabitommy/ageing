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

        // Looping untuk menyisipkan data fasilitator dan data tags
        foreach ($data['workshops'] as $w) {
            // 1. Ambil Fasilitator
            $fac_ids = $this->Workshop_model->get_related_facilitators($w->id);
            
            // MODIFIKASI: Menyiapkan array untuk menampung BANYAK fasilitator
            $w->all_facilitators = [];
            $w->primary_facilitator = null; // Tetap dipertahankan untuk thumbnail card depan

            if (!empty($fac_ids)) {
                // Set primary untuk card depan
                $w->primary_facilitator = $this->Facilitator_model->get_by_id($fac_ids[0]);
                
                // Looping untuk mengambil SEMUA detail fasilitator untuk pop-up modal
                foreach ($fac_ids as $fid) {
                    $fac_obj = $this->Facilitator_model->get_by_id($fid);
                    if ($fac_obj) {
                        $w->all_facilitators[] = $fac_obj;
                    }
                }
            }

            // 2. Ambil Nama Tag (Hanya ditambahkan untuk kebutuhan filter JS Client-side)
            $w->tag_names = [];
            $related_tag_ids = $this->Workshop_model->get_related_tags($w->id);
            foreach ($related_tag_ids as $tid) {
                $tag_obj = $this->Tag_model->get_by_id($tid);
                if ($tag_obj) {
                    $w->tag_names[] = $tag_obj->tag_name;
                }
            }
        }

        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/speakers', $data);
        $this->load->view('public/layout/footer');
    }
}