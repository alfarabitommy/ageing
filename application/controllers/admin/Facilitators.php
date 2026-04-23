<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facilitators extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Facilitator_model');
    }

    public function index()
    {
        $data['title'] = 'Fasilitator | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['facilitators'] = $this->Facilitator_model->get_all();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/facilitators/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Fasilitator | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['action'] = base_url('admin/facilitators/store');
        $data['facilitator'] = null;

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/facilitators/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name', TRUE),
            'designation' => $this->input->post('designation', TRUE),
            'organization' => $this->input->post('organization', TRUE),
            'bio' => $this->input->post('bio', TRUE)
        ];

        // Konfigurasi Upload Gambar
        $config['upload_path'] = './uploads/facilitators/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // Rename file random

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image_path')) {
            $uploadData = $this->upload->data();
            $data['image_path'] = $uploadData['file_name'];
        } else {
            $data['image_path'] = 'default.png'; // Jika tidak ada upload
        }

        $this->Facilitator_model->insert($data);
        $this->session->set_flashdata('success', 'Data fasilitator berhasil ditambahkan.');
        redirect('admin/facilitators');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Fasilitator | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['facilitator'] = $this->Facilitator_model->get_by_id($id);
        
        if(!$data['facilitator']) show_404();

        $data['action'] = base_url('admin/facilitators/update/'.$id);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/facilitators/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($id)
    {
        $facilitator = $this->Facilitator_model->get_by_id($id);
        
        $data = [
            'name' => $this->input->post('name', TRUE),
            'designation' => $this->input->post('designation', TRUE),
            'organization' => $this->input->post('organization', TRUE),
            'bio' => $this->input->post('bio', TRUE)
        ];

        // Handle jika ada upload foto baru
        if (!empty($_FILES['image_path']['name'])) {
            $config['upload_path'] = './uploads/facilitators/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_path')) {
                // Hapus foto lama jika bukan default
                if ($facilitator->image_path != 'default.png' && file_exists('./uploads/facilitators/'.$facilitator->image_path)) {
                    unlink('./uploads/facilitators/'.$facilitator->image_path);
                }
                
                $uploadData = $this->upload->data();
                $data['image_path'] = $uploadData['file_name'];
            }
        }

        $this->Facilitator_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data fasilitator berhasil diperbarui.');
        redirect('admin/facilitators');
    }

    public function delete($id)
    {
        $facilitator = $this->Facilitator_model->get_by_id($id);
        
        // Hapus file fisik
        if ($facilitator->image_path != 'default.png' && file_exists('./uploads/facilitators/'.$facilitator->image_path)) {
            unlink('./uploads/facilitators/'.$facilitator->image_path);
        }

        $this->Facilitator_model->delete($id);
        $this->session->set_flashdata('success', 'Data fasilitator berhasil dihapus.');
        redirect('admin/facilitators');
    }
}