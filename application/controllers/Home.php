<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Workshop_model');
        $this->load->model('Tag_model');
        $this->load->model('Facilitator_model');
    }

    public function index()
    {
        $data['title'] = 'Home | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Reimagining Ageing Through the Power of the Arts Together. Join the SLEC x NAFA Conference on 22 July 2026.';
        $data['is_dark_header'] = TRUE; 
        
        $data['tags'] = $this->Tag_model->get_all();
        $data['workshops'] = $this->Workshop_model->get_all(); 

        foreach ($data['workshops'] as $w) {
            $fac_ids = $this->Workshop_model->get_related_facilitators($w->id);
            
            $w->all_facilitators = [];
            $w->primary_facilitator = null; 
            $w->team_bio = '';

            if (!empty($fac_ids)) {
                $primary = $this->Facilitator_model->get_by_id($fac_ids[0]);
                $w->primary_facilitator = $primary;
                
                if($primary) {
                    $w->team_bio = $primary->bio;
                }
                
                // LOGIKA TEAM BREAKDOWN
                if (isset($primary->is_team) && $primary->is_team == 1 && !empty($primary->team_members)) {
                    $member_ids = explode(',', $primary->team_members);
                    foreach ($member_ids as $m_id) {
                        $member_obj = $this->Facilitator_model->get_by_id(trim($m_id));
                        if ($member_obj) {
                            $w->all_facilitators[] = $member_obj;
                        }
                    }
                } else {
                    foreach ($fac_ids as $fid) {
                        $fac_obj = $this->Facilitator_model->get_by_id($fid);
                        if ($fac_obj) {
                            $w->all_facilitators[] = $fac_obj;
                        }
                    }
                }
            }

            $w->tag_names = [];
            $related_tag_ids = $this->Workshop_model->get_related_tags($w->id);
            foreach ($related_tag_ids as $tid) {
                $tag_obj = $this->Tag_model->get_by_id($tid);
                if ($tag_obj) {
                    $w->tag_names[] = $tag_obj->tag_name;
                }
            }
        }

        $this->load->view('public/layout/header', $data);
        $this->load->view('public/home', $data);
        $this->load->view('public/layout/footer');
    }
}