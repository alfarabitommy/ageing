<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tag_model');
        // Load library upload untuk memproses icon
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Tags Categories | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['tags'] = $this->Tag_model->get_all();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/tags/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Add Tag | Micro-CMS Ageing Artfully';
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

        // Upload Icon Default
        $icon_default = $this->_upload_icon('icon_default');
        if ($icon_default) {
            $data['icon_default'] = $icon_default;
        }

        // Upload Icon Active
        $icon_active = $this->_upload_icon('icon_active');
        if ($icon_active) {
            $data['icon_active'] = $icon_active;
        }

        $this->Tag_model->insert($data);
        $this->session->set_flashdata('success', 'The data tag has been successfully added.');
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
        $old_tag = $this->Tag_model->get_by_id($id);
        $data = ['tag_name' => $this->input->post('tag_name', TRUE)];

        // Upload Icon Default
        $icon_default = $this->_upload_icon('icon_default');
        if ($icon_default) {
            $data['icon_default'] = $icon_default;
            // Hapus file fisik lama jika ada file baru yang diunggah
            if (!empty($old_tag->icon_default) && file_exists('./uploads/tags/'.$old_tag->icon_default)) {
                unlink('./uploads/tags/'.$old_tag->icon_default);
            }
        }

        // Upload Icon Active
        $icon_active = $this->_upload_icon('icon_active');
        if ($icon_active) {
            $data['icon_active'] = $icon_active;
            // Hapus file fisik lama jika ada file baru yang diunggah
            if (!empty($old_tag->icon_active) && file_exists('./uploads/tags/'.$old_tag->icon_active)) {
                unlink('./uploads/tags/'.$old_tag->icon_active);
            }
        }

        $this->Tag_model->update($id, $data);
        $this->session->set_flashdata('success', 'The tag data has been successfully updated.');
        redirect('admin/tags');
    }

    public function delete($id)
    {
        $old_tag = $this->Tag_model->get_by_id($id);
        
        // Hapus file fisik saat tag dihapus dari database
        if (!empty($old_tag->icon_default) && file_exists('./uploads/tags/'.$old_tag->icon_default)) {
            unlink('./uploads/tags/'.$old_tag->icon_default);
        }
        if (!empty($old_tag->icon_active) && file_exists('./uploads/tags/'.$old_tag->icon_active)) {
            unlink('./uploads/tags/'.$old_tag->icon_active);
        }

        $this->Tag_model->delete($id);
        $this->session->set_flashdata('success', 'The tag data has been successfully deleted.');
        redirect('admin/tags');
    }

    // Fungsi private khusus untuk menangani upload icon
    private function _upload_icon($field_name)
    {
        // Direktori penyimpanan file
        $config['upload_path']   = './uploads/tags/';
        $config['allowed_types'] = 'gif|jpg|png|svg|webp';
        $config['encrypt_name']  = TRUE; // Otomatis rename menjadi karakter acak
        $config['max_size']      = 2048; // Max 2MB

        $this->upload->initialize($config);

        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        }
        
        return NULL;
    }
}