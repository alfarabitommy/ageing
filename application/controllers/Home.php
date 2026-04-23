<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat model untuk section "More Workshops" di bagian bawah Homepage
        $this->load->model('Workshop_model');
        $this->load->model('Tag_model');
        $this->load->model('Facilitator_model');
    }

    public function index()
    {
        // Setup SEO Meta & Theme
        $data['title'] = 'Home | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Reimagining Ageing Through the Power of the Arts Together. Join the SLEC x NAFA Conference on 22 July 2026.';
        
        // TRIGGER HEADER GELAP (Karena hero section Home berwarna Navy)
        $data['is_dark_header'] = TRUE; 
        
        // Mengambil Master Data untuk Section Workshop
        $data['tags'] = $this->Tag_model->get_all();
        $data['workshops'] = $this->Workshop_model->get_all(); // Akan kita limit di View jika perlu

        // Looping untuk menyisipkan data fasilitator utama dan data tags (untuk filter JS)
        foreach ($data['workshops'] as $w) {
            // 1. Ambil Fasilitator
            $fac_ids = $this->Workshop_model->get_related_facilitators($w->id);
            if (!empty($fac_ids)) {
                $w->primary_facilitator = $this->Facilitator_model->get_by_id($fac_ids[0]);
            } else {
                $w->primary_facilitator = null;
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
        $this->load->view('public/home', $data);
        $this->load->view('public/layout/footer');
    }
}