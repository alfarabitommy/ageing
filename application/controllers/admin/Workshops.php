<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshops extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Workshop_model');
        $this->load->model('Tag_model');
        $this->load->model('Facilitator_model');
    }

    public function index()
    {
        $data['title'] = 'Breakout Workshops | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['workshops'] = $this->Workshop_model->get_all();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/workshops/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Workshop | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['action'] = base_url('admin/workshops/store');
        
        $data['workshop'] = null;
        $data['all_tags'] = $this->Tag_model->get_all();
        $data['all_facilitators'] = $this->Facilitator_model->get_all();
        
        // Array kosong untuk inisiasi form
        $data['selected_tags'] = [];
        $data['selected_facilitators'] = [];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/workshops/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $title = $this->input->post('title', TRUE);
        
        // Membangun data untuk tabel utama
        $data = [
            'slug' => url_title($title, 'dash', TRUE), // Buat SEO Friendly URL otomatis
            'title' => $title,
            'subtitle' => $this->input->post('subtitle', TRUE),
            'synopsis' => $this->input->post('synopsis', TRUE),
            'location_venue' => $this->input->post('location_venue', TRUE),
            'location_room' => $this->input->post('location_room', TRUE),
            'best_suited_for' => $this->input->post('best_suited_for', TRUE)
        ];

        // Mengambil array dari input Select2
        $tag_ids = $this->input->post('tags'); 
        $facilitator_ids = $this->input->post('facilitators');

        $status = $this->Workshop_model->insert($data, $tag_ids, $facilitator_ids);

        if($status) {
            $this->session->set_flashdata('success', 'Data workshop berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan sistem saat menyimpan data relasi.');
        }
        
        redirect('admin/workshops');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Workshop | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        
        $data['workshop'] = $this->Workshop_model->get_by_id($id);
        if(!$data['workshop']) show_404();

        $data['action'] = base_url('admin/workshops/update/'.$id);
        
        $data['all_tags'] = $this->Tag_model->get_all();
        $data['all_facilitators'] = $this->Facilitator_model->get_all();
        
        // Mengambil data yang sudah dipilih sebelumnya untuk Select2
        $data['selected_tags'] = $this->Workshop_model->get_related_tags($id);
        $data['selected_facilitators'] = $this->Workshop_model->get_related_facilitators($id);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/workshops/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($id)
    {
        $title = $this->input->post('title', TRUE);

        $data = [
            'slug' => url_title($title, 'dash', TRUE), // Update slug sesuai judul baru
            'title' => $title,
            'subtitle' => $this->input->post('subtitle', TRUE),
            'synopsis' => $this->input->post('synopsis', TRUE),
            'location_venue' => $this->input->post('location_venue', TRUE),
            'location_room' => $this->input->post('location_room', TRUE),
            'best_suited_for' => $this->input->post('best_suited_for', TRUE)
        ];

        $tag_ids = $this->input->post('tags'); 
        $facilitator_ids = $this->input->post('facilitators');

        $status = $this->Workshop_model->update($id, $data, $tag_ids, $facilitator_ids);

        if($status) {
            $this->session->set_flashdata('success', 'Data workshop berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan sistem saat mengupdate data relasi.');
        }

        redirect('admin/workshops');
    }

    public function delete($id)
    {
        $this->Workshop_model->delete($id);
        $this->session->set_flashdata('success', 'Data workshop berhasil dihapus.');
        redirect('admin/workshops');
    }
}