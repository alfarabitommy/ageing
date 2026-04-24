<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
    }

    public function index()
    {
        $data['title'] = 'Event Schedule | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['schedules'] = $this->Schedule_model->get_all();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/schedules/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $data['title'] = 'Add Schedule | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['action'] = base_url('admin/schedules/store');
        $data['schedule'] = null;

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/schedules/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $time_end = $this->input->post('time_end', TRUE);
        
        $data = [
            'event_date' => $this->input->post('event_date', TRUE), // [PERBAIKAN]: Menangkap input tanggal
            'time_start' => $this->input->post('time_start', TRUE),
            'time_end' => empty($time_end) ? NULL : $time_end,
            'activity_title' => $this->input->post('activity_title', TRUE),
            'location' => $this->input->post('location', TRUE),
            'sort_order' => $this->input->post('sort_order', TRUE)
        ];

        $this->Schedule_model->insert($data);
        $this->session->set_flashdata('success', 'The event schedule has been successfully added.');
        redirect('admin/schedules');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Jadwal | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        $data['schedule'] = $this->Schedule_model->get_by_id($id);
        
        if(!$data['schedule']) show_404();

        $data['action'] = base_url('admin/schedules/update/'.$id);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/schedules/form', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($id)
    {
        $time_end = $this->input->post('time_end', TRUE);

        $data = [
            'event_date' => $this->input->post('event_date', TRUE), // [PERBAIKAN]: Menangkap input tanggal
            'time_start' => $this->input->post('time_start', TRUE),
            'time_end' => empty($time_end) ? NULL : $time_end,
            'activity_title' => $this->input->post('activity_title', TRUE),
            'location' => $this->input->post('location', TRUE),
            'sort_order' => $this->input->post('sort_order', TRUE)
        ];

        $this->Schedule_model->update($id, $data);
        $this->session->set_flashdata('success', 'The event schedule has been successfully updated.');
        redirect('admin/schedules');
    }

    public function delete($id)
    {
        $this->Schedule_model->delete($id);
        $this->session->set_flashdata('success', 'The event schedule has been successfully deleted.');
        redirect('admin/schedules');
    }
}
?>