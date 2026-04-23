<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tag_model');
    }

    public function index()
    {
        $data['title'] = 'Kategori Tags | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['tags'] = $this->Tag_model->get_all();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/tags/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Tag | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['action'] = base_url('admin/tags/store');
        $data['tag'] = null;

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/tags/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $data = ['tag_name' => $this->input->post('tag_name', TRUE)];
        $this->Tag_model->insert($data);
        $this->session->set_flashdata('success', 'Data tag berhasil ditambahkan.');
        redirect('admin/tags');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Tag | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['tag'] = $this->Tag_model->get_by_id($id);
        
        if(!$data['tag']) show_404();

        $data['action'] = base_url('admin/tags/update/'.$id);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/tags/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($id)
    {
        $data = ['tag_name' => $this->input->post('tag_name', TRUE)];
        $this->Tag_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data tag berhasil diperbarui.');
        redirect('admin/tags');
    }

    public function delete($id)
    {
        $this->Tag_model->delete($id);
        $this->session->set_flashdata('success', 'Data tag berhasil dihapus.');
        redirect('admin/tags');
    }
}