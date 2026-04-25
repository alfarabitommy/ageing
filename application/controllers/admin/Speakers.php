<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speakers extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Speaker_model');
    }

    public function index()
    {
        $data['title'] = 'Plenary Speakers | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['speakers'] = $this->Speaker_model->get_all();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/speakers/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Add Speaker | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['action'] = base_url('admin/speakers/store');
        $data['speaker'] = null;

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/speakers/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name', TRUE),
            'designation' => $this->input->post('designation', TRUE),
            'department' => $this->input->post('department', TRUE),
            'organization' => $this->input->post('organization', TRUE),
            'bio_summary' => $this->input->post('bio_summary', TRUE)
        ];

        // Konfigurasi Upload Gambar
        $config['upload_path'] = './uploads/speakers/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
        $config['max_size'] = 2048; 
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image_path')) {
            $uploadData = $this->upload->data();
            $data['image_path'] = $uploadData['file_name'];
        } else {
            $data['image_path'] = 'default.png';
        }

        $this->Speaker_model->insert($data);
        $this->session->set_flashdata('success', 'The speaker information has been successfully added.');
        redirect('admin/speakers');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Speaker | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['speaker'] = $this->Speaker_model->get_by_id($id);
        
        if(!$data['speaker']) show_404();

        $data['action'] = base_url('admin/speakers/update/'.$id);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/speakers/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($id)
    {
        $speaker = $this->Speaker_model->get_by_id($id);
        
        $data = [
            'name' => $this->input->post('name', TRUE),
            'designation' => $this->input->post('designation', TRUE),
            'department' => $this->input->post('department', TRUE),
            'organization' => $this->input->post('organization', TRUE),
            'bio_summary' => $this->input->post('bio_summary', TRUE)
        ];

        if (!empty($_FILES['image_path']['name'])) {
            $config['upload_path'] = './uploads/speakers/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_path')) {
                // Hapus foto lama
                if ($speaker->image_path != 'default.png' && file_exists('./uploads/speakers/'.$speaker->image_path)) {
                    unlink('./uploads/speakers/'.$speaker->image_path);
                }
                
                $uploadData = $this->upload->data();
                $data['image_path'] = $uploadData['file_name'];
            }
        }

        $this->Speaker_model->update($id, $data);
        $this->session->set_flashdata('success', 'The speaker information has been successfully updated.');
        redirect('admin/speakers');
    }

    public function delete($id)
    {
        $speaker = $this->Speaker_model->get_by_id($id);
        
        if ($speaker->image_path != 'default.png' && file_exists('./uploads/speakers/'.$speaker->image_path)) {
            unlink('./uploads/speakers/'.$speaker->image_path);
        }

        $this->Speaker_model->delete($id);
        $this->session->set_flashdata('success', 'The speaker data has been successfully deleted.');
        redirect('admin/speakers');
    }
}