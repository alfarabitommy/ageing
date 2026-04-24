<!-- file application/core/MY_Controller.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah login. Jika belum, lempar ke halaman login.
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth');
        }
    }
}
?>
<!-- end file application/core/MY_Controller.php -->

<!-- file application/models/Admin_model.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_admin_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('admins');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }

    public function update_last_login($admin_id)
    {
        $this->db->where('id', $admin_id);
        $this->db->update('admins', array('last_login' => date('Y-m-d H:i:s')));
    }
}
?>
<!-- end file application/models/Admin_model.php -->

<!-- file application/controllers/Auth.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        // Jika sudah login, langsung arahkan ke dashboard
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard'); // Controller ini akan kita buat di Fase 3
        }

        $this->load->view('admin/login');
    }

    public function process_login()
    {
        // Ambil input dari form
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $admin = $this->Admin_model->get_admin_by_username($username);

        // Verifikasi keberadaan user dan kecocokan password hash Bcrypt
        if ($admin && password_verify($password, $admin->password_hash)) {
            
            // Set session data
            $session_data = array(
                'admin_id'        => $admin->id,
                'admin_username'  => $admin->username,
                'admin_logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);

            // Update waktu login terakhir
            $this->Admin_model->update_last_login($admin->id);

            redirect('admin/dashboard');

        } else {
            // Jika gagal login
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    public function logout()
    {
        // Hancurkan semua sesi
        $this->session->sess_destroy();
        redirect('auth');
    }
}
?>
<!-- end file application/controllers/Auth.php -->

<!-- file application/views/admin/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Micro-CMS | Ageing Artfully 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; height: 100vh; }
        .login-card { max-width: 400px; width: 100%; margin: auto; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); background: #fff; }
        .brand-logo { text-align: center; margin-bottom: 1.5rem; }
        .brand-logo h4 { font-weight: bold; color: #333; }
    </style>
</head>
<body>

<div class="container">
    <div class="login-card">
        <div class="brand-logo">
            <h4>Micro-CMS</h4>
            <p class="text-muted small">Ageing Artfully Conference 2026</p>
        </div>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-center small" role="alert">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/process_login'); ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label small fw-bold">Username</label>
                <input type="text" class="form-control" id="username" name="username" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label small fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100 fw-bold">Login to CMS</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- end file application/views/admin/login.php -->

<!-- file application/controllers/admin/Dashboard.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        
        // Memuat layout dan konten
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }
}
?>
<!-- end file application/controllers/admin/Dashboard.php -->

<!-- file application/views/admin/layout/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Micro-CMS'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Kustomisasi Tema Ceria & Tidak Kaku */
        :root {
            --primary-navy: #1B2A47;
            --accent-lime: #8CC63F;
            --bg-light: #F4F7FA;
            --text-dark: #333333;
        }
        
        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: var(--primary-navy);
            color: white;
            min-height: 100vh;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        
        .sidebar-brand {
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand h5 {
            color: var(--accent-lime);
            font-weight: 800;
            letter-spacing: 1px;
            margin: 0;
        }

        .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            margin: 8px 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-navy);
            background-color: var(--accent-lime);
            transform: translateX(5px);
        }

        .nav-link i {
            width: 25px;
        }

        /* Topbar & Card Styling */
        .topbar {
            background: white;
            border-radius: 15px;
            padding: 15px 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }

        .card-ceria {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
        }

        .card-ceria:hover {
            transform: translateY(-5px);
        }

        .btn-lime {
            background-color: var(--accent-lime);
            color: var(--primary-navy);
            font-weight: bold;
            border-radius: 10px;
            border: none;
        }
        
        .btn-lime:hover {
            background-color: #7ab334;
            color: white;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <nav class="sidebar d-flex flex-column">
        <div class="sidebar-brand">
            <h5>AGEING ARTFULLY</h5>
            <small class="text-white-50">Micro-CMS 2026</small>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'schedules') ? 'active' : '' ?>" href="<?= base_url('admin/schedules') ?>">
                    <i class="fas fa-calendar-alt"></i> Schedules
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'speakers') ? 'active' : '' ?>" href="<?= base_url('admin/speakers') ?>">
                    <i class="fas fa-bullhorn"></i> Speakers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'workshops') ? 'active' : '' ?>" href="<?= base_url('admin/workshops') ?>">
                    <i class="fas fa-chalkboard-teacher"></i> Workshops
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'facilitators') ? 'active' : '' ?>" href="<?= base_url('admin/facilitators') ?>">
                    <i class="fas fa-users"></i> Facilitators
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'tags') ? 'active' : '' ?>" href="<?= base_url('admin/tags') ?>">
                    <i class="fas fa-tags"></i> Tags
                </a>
            </li>
        </ul>
    </nav>

    <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
        
        <div class="topbar d-flex justify-content-between align-items-center">
            <h4 class="m-0 text-muted fw-bold">
                <?= isset($title) ? explode(' |', $title)[0] : 'CMS Panel' ?>
            </h4>
            <div>
                <span class="me-3 fw-bold" style="color: var(--primary-navy);">
                    <i class="fas fa-user-circle"></i> Halo, <?= isset($admin_username) ? ucfirst($admin_username) : 'Admin' ?>!
                </span>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-danger rounded-pill px-3">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
<!-- end file application/views/admin/layout/header.php -->

<!-- file application/views/admin/dashboard.php -->
<div class="row g-4">
            <div class="col-12">
                <div class="card card-ceria bg-white">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-3" style="color: var(--primary-navy);">Welcome to Micro-CMS!!</h2>
                        <p class="text-muted fs-5 mb-4">
                            Dedicated content management portal for <strong>Ageing Artfully Conference 2026</strong>. 
                            Use the left menu to manage Schedules, Speakers, and Breakout Workshops details.
                        </p>
                        <a href="<?= base_url('admin/workshops') ?>" class="btn btn-lime btn-lg px-5 shadow-sm">
                            <i class="fas fa-rocket me-2"></i> Manage Workshops
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-calendar-check"></i></div>
                        <h5 class="fw-bold text-dark">Event Schedule</h5>
                        <p class="text-muted small">Manage the activity timeline for July 22, 2026.</p>
                        <a href="<?= base_url('admin/schedules') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Manage Schedule</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-users-cog"></i></div>
                        <h5 class="fw-bold text-dark">Fasilitator</h5>
                        <p class="text-muted small">Kelola data master dan foto pengajar sesi breakout.</p>
                        <a href="<?= base_url('admin/facilitators') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Atur Fasilitator</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-tags"></i></div>
                        <h5 class="fw-bold text-dark">Kategori Tags</h5>
                        <p class="text-muted small">Tambahkan atau edit tag klasifikasi untuk workshop.</p>
                        <a href="<?= base_url('admin/tags') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Atur Tags</a>
                    </div>
                </div>
            </div>
        </div>
<!-- end file application/views/admin/dashboard.php -->

<!-- file application/views/admin/layout/footer.php -->
</div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- end file application/views/admin/layout/footer.php -->

<!-- file application/models/Tag_model.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('tag_name', 'ASC');
        return $this->db->get('tags')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tags', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('tags', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tags', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tags');
    }
}
?>
<!-- end file application/models/Tag_model.php -->

<!-- file application/controllers/admin/Tags.php -->
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
?>
<!-- end file application/controllers/admin/Tags.php -->

<!-- file application/views/admin/tags/index.php -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-tags me-2"></i> Kelola Kategori Tags</h5>
        <a href="<?= base_url('admin/tags/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Tambah Tag
        </a>
    </div>
    <div class="card-body p-4">
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table id="tagsTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Tag</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($tags as $t): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="fw-bold"><?= $t->tag_name ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/tags/edit/'.$t->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/tags/delete/'.$t->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Yakin ingin menghapus tag ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tagsTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' }
        });
    });
</script>
<!-- end file application/views/admin/tags/index.php -->

<!-- file application/views/admin/tags/form.php -->
<div class="card card-ceria bg-white" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $tag ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $tag ? 'Edit' : 'Tambah' ?> Tag
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST">
            <div class="mb-4">
                <label for="tag_name" class="form-label fw-bold small text-muted">Nama Tag <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tag_name" name="tag_name" value="<?= $tag ? $tag->tag_name : '' ?>" required placeholder="Contoh: Dementia Care">
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('admin/tags') ?>" class="btn btn-light fw-bold rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
<!-- end file application/views/admin/tags/form.php -->

<!-- file application/model/Facilitator_model.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facilitator_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('name', 'ASC');
        return $this->db->get('facilitators')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('facilitators', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('facilitators', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('facilitators', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('facilitators');
    }
}
?>
<!-- end file application/model/Facilitator_model.php -->

<!-- file application/controllers/admin/Facilitators.php -->
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
?>
<!-- end file application/controllers/admin/Facilitators.php -->

<!-- file application/views/admin/facilitators/index.php -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-users-cog me-2"></i> Kelola Fasilitator</h5>
        <a href="<?= base_url('admin/facilitators/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Tambah Fasilitator
        </a>
    </div>
    <div class="card-body p-4">
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table id="facTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">Foto</th>
                        <th>Nama & Profil</th>
                        <th>Organisasi</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($facilitators as $f): ?>
                    <tr>
                        <td>
                            <?php $img_src = ($f->image_path != 'default.png' && $f->image_path != '') ? base_url('uploads/facilitators/'.$f->image_path) : 'https://ui-avatars.com/api/?name='.urlencode($f->name).'&background=random'; ?>
                            <img src="<?= $img_src ?>" alt="Foto" class="rounded-circle object-fit-cover" width="45" height="45">
                        </td>
                        <td>
                            <div class="fw-bold"><?= $f->name ?></div>
                            <div class="small text-muted"><?= $f->designation ?></div>
                        </td>
                        <td><span class="badge bg-secondary"><?= $f->organization ?></span></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/facilitators/edit/'.$f->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/facilitators/delete/'.$f->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Yakin ingin menghapus data fasilitator beserta fotonya?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#facTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' }
        });
    });
</script>
<!-- end file application/views/admin/facilitators/index.php -->

<!-- file application/views/admin/facilitators/form.php -->
<div class="card card-ceria bg-white" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $facilitator ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $facilitator ? 'Edit' : 'Tambah' ?> Fasilitator
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?= $facilitator ? $facilitator->name : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Jabatan/Profesi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="designation" value="<?= $facilitator ? $facilitator->designation : '' ?>" placeholder="Contoh: Art Therapist" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Organisasi/Afiliasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="organization" value="<?= $facilitator ? $facilitator->organization : '' ?>" placeholder="Contoh: Art for Good" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Biografi <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="bio" rows="4" required><?= $facilitator ? $facilitator->bio : '' ?></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold small text-muted">Foto Profil</label>
                    <input type="file" class="form-control" name="image_path" accept="image/*">
                    <div class="form-text small">Upload jika ingin menambah/mengganti foto (Maks 2MB. Format: JPG, PNG, WEBP).</div>
                    <?php if($facilitator && $facilitator->image_path != 'default.png' && $facilitator->image_path != ''): ?>
                        <div class="mt-2">
                            <span class="small text-muted d-block mb-1">Foto Saat Ini:</span>
                            <img src="<?= base_url('uploads/facilitators/'.$facilitator->image_path) ?>" alt="Current Image" width="80" class="rounded shadow-sm">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/facilitators') ?>" class="btn btn-light fw-bold rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
<!-- end file application/views/admin/facilitators/form.php -->

<!-- file application/models/Schedule_model.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model {

    public function get_all()
    {
        // Urutkan berdasarkan waktu mulai agar selalu berurutan sesuai timeline
        $this->db->order_by('time_start', 'ASC');
        return $this->db->get('schedules')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('schedules', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('schedules', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('schedules', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('schedules');
    }
}
?>
<!-- end file application/models/Schedule_model.php -->

<!-- file application/controllers/admin/Schedules.php -->
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
        $data['title'] = 'Tambah Jadwal | Micro-CMS Ageing Artfully';
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
            'time_start' => $this->input->post('time_start', TRUE),
            'time_end' => empty($time_end) ? NULL : $time_end,
            'activity_title' => $this->input->post('activity_title', TRUE),
            'location' => $this->input->post('location', TRUE),
            'sort_order' => $this->input->post('sort_order', TRUE)
        ];

        $this->Schedule_model->insert($data);
        $this->session->set_flashdata('success', 'Event Schedule berhasil ditambahkan.');
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
            'time_start' => $this->input->post('time_start', TRUE),
            'time_end' => empty($time_end) ? NULL : $time_end,
            'activity_title' => $this->input->post('activity_title', TRUE),
            'location' => $this->input->post('location', TRUE),
            'sort_order' => $this->input->post('sort_order', TRUE)
        ];

        $this->Schedule_model->update($id, $data);
        $this->session->set_flashdata('success', 'Event Schedule berhasil diperbarui.');
        redirect('admin/schedules');
    }

    public function delete($id)
    {
        $this->Schedule_model->delete($id);
        $this->session->set_flashdata('success', 'Event Schedule berhasil dihapus.');
        redirect('admin/schedules');
    }
}
?>
<!-- end file application/controllers/admin/Schedules.php -->

<!-- file application/views/admin/schedules/index.php -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-calendar-alt me-2"></i> Kelola Jadwal (22 Juli 2026)</h5>
        <a href="<?= base_url('admin/schedules/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </a>
    </div>
    <div class="card-body p-4">
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table id="schTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="15%">Waktu</th>
                        <th>Aktivitas</th>
                        <th>Lokasi</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($schedules as $s): ?>
                    <tr>
                        <td class="fw-bold text-nowrap">
                            <?= date('h:i A', strtotime($s->time_start)) ?>
                            <?= $s->time_end ? ' - ' . date('h:i A', strtotime($s->time_end)) : '' ?>
                        </td>
                        <td class="fw-bold"><?= $s->activity_title ?></td>
                        <td class="small text-muted"><i class="fas fa-map-marker-alt text-danger"></i> <?= $s->location ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/schedules/edit/'.$s->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/schedules/delete/'.$s->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Yakin ingin menghapus jadwal ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#schTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' },
            ordering: false // Matikan sorting DataTables karena kueri SQL sudah mengurutkan berdasar time_start
        });
    });
</script>
<!-- end file application/views/admin/schedules/index.php -->

<!-- file application/views/admin/schedules/form.php -->
<div class="card card-ceria bg-white" style="max-width: 700px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $schedule ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $schedule ? 'Edit' : 'Tambah' ?> Jadwal
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Waktu Mulai <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" name="time_start" value="<?= $schedule ? $schedule->time_start : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Waktu Selesai</label>
                    <input type="time" class="form-control" name="time_end" value="<?= $schedule ? $schedule->time_end : '' ?>">
                    <div class="form-text small">Kosongkan jika acara tidak memiliki rentang waktu spesifik.</div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Judul Aktivitas <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="activity_title" value="<?= $schedule ? $schedule->activity_title : '' ?>" placeholder="Contoh: Plenary Panel Discussion" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="location" value="<?= $schedule ? $schedule->location : '' ?>" placeholder="Contoh: NAFA Campus 1, Wing B, 2nd Floor" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Urutan (Opsional)</label>
                    <input type="number" class="form-control" name="sort_order" value="<?= $schedule ? $schedule->sort_order : '0' ?>">
                    <div class="form-text small">Digunakan hanya jika ada dua acara di waktu mulai yang persis sama.</div>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/schedules') ?>" class="btn btn-light fw-bold rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
<!-- end file application/views/admin/schedules/form.php -->

<!-- file application/models/Speaker_model.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speaker_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('plenary_speakers')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('plenary_speakers', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('plenary_speakers', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('plenary_speakers', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('plenary_speakers');
    }
}
?>
<!-- end file application/models/Speaker_model.php -->

<!-- file application/controllers/admin/Speakers.php -->
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
        $data['title'] = 'Tambah Pembicara | Micro-CMS Ageing Artfully';
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
        $this->session->set_flashdata('success', 'Data pembicara berhasil ditambahkan.');
        redirect('admin/speakers');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pembicara | Micro-CMS Ageing Artfully';
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
        $this->session->set_flashdata('success', 'Data pembicara berhasil diperbarui.');
        redirect('admin/speakers');
    }

    public function delete($id)
    {
        $speaker = $this->Speaker_model->get_by_id($id);
        
        if ($speaker->image_path != 'default.png' && file_exists('./uploads/speakers/'.$speaker->image_path)) {
            unlink('./uploads/speakers/'.$speaker->image_path);
        }

        $this->Speaker_model->delete($id);
        $this->session->set_flashdata('success', 'Data pembicara berhasil dihapus.');
        redirect('admin/speakers');
    }
}
?>
<!-- end file application/controllers/admin/Speakers.php -->

<!-- file application/views/admin/speakers/index.php -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-bullhorn me-2"></i> Kelola Pembicara Utama</h5>
        <a href="<?= base_url('admin/speakers/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Tambah Pembicara
        </a>
    </div>
    <div class="card-body p-4">
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table id="spkTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">Foto</th>
                        <th>Nama</th>
                        <th>Gelar/Jabatan</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($speakers as $s): ?>
                    <tr>
                        <td>
                            <?php $img_src = ($s->image_path != 'default.png' && $s->image_path != '') ? base_url('uploads/speakers/'.$s->image_path) : 'https://ui-avatars.com/api/?name='.urlencode($s->name).'&background=random'; ?>
                            <img src="<?= $img_src ?>" alt="Foto" class="rounded object-fit-cover" width="50" height="50">
                        </td>
                        <td class="fw-bold"><?= $s->name ?></td>
                        <td class="small text-muted"><?= $s->designation ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/speakers/edit/'.$s->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/speakers/delete/'.$s->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Yakin ingin menghapus pembicara ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#spkTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' }
        });
    });
</script>
<!-- end file application/views/admin/speakers/index.php -->

<!-- file application/views/admin/speakers/form.php -->
<div class="card card-ceria bg-white" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $speaker ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $speaker ? 'Edit' : 'Tambah' ?> Pembicara
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?= $speaker ? $speaker->name : '' ?>" required placeholder="Contoh: A/Prof (Dr) Carol Ma">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Gelar/Jabatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="designation" value="<?= $speaker ? $speaker->designation : '' ?>" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Ringkasan Biografi</label>
                    <textarea class="form-control" name="bio_summary" rows="3"><?= $speaker ? $speaker->bio_summary : '' ?></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold small text-muted">Foto Profil</label>
                    <input type="file" class="form-control" name="image_path" accept="image/*">
                    <div class="form-text small">Maks 2MB. Format: JPG, PNG, WEBP.</div>
                    <?php if($speaker && $speaker->image_path != 'default.png' && $speaker->image_path != ''): ?>
                        <div class="mt-2">
                            <span class="small text-muted d-block mb-1">Foto Saat Ini:</span>
                            <img src="<?= base_url('uploads/speakers/'.$speaker->image_path) ?>" alt="Current Image" width="80" class="rounded shadow-sm">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/speakers') ?>" class="btn btn-light fw-bold rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
<!-- end file application/views/admin/speakers/form.php -->

<!-- file application/models/Workshop_model.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('workshops')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('workshops', ['id' => $id])->row();
    }

    // Mengambil array of ID Tag yang berelasi dengan workshop ini
    public function get_related_tags($workshop_id)
    {
        $this->db->select('tag_id');
        $this->db->where('workshop_id', $workshop_id);
        $result = $this->db->get('workshop_tags')->result_array();
        return array_column($result, 'tag_id');
    }

    // Mengambil array of ID Facilitator yang berelasi dengan workshop ini
    public function get_related_facilitators($workshop_id)
    {
        $this->db->select('facilitator_id');
        $this->db->where('workshop_id', $workshop_id);
        $result = $this->db->get('workshop_facilitators')->result_array();
        return array_column($result, 'facilitator_id');
    }

    public function insert($data, $tag_ids, $facilitator_ids)
    {
        $this->db->trans_start(); // Memulai transaksi database

        // 1. Insert ke tabel utama
        $this->db->insert('workshops', $data);
        $workshop_id = $this->db->insert_id();

        // 2. Insert ke pivot tabel workshop_tags
        if (!empty($tag_ids)) {
            $tags_data = [];
            foreach ($tag_ids as $t_id) {
                $tags_data[] = [
                    'workshop_id' => $workshop_id,
                    'tag_id' => $t_id
                ];
            }
            $this->db->insert_batch('workshop_tags', $tags_data);
        }

        // 3. Insert ke pivot tabel workshop_facilitators
        if (!empty($facilitator_ids)) {
            $fac_data = [];
            foreach ($facilitator_ids as $f_id) {
                $fac_data[] = [
                    'workshop_id' => $workshop_id,
                    'facilitator_id' => $f_id
                ];
            }
            $this->db->insert_batch('workshop_facilitators', $fac_data);
        }

        $this->db->trans_complete(); // Selesaikan transaksi
        return $this->db->trans_status(); // Return TRUE jika berhasil, FALSE jika rollback
    }

    public function update($id, $data, $tag_ids, $facilitator_ids)
    {
        $this->db->trans_start();

        // 1. Update tabel utama
        $this->db->where('id', $id);
        $this->db->update('workshops', $data);

        // 2. Refresh (Hapus lalu Insert) pivot tabel workshop_tags
        $this->db->where('workshop_id', $id)->delete('workshop_tags');
        if (!empty($tag_ids)) {
            $tags_data = [];
            foreach ($tag_ids as $t_id) {
                $tags_data[] = [
                    'workshop_id' => $id,
                    'tag_id' => $t_id
                ];
            }
            $this->db->insert_batch('workshop_tags', $tags_data);
        }

        // 3. Refresh (Hapus lalu Insert) pivot tabel workshop_facilitators
        $this->db->where('workshop_id', $id)->delete('workshop_facilitators');
        if (!empty($facilitator_ids)) {
            $fac_data = [];
            foreach ($facilitator_ids as $f_id) {
                $fac_data[] = [
                    'workshop_id' => $id,
                    'facilitator_id' => $f_id
                ];
            }
            $this->db->insert_batch('workshop_facilitators', $fac_data);
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete($id)
    {
        // Berkat pengaturan ON DELETE CASCADE di database, 
        // menghapus data utama akan otomatis menghapus data di pivot tabel
        $this->db->where('id', $id);
        return $this->db->delete('workshops');
    }
}
?>
<!-- end file application/models/Workshop_model.php -->

<!-- file application/controllers/admin/Workshops.php -->
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
?>
<!-- end file application/controllers/admin/Workshops.php -->

<!-- file application/views/admin/workshops/index.php -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-chalkboard-teacher me-2"></i> Kelola Breakout Workshops</h5>
        <a href="<?= base_url('admin/workshops/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Tambah Sesi Workshop
        </a>
    </div>
    <div class="card-body p-4">
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table id="wsTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul Workshop</th>
                        <th>Lokasi Venue</th>
                        <th>Target Peserta</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($workshops as $w): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <div class="fw-bold"><?= $w->title ?></div>
                            <small class="text-muted">Slug: /workshop/<?= $w->slug ?></small>
                        </td>
                        <td>
                            <div class="fw-bold small"><?= $w->location_venue ?></div>
                            <small class="text-muted"><?= $w->location_room ?></small>
                        </td>
                        <td class="small"><?= substr($w->best_suited_for, 0, 50) . '...' ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/workshops/edit/'.$w->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/workshops/delete/'.$w->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Menghapus workshop ini akan menghapus relasi tag dan fasilitatornya (Foto/Data Master fasilitator aman). Lanjutkan?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#wsTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' }
        });
    });
</script>
<!-- end file application/views/admin/workshops/index.php -->

<!-- file application/views/admin/workshops/form.php -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* Styling Select2 agar membaur dengan tema Bootstrap 5 Ceria kita */
    .select2-container .select2-selection--multiple {
        min-height: 38px;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: var(--primary-navy);
        color: white;
        border: none;
        border-radius: 5px;
        padding: 2px 8px;
        margin-top: 6px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        margin-right: 5px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: var(--accent-lime);
        background: transparent;
    }
</style>

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $workshop ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $workshop ? 'Edit' : 'Tambah' ?> Workshop
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Judul Workshop <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="<?= $workshop ? $workshop->title : '' ?>" required placeholder="Contoh: Art Therapy for Dementia Care">
                    <div class="form-text small">URL otomatis menyesuaikan judul (SEO Friendly).</div>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Sub-judul (Opsional)</label>
                    <input type="text" class="form-control" name="subtitle" value="<?= $workshop ? $workshop->subtitle : '' ?>" placeholder="Contoh: Supporting Identity, Memory and Well-being...">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Lokasi Gedung <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="location_venue" value="<?= $workshop ? $workshop->location_venue : '' ?>" required placeholder="Contoh: NAFA Campus 1 - Tower Block">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Lokasi Ruangan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="location_room" value="<?= $workshop ? $workshop->location_room : '' ?>" required placeholder="Contoh: Classroom | TB6-15">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Target Peserta (Best Suited For) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="best_suited_for" value="<?= $workshop ? $workshop->best_suited_for : '' ?>" required placeholder="Contoh: Caregivers seeking reflection and self-care tools">
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold small text-muted">Pilih Kategori (Tags) <span class="text-danger">*</span></label>
                    <select name="tags[]" class="form-control select2" multiple="multiple" required data-placeholder="Pilih satu atau lebih kategori...">
                        <?php foreach($all_tags as $t): ?>
                            <option value="<?= $t->id ?>" <?= in_array($t->id, $selected_tags) ? 'selected' : '' ?>>
                                <?= $t->tag_name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold small text-muted">Pilih Fasilitator <span class="text-danger">*</span></label>
                    <select name="facilitators[]" class="form-control select2" multiple="multiple" required data-placeholder="Pilih satu atau lebih fasilitator...">
                        <?php foreach($all_facilitators as $f): ?>
                            <option value="<?= $f->id ?>" <?= in_array($f->id, $selected_facilitators) ? 'selected' : '' ?>>
                                <?= $f->name ?> (<?= $f->organization ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold small text-muted">Sinopsis Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="synopsis" rows="5" required><?= $workshop ? $workshop->synopsis : '' ?></textarea>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/workshops') ?>" class="btn btn-light fw-bold rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            allowClear: true
        });
    });
</script>
<!-- end file application/views/admin/workshops/form.php -->

<!-- file application/views/public/layout/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= isset($title) ? $title : 'Ageing Artfully Conference 2026' ?></title>
    <meta name="description" content="<?= isset($meta_desc) ? $meta_desc : 'Reimagining Ageing Through the Power of the Arts Together. Join us on 22 July 2026.' ?>">
    
    <meta property="og:title" content="<?= isset($title) ? $title : 'Ageing Artfully Conference 2026' ?>">
    <meta property="og:description" content="<?= isset($meta_desc) ? $meta_desc : 'Reimagining Ageing Through the Power of the Arts Together.' ?>">
    <meta property="og:type" content="website">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700;9..40,800&display=swap" rel="stylesheet">

    <style>
        /* Global Styles */
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'DM Sans', sans-serif;
            color: #333;
            background-color: #FAFAFA;
        }

        /* Navbar Base Styles */
        .navbar {
            padding: 12px 0;
            transition: all 0.3s ease;
        }
        .navbar-brand img {
            max-height: 45px;
            transition: all 0.3s ease;
        }
        .nav-link {
            font-size: 14px; 
            font-weight: 500;
            padding: 8px 15px !important;
            transition: color 0.3s;
        }
        .btn-register {
            font-size: 14px;
            font-weight: 700;
            border-radius: 25px;
            padding: 8px 24px;
            transition: all 0.3s;
        }

        /* Responsive Logo & Hamburger Fix */
        @media (max-width: 991px) {
            /* Membagi ruang dengan persentase pasti agar tidak overlap/keluar layar */
            .navbar-brand {
                width: 80%;
                margin-right: 0;
                display: flex;
                align-items: center;
            }
            .navbar-brand img {
                max-width: 100%; /* Logo akan otomatis menyesuaikan ruang 80% layar */
                height: auto;
                object-fit: contain;
            }
            .navbar-toggler {
                width: 15%;
                display: flex;
                justify-content: flex-end; /* Mendorong icon mentok ke kanan */
                align-items: center;
                padding: 0;
            }
            
            /* Styling Offcanvas Menu */
            .offcanvas {
                background-color: #5156B8; 
                color: white;
            }
            .offcanvas-header {
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            .offcanvas-title {
                color: white;
                font-weight: 800;
            }
            .offcanvas .btn-close {
                filter: invert(1); 
                opacity: 1;
            }
            .offcanvas .nav-link {
                color: white !important;
                font-size: 16px;
                padding: 15px 20px !important;
                border-bottom: 1px solid rgba(255,255,255,0.05);
            }
            .offcanvas .nav-link:hover, 
            .offcanvas .nav-link.active {
                background-color: rgba(255,255,255,0.1);
                color: #FCE170 !important; 
            }
            .offcanvas .btn-register {
                width: 100%;
                margin-top: 20px;
                background-color: #FCE170;
                color: #5156B8;
                border: none;
            }
        }

        /* THEME 1: LIGHT THEME */
        .navbar-light-theme {
            background-color: #FFFFFF;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .navbar-light-theme .nav-link { color: #4A4A4A; }
        .navbar-light-theme .nav-link:hover, 
        .navbar-light-theme .nav-link.active { color: #5156B8; }
        .navbar-light-theme .btn-register {
            background-color: #8C94FF;
            color: white;
            border: 1px solid #8C94FF;
        }
        .navbar-light-theme .btn-register:hover {
            background-color: #5156B8;
            border-color: #5156B8;
            color: white;
        }

        /* THEME 2: DARK THEME */
        .navbar-dark-theme {
            background-color: #5156B8;
        }
        .navbar-dark-theme .nav-link { color: #FFFFFF; }
        .navbar-dark-theme .nav-link:hover, 
        .navbar-dark-theme .nav-link.active { color: #1B2A47; }
        
        .navbar-dark-theme .navbar-brand img {
            filter: brightness(0) invert(1);
        }
        
        .navbar-dark-theme .btn-register {
            background-color: transparent;
            color: #FFFFFF;
            border: 1px solid #FFFFFF;
        }
        .navbar-dark-theme .btn-register:hover {
            background-color: #FFFFFF;
            color: #5156B8;
        }
    </style>
</head>
<body>

<?php $theme_class = (isset($is_dark_header) && $is_dark_header) ? 'navbar-dark-theme' : 'navbar-light-theme'; ?>

<nav class="navbar navbar-expand-lg sticky-top <?= $theme_class ?>">
    <div class="container-fluid px-3 px-lg-5 d-flex justify-content-between align-items-center flex-nowrap">
        
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/public/images/logos.png') ?>" alt="SLEC, NAFA, UAS Logos">
        </a>
        
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="<?= (isset($is_dark_header) && $is_dark_header) ? '#FFFFFF' : '#1B2A47' ?>" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About Us</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == 'speakers') ? 'active' : '' ?>" href="<?= base_url('speakers') ?>">Speakers</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('speakers#breakout-workshops') ?>">Breakout Workshops</a></li>
                    
                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == 'schedules') ? 'active' : '' ?>" href="<?= base_url('schedules') ?>">Event Schedule</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == 'getting-here') ? 'active' : '' ?>" href="<?= base_url('getting-here') ?>">Getting Here</a></li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn btn-register" href="https://www.eventbrite.com/" target="_blank">Register Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<main class="min-vh-100">
<!-- end file application/views/public/layout/header.php -->

<!-- file application/views/public/layout/footer.php -->
</main>
<style>
    /* Footer Styles based on Event Schedule.png */
    .site-footer {
        background-color: #5156B8; /* Navy/Purple color from design */
        color: white;
        padding: 60px 0;
        margin-top: 80px;
    }
    .footer-logo {
        max-width: 250px;
        margin-bottom: 20px;
    }
    .footer-heading {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .footer-link {
        color: white;
        text-decoration: none;
        font-size: 14px;
        display: block;
        margin-bottom: 8px;
    }
    .footer-link:hover {
        text-decoration: underline;
    }
    .social-icons a {
        color: white;
        font-size: 20px;
        margin-right: 15px;
        text-decoration: none;
        border: 1px solid rgba(255,255,255,0.5);
        border-radius: 8px;
        padding: 8px 12px;
        display: inline-block;
        transition: all 0.3s;
    }
    .social-icons a:hover {
        background-color: white;
        color: #5156B8;
    }
</style>

<footer class="site-footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="<?= base_url('assets/public/images/footer-logo.png') ?>" alt="Ageing Artfully Conference 2026" class="footer-logo">
            </div>
            
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="footer-heading">Enquiries</div>
                        <a href="mailto:secretariat.ageingartfully@slec.org.sg" class="footer-link" style="text-decoration: underline;">
                            secretariat.ageingartfully@slec.org.sg
                        </a>
                    </div>
                    
                    <div class="col-12">
                        <div class="footer-heading">Stay Connected</div>
                        <div class="row">
                            <div class="col-6">
                                <small class="d-block mb-2 text-white-50">@stlukeseldercare</small>
                                <div class="social-icons">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-tiktok"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <small class="d-block mb-2 text-white-50">@nafa_sg</small>
                                <div class="social-icons">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-tiktok"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- end file application/views/public/layout/footer.php -->

<!-- file application/controllers/Schedules.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model'); // Load model dari Fase 3
    }

    public function index()
    {
        // Setup SEO Meta
        $data['title'] = 'Event Schedule | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'View the full event schedule for the Ageing Artfully Conference on Wednesday, 22 July 2026 at NAFA Campus 1.';
        
        // Get Data
        $data['schedules'] = $this->Schedule_model->get_all();

        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/schedules', $data);
        $this->load->view('public/layout/footer');
    }
}
?>
<!-- end file application/controllers/Schedules.php -->

<!-- file application/views/public/schedules.php -->
<style>
    /* Spesifik Styles untuk Halaman Schedule */
    .schedule-header {
        margin: 50px 0 40px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        flex-wrap: wrap;
    }
    .schedule-title {
        color: #383CA3; /* Warna navy sesuai desain */
        font-weight: 700;
        font-size: 42px;
        margin: 0;
    }
    .schedule-date {
        color: #5B62C6; /* Ungu kebiruan */
        font-weight: 500;
        font-size: 32px;
        margin: 0;
    }
    .event-card {
        border-radius: 15px;
        padding: 30px 40px;
        margin-bottom: 20px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    /* Warna selang-seling untuk Card seperti di desain */
    .bg-dark-purple { background-color: #4F4B9E; }
    .bg-light-purple { background-color: #9BA4F6; }
    .bg-mid-purple   { background-color: #8491F0; }
    
    .event-info h3 {
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 5px;
    }
    .event-location {
        font-size: 16px;
        opacity: 0.9;
        display: flex;
        align-items: center;
    }
    .event-location i {
        margin-right: 8px;
        font-size: 14px;
    }
    .event-time {
        font-weight: 700;
        font-size: 28px;
    }

    @media (max-width: 768px) {
        .event-card {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
        }
        .event-time {
            margin-top: 15px;
        }
        .schedule-title { font-size: 32px; }
        .schedule-date { font-size: 24px; margin-top: 10px; }
    }
</style>

<div class="container">
    <div class="schedule-header">
        <h1 class="schedule-title">Event Schedule</h1>
        <h2 class="schedule-date">Wednesday, 22 July 2026</h2>
    </div>

    <div class="schedule-list">
        <?php 
        // Array untuk warna background selang-seling
        $bg_colors = ['bg-dark-purple', 'bg-light-purple', 'bg-mid-purple'];
        $color_index = 0;

        foreach($schedules as $s): 
            $current_bg = $bg_colors[$color_index % count($bg_colors)];
            $color_index++;
            
            // Format Waktu
            $start = date('g:i A', strtotime($s->time_start));
            $time_display = $start;
            if(!empty($s->time_end)) {
                $end = date('g:i A', strtotime($s->time_end));
                $time_display = $start . ' &ndash; ' . $end;
            }
        ?>
        
        <div class="event-card <?= $current_bg ?>">
            <div class="event-info">
                <h3><?= htmlspecialchars($s->activity_title) ?></h3>
                <div class="event-location">
                    <i class="far fa-circle"></i> <?= htmlspecialchars($s->location) ?>
                </div>
            </div>
            <div class="event-time">
                <?= $time_display ?>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>
<!-- end file application/views/public/schedules.php -->

<!-- file application/controllers/Speakers.php -->
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
        $this->load->view('public/speakers', $data);
        $this->load->view('public/layout/footer');
    }
}
?>
<!-- end file application/controllers/Speakers.php -->

<!-- file application/views/public/schedules.php -->
<style>
    /* Section 1: The Programme Hero */
    .programme-hero {
        background-color: #5156B8; /* Navy Blue */
        color: white;
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }
    .shape-1 {
        position: absolute;
        top: 0;
        right: 0;
        max-width: 400px;
        z-index: 0;
    }
    .programme-hero .container {
        position: relative;
        z-index: 1;
    }
    .stat-card {
        border-radius: 15px;
        border: none;
        height: 100%;
    }
    .stat-card .display-4 {
        font-weight: 800;
        color: #1B2A47;
    }
    .stat-card h5 {
        color: #1B2A47;
        font-weight: 600;
    }

    /* Section 2: Plenary Speakers */
    .section-title {
        color: #5156B8;
        font-weight: 800;
        font-size: 42px;
        margin-bottom: 15px;
    }
    .speaker-card {
        border: 1px solid #5156B8;
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        height: 100%;
        background-color: white;
        transition: transform 0.3s;
    }
    .speaker-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(81, 86, 184, 0.1);
    }
    .speaker-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 15px; /* Sedikit membulat sesuai desain */
        margin-bottom: 20px;
    }
    .speaker-name {
        color: #5156B8;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .speaker-title {
        font-size: 14px;
        color: #333;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .speaker-org {
        font-size: 12px;
        color: #5156B8;
        font-weight: 700;
    }

    /* Section 3: Breakout Workshops */
    .workshops-section {
        position: relative;
        padding: 60px 0;
    }
    .shape-2 {
        position: absolute;
        top: 0;
        right: 0;
        max-width: 300px;
        z-index: -1;
    }
    .tag-pill {
        border: 1px solid #5156B8;
        color: #5156B8;
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 13px;
        display: inline-block;
        margin: 0 5px 10px 0;
        background: white;
        text-decoration: none;
        transition: all 0.2s;
    }
    .tag-pill:hover {
        background-color: #5156B8;
        color: white;
    }
    .workshop-card {
        border: 1px solid #E0E0E0;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        height: 100%;
        background-color: white;
        display: flex;
        flex-direction: column;
    }
    .workshop-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 15px;
        margin: 0 auto 20px;
    }
    .workshop-title {
        color: #5156B8;
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .workshop-subtitle {
        font-size: 13px;
        color: #555;
        margin-bottom: 20px;
        flex-grow: 1; /* Mendorong tombol ke bawah */
    }
    .workshop-fac-name {
        color: #5156B8;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 2px;
    }
    .workshop-fac-org {
        font-size: 11px;
        color: #777;
        margin-bottom: 20px;
    }
    .btn-read-more {
        background-color: #7C83DB;
        color: white;
        border-radius: 20px;
        padding: 6px 25px;
        font-size: 13px;
        font-weight: 600;
        border: none;
        align-self: center;
        text-decoration: none;
    }
    .btn-read-more:hover {
        background-color: #5156B8;
        color: white;
    }
</style>

<section class="programme-hero">
    <img src="<?= base_url('assets/public/images/bg-shape-1.png') ?>" alt="" class="shape-1">
    <div class="container">
        <p class="small fw-bold mb-3">> SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h1 class="display-3 fw-bold mb-4">The Programme</h1>
        <p class="lead mb-5" style="max-width: 600px;">
            At the heart of the conference is the belief that the arts are not just activities, but everyday practices that support connection, identity, and well-being.
        </p>
        
        <div class="row g-4" style="max-width: 700px;">
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #F8E6EC;">
                    <div class="card-body p-4">
                        <div class="display-4">4</div>
                        <h5>Plenary<br>Sessions</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #EAE6FB;">
                    <div class="card-body p-4">
                        <div class="display-4">10</div>
                        <h5>Breakout<br>Workshops</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #DDF2F8;">
                    <div class="card-body p-4">
                        <div class="display-4">1 Day</div>
                        <h5>Full of<br>Lectures</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 mt-4">
    <h2 class="section-title">The Speakers</h2>
    <p class="mb-5" style="max-width: 800px; color: #333; font-size: 18px;">
        This year's conference features speakers from across a wide range of fields, bringing together diverse perspectives to offer a multidisciplinary look at the future of ageing. These plenary sessions are designed to inspire and widen your horizons through innovative approaches to senior well-being.
    </p>

    <div class="row g-4">
        <?php foreach($speakers as $s): ?>
        <div class="col-md-6 col-lg-3">
            <div class="speaker-card">
                <?php $img_src = ($s->image_path != 'default.png' && $s->image_path != '') ? base_url('uploads/speakers/'.$s->image_path) : 'https://ui-avatars.com/api/?name='.urlencode($s->name).'&background=random'; ?>
                <img src="<?= $img_src ?>" alt="<?= htmlspecialchars($s->name) ?>" class="speaker-img shadow-sm">
                
                <h3 class="speaker-name"><?= htmlspecialchars($s->name) ?></h3>
                <p class="speaker-title"><?= htmlspecialchars($s->designation) ?></p>
                <p class="speaker-org mb-0"><?= htmlspecialchars(substr($s->bio_summary, 0, 50)) ?>...</p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="workshops-section">
    <img src="<?= base_url('assets/public/images/bg-shape-2.png') ?>" alt="" class="shape-2">
    <div class="container">
        <h2 class="section-title">Breakout Workshops</h2>
        <p class="mb-4" style="max-width: 600px; color: #333; font-size: 18px;">
            Participants are invited to choose up to 4 workshops based on their interests and the needs of the seniors they work with.
        </p>

        <div class="mb-5">
            <?php foreach($tags as $t): ?>
                <a href="javascript:void(0)" class="tag-pill"><?= htmlspecialchars($t->tag_name) ?></a>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php foreach($workshops as $w): ?>
            <div class="col-md-6 col-lg-4">
                <div class="workshop-card">
                    <?php 
                        if($w->primary_facilitator && $w->primary_facilitator->image_path != 'default.png') {
                            $fac_img = base_url('uploads/facilitators/'.$w->primary_facilitator->image_path);
                        } else {
                            $fac_name = $w->primary_facilitator ? $w->primary_facilitator->name : 'N/A';
                            $fac_img = 'https://ui-avatars.com/api/?name='.urlencode($fac_name).'&background=random';
                        }
                    ?>
                    <img src="<?= $fac_img ?>" alt="Facilitator" class="workshop-img shadow-sm">
                    
                    <h3 class="workshop-title"><?= htmlspecialchars($w->title) ?></h3>
                    <p class="workshop-subtitle"><?= htmlspecialchars($w->subtitle) ?></p>
                    
                    <?php if($w->primary_facilitator): ?>
                        <p class="workshop-fac-name"><?= htmlspecialchars($w->primary_facilitator->name) ?></p>
                        <p class="workshop-fac-org"><?= htmlspecialchars($w->primary_facilitator->designation) ?><br><?= htmlspecialchars($w->primary_facilitator->organization) ?></p>
                    <?php endif; ?>

                    <a href="<?= base_url('workshop/'.$w->slug) ?>" class="btn-read-more mt-auto">Read More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- end file application/views/public/schedules.php -->

<!-- file application/config/routes.php -->
<?
$route['default_controller'] = 'Home';

// Rute Publik (Frontend)
$route['about'] = 'About/index';
$route['schedules'] = 'Schedules/index';
$route['speakers'] = 'Speakers/index';
$route['getting-here'] = 'Pages/getting_here';

// Rute Admin & Auth
$route['auth'] = 'Auth/index';
$route['admin/dashboard'] = 'admin/Dashboard/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
?>
<!-- end file application/config/routes.php -->

<!-- file application/controllers/About.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'About Us | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Learn more about the collaboration between St Luke\'s ElderCare (SLEC) and Nanyang Academy of Fine Arts (NAFA).';
        
        // TRIGGER HEADER GELAP (Karena bagian atas adalah carousel/hero ungu)
        $data['is_dark_header'] = TRUE; 

        $this->load->view('public/layout/header', $data);
        $this->load->view('public/about');
        $this->load->view('public/layout/footer');
    }
}
?>
<!-- end file application/controllers/About.php -->

<!-- file application/views/public/about.php -->
<style>
    /* Global Section Spacing & Typography */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'DM Sans', sans-serif; /* Update font sesuai Blueprint */
    }

    body {
        background-color: #f4f7f6;
        color: #333;
        line-height: 1.6;
    }

    section { padding: 80px 0; }
    .section-title { color: #fff; font-size: 42px; font-weight: 800; margin-bottom: 30px; letter-spacing: -0.5px; text-align: center;}
    .text-purple { color: #5156B8; }

    /* Container untuk membatasi lebar konten */
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 0;
    }

    /* 1. Carousel Top */
    .about-carousel { margin-top: -70px; /* Offset agar masuk ke bawah header yang tembus pandang */ }
    .carousel-item img { height: 650px; object-fit: cover; }

    /* 2. Our Vision Overlay Box */
    .vision-container {
        position: relative;
        z-index: 10;
        margin-top: -150px; /* Menarik kotak ini naik ke atas gambar carousel */
        padding: 0 15px;
    }
    .vision-overlay-box {
        background-color: #ffff;
        border-radius: 30px;
        position: relative;
        box-shadow: 0 5px 10px rgba(81, 86, 184, 0.2);
        overflow: hidden;
        margin-top: 5%;
    }
    .vision-overlay-box h3 { font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #92B9FA; }
    .vision-overlay-box p { font-size: 24px; font-weight: 500; line-height: 1.5; margin-bottom: 20px; }
    .icon-pen { position: absolute; right: -5%; top: -10%; max-width: 350px; opacity: 0.9; pointer-events: none; }

    /* Styling khusus untuk Carousel di About Page */
    .vision-overlay-box .carousel-inner {
        border-radius: 30px; 
        box-shadow: 0 15px 30px rgba(0,0,0,0.1); 
    }

    .vision-overlay-box .carousel-item img {
        height: 400px; 
        object-fit: cover;
        border-radius: 30px;
    }

    .vision-overlay-box .carousel-indicators {
        bottom: 10px;
    }
    .vision-overlay-box .carousel-indicators [data-bs-target] {
        width: 10px; 
        height: 10px; 
        border-radius: 50%; 
        background-color: rgba(255,255,255,0.6); 
        border: none; 
        margin: 0 5px;
    }
    .vision-overlay-box .carousel-indicators .active { 
        background-color: white; 
    }

    /* 3. Conference Objectives (White Theme) */
    .objectives-section { background-color: #998CFF; padding-top: 120px; /* Ekstra padding atas karena ada overlay box */ }
    .obj-card-1 {
        background: #f6e498; 
        border: 0px solid #5156B8; 
        border-radius: 25px; 
        padding: 40px 20px; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease;
    }

    .obj-card-2 {
        background: #ffc1f1; 
        border: 0px solid #5156B8; 
        border-radius: 25px; 
        padding: 40px 20px; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease;
    }

    .obj-card-3 {
        background: #94c0fa; 
        border: 0px solid #5156B8; 
        border-radius: 25px; 
        padding: 40px 20px; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease;
    }

    .obj-card-4{
        background: #ffc184; 
        border: 0px solid #5156B8; 
        border-radius: 25px; 
        padding: 40px 20px; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease;
    }

    .obj-card:hover { transform: translateY(-10px); box-shadow: 0 10px 25px rgba(81, 86, 184, 0.15); }
    .obj-card i { font-size: 32px; margin-bottom: 20px; display: block; }
    .obj-card h4 { font-size: 18px; font-weight: 700; margin-bottom: 0; line-height: 1.4; }

    /* 4. Profile Sections (SLEC & NAFA Zig-Zag) */
    .profile-img { border-radius: 30px; width: 100%; height: 450px; object-fit: cover; box-shadow: 0 15px 30px rgba(0,0,0,0.08); }
    .profile-label { font-weight: 800; font-size: 16px; margin-bottom: 10px; display: block; text-transform: uppercase; letter-spacing: 1px; }
    .profile-title { font-size: 38px; font-weight: 800; line-height: 1.2; margin-bottom: 25px; }
    .profile-text { font-size: 16px; color: #444; margin-bottom: 20px; line-height: 1.7; }
    
    .location-box { background-color: #F4F5F7; border-radius: 20px; padding: 30px; margin-top: 30px; border-left: 5px solid #5156B8; }
    .location-title { font-weight: 800; font-size: 16px; margin-bottom: 10px; display: block; }
    .location-text { font-size: 15px; margin-bottom: 5px; color: #333; }

    /* Floating Icons */
    .icon-brush { position: absolute; left: -2%; top: -5%; max-width: 250px; pointer-events: none; }
    .icon-mask { position: absolute; right: -5%; top: 10%; max-width: 250px; pointer-events: none; }

    /* star slider background biru */
    .programme-hero {
        background-color: #5156B8; /* Navy Blue */
        color: white;
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }

    .slider-thumb {
        position: absolute;
        bottom: 0;
        right: -10%;
        z-index: 3;
        padding-bottom: 10%;
    }

    .slider-icon {
        position: absolute;
        bottom: -120%;
        left: -10%;
        z-index: 3;
        width: 20%;
    }

    /* berita */
    .news-grid {
        display: flex;
        gap: 30px; 
        flex-wrap: wrap; 
    }

    .news-item {
        background: #fff;
        flex: 1; 
        min-width: 300px; 
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .news-item:hover {
        transform: translateY(-5px); 
    }

    .news-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .news-content {
        padding: 20px;
    }

    .date {
        font-size: 0.85rem;
        color: #888;
    }

    .news-content h3 {
        margin: 10px 0;
        color: #2c3e50;
    }

    .news-content p {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 20px;
    }

    .read-more {
        text-decoration: none;
        color: #3498db;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .read-more:hover {
        color: #2c3e50;
    }

    /* Media Query untuk Mobile (Layar Kecil) */
    @media (max-width: 768px) {
        .vision-container {
            margin-top: -80px; 
        }
        .vision-overlay-box .carousel-item img {
            height: 250px; 
        }
        .news-grid {
            flex-direction: column; 
        }
    }
</style>


<section class="programme-hero">
    <div class="slider-thumb">
        <img src="assets/public/images/bg-shape-1.png">
    </div>

    <div class="container">
        <p class="small fw-bold mb-3">> SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h1 class="display-3 fw-bold mb-4">Reimagining Ageing<br>
        through the Power of<br>
        the Arts Together
        </h1>
        <p class="lead mb-5" style="max-width: 600px;">
             St Luke's ElderCare (SLEC) and Nanyang Academy of FIne Arts<br>
             (NAFA),University of the Arts Singapore (UAS) have been<br>
             collaborating to bring together arts education and community care<br>
             to promote innovative approaches in enaging seniors and<br>
             supporting their well-being
        </p>
    </div>
</section>

<div class="container vision-container">
    <div class="vision-overlay-box">
        <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="2"></button>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/public/images/carousel-1.jpg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/public/images/carousel-2.jpg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="assets/public/images/carousel-3.jpg" class="d-block w-100" alt="Slide 3">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<section class="position-relative bg-white pb-5">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6 ps-lg-5 order-1 order-lg-2 position-relative" style="z-index: 2;">
                <p class="profile-text">The two Organisastions formalised their partnership with the.
                <br>signing of Memorandum of Understanding in August 2025,
                <br> and the Ageing Artfully Conference is one of the
                <br> partnership highlights.
                </p>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 order-2 order-lg-1"></div>
        </div>
    </div>
</section>

<section class="objectives-section">
    <div class="container">
        <h2 class="section-title text-right mb-5">Conference Objectives</h2>
        <p style="color: white; font-size: 32px; font-style:DM Sans;">Through interdisciplinary dialogue among artists, academics, 
          <br>eldercare professionals,community partners,and older adults themselves,<br>
            the conference aims to:
       </p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-1">
                    <i class="fas fa-sync-alt"></i>
                    <h4>Shift the narrative</h4>
                    <p>from arts as therapy to arts<br>as living practice</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-2">
                    <i class="fas fa-sync-alt"></i>
                    <h4>Deepen dignity</h4>
                    <p>and agency-centerd<br>approaches in ageing</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-3">
                    <i class="fas fa-seedling"></i>
                    <h4>Inspire sustainable</h4>
                    <p>community-integrated<br>creative ecosystem</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-4">
                    <i class="fas fa-level-up-alt"></i>
                    <h4>Elevate older adults</h4>
                    <p>as active contributors<br>to cultural life</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news-section">
    <div class="container">
        <div class="news-grid">
            <div class="news-item">
                <img src="assets/public/images/about-slec.png">
                <div class="news-content">
                    <h3>About St Luke's ElderCare</h3>
                    <p>SLEC was established 19XX and together thet<br>
                    revolutionized care industry in Singapore</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>

            <div class="news-item">
                <img src="assets/public/images/about-nafa.png">
                <div class="news-content">
                    <h3>About Nanyang Academy</h3>
                    <p>NAFA is Singapore pioner arts institutions and<br>
                    a founding member of the University of the Arts Singapore(UAS)
                   </p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end file application/views/public/about.php -->

<!-- file application/controllers/Home.php -->
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
?>
<!-- end file application/controllers/Home.php -->

<!-- file application/views/public/home.php -->
<style>
    /* TYPOGRAPHY OVERRIDES */
    h1, h2, h3, h4, h5, h6 { font-weight: 800; letter-spacing: -0.5px; }
    p { font-weight: 400; line-height: 1.7; }

    /* HERO SECTION */
    .home-hero {
        background-color: #5156B8;
        color: white;
        padding: 80px 0 120px;
        position: relative;
        text-align: center;
        overflow: hidden;
    }
    .hero-pretitle { font-weight: 700; text-transform: uppercase; font-size: 14px; margin-bottom: 20px; letter-spacing: 1px; }
    .hero-title-img { max-width: 600px; width: 100%; margin-bottom: 20px; }
    .hero-subtitle { font-size: 24px; font-weight: 600; margin-bottom: 30px; }
    .hero-date { font-size: 18px; font-weight: 500; margin-bottom: 40px; }
    .btn-outline-white {
        border: 2px solid white; color: white; border-radius: 30px; padding: 10px 30px; font-weight: 700; transition: 0.3s; text-decoration: none;
    }
    .btn-outline-white:hover { background-color: white; color: #5156B8; }
    
    /* Hero Ornaments */
    .hero-shape { position: absolute; right: -5%; top: 10%; max-width: 400px; opacity: 0.8; z-index: 0; }
    .hero-ballet { position: absolute; right: 15%; bottom: 10%; max-width: 80px; z-index: 1; }

    /* INTRO SECTION */
    .intro-section {
        background-color: #FFDEB3; 
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    .intro-title { font-size: 52px; color: #111; line-height: 1.1; margin-bottom: 30px; }
    .intro-text { font-size: 18px; color: #333; margin-bottom: 20px; font-weight: 500; }
    .intro-brush { position: absolute; top: 10%; left: 5%; max-width: 250px; }
    .intro-mask { position: absolute; bottom: 10%; left: 10%; max-width: 150px; }

    /* MATTERS & CAROUSEL SECTION */
    .matters-section { padding: 100px 0; background-color: #FAFAFA; position: relative; }
    .matters-title { font-size: 48px; color: #5156B8; margin-bottom: 20px; }
    .matters-mic { position: absolute; right: 15%; top: 50px; max-width: 200px; }
    
    /* Carousel Styling (UPDATED TO MATCH ABOUT.PHP LANDSCAPE) */
    .carousel-inner { border-radius: 30px; box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
    .carousel-item img { 
        height: 400px; /* Diubah dari 600px menjadi 400px agar landscape */
        object-fit: cover; 
        border-radius: 30px; /* Mengikuti lekukan inner */
    }
    .carousel-indicators { bottom: 10px; }
    .carousel-indicators [data-bs-target] { width: 10px; height: 10px; border-radius: 50%; background-color: rgba(255,255,255,0.6); border: none; margin: 0 5px; }
    .carousel-indicators .active { background-color: white; }

    /* REIMAGINING SECTION (PILLARS) */
    .reimagining-section { background-color: #5156B8; padding: 100px 0; position: relative; color: white; }
    .reimagining-title { font-size: 48px; line-height: 1.2; margin-bottom: 60px; }
    .reimagining-layer { position: absolute; left: 5%; top: 10%; max-width: 300px; }

    .pillar-card { border-radius: 20px; padding: 40px; height: 100%; color: #111; display: flex; flex-direction: column; align-items: flex-start; }
    .pillar-card i { font-size: 32px; margin-bottom: 20px; }
    .pillar-card h3 { font-size: 28px; margin-bottom: 15px; }
    .pillar-card p { font-size: 15px; flex-grow: 1; }
    .pillar-card .btn-more { border: 1px solid #111; border-radius: 20px; padding: 5px 20px; font-weight: 700; font-size: 14px; background: transparent; color: #111; text-decoration: none; cursor: pointer; transition: 0.3s; }
    .pillar-card .btn-more:hover { background: #111; color: white; }

    /* Card Colors */
    .card-yellow { background-color: #FCE170; }
    .card-blue { background-color: #92B9FA; }
    .card-pink { background-color: #FBD3E5; }

    /* =========================================
       MODAL POP-UP CUSTOM (PILLARS)
       ========================================= */
    .modal-kustom .modal-content { 
        border-radius: 24px; 
        border: none; 
        background-color: #FFFFFF;
        padding: 20px;
    }
    
    .modal-kustom .header-card {
        border-radius: 20px;
        padding: 40px;
        position: relative;
        overflow: hidden;
        margin-bottom: 25px;
    }
    .modal-kustom .header-card-yellow { background-color: #F8E387; }
    .modal-kustom .header-card-blue { background-color: #9DBBFA; }
    .modal-kustom .header-card-pink { background-color: #F8CDEC; }

    .modal-kustom .btn-go-back {
        border: 1px solid #111;
        border-radius: 20px;
        padding: 5px 20px;
        font-size: 12px;
        font-weight: 500;
        background: transparent;
        color: #111;
        margin-bottom: 30px;
        transition: 0.3s;
    }
    .modal-kustom .btn-go-back:hover { background: #111; color: white; }

    .modal-kustom .header-title { font-size: 42px; font-weight: 800; color: #111; margin-bottom: 5px; line-height: 1.1; }
    .modal-kustom .header-icon { font-size: 24px; vertical-align: middle; margin-left: 10px; opacity: 0.8; }
    .modal-kustom .header-subtitle { font-size: 26px; font-weight: 400; color: #111; line-height: 1.3; margin-bottom: 0; }
    .modal-kustom .header-bg-icon { position: absolute; right: 8%; top: 50%; transform: translateY(-50%); font-size: 150px; color: #000; opacity: 0.05; pointer-events: none; }
    .modal-kustom .desc-card { background: #FFFFFF; border: 1px solid #D9D9D9; border-radius: 16px; padding: 30px 35px; margin-bottom: 25px; font-size: 18px; color: #111; line-height: 1.5; }
    .modal-kustom .list-unstyled { padding: 0; margin: 0; }
    .modal-kustom .list-item-card { background-color: #EFEFEF; border-radius: 12px; padding: 22px 30px; margin-bottom: 15px; font-weight: 700; font-size: 16px; color: #111; }

    /* =========================================
       WORKSHOPS SECTION
       ========================================= */
    .home-workshops { padding: 80px 0; }
    .hw-title { font-size: 52px; color: #5156B8; line-height: 1.1; margin-bottom: 30px; }
    .stat-box { border-radius: 15px; padding: 25px; height: 100%; display: flex; flex-direction: column; justify-content: center; }
    .stat-box .display-4 { font-weight: 800; color: #111; }
    .stat-box h5 { color: #111; font-weight: 600; margin: 0; }
    
    /* MODIFIKASI FILTER TAGS */
    .tag-pill { border: 1px solid #5156B8; color: #5156B8; border-radius: 20px; padding: 5px 15px; font-size: 13px; display: inline-block; margin: 0 5px 10px 0; text-decoration: none; transition: 0.2s; background-color: transparent; }
    .tag-pill:hover, .tag-pill.active { background-color: #5156B8; color: white; }
    
    .workshop-card { border: 1px solid #E0E0E0; border-radius: 15px; padding: 25px; text-align: center; height: 100%; background-color: white; display: flex; flex-direction: column; }
    .workshop-img { width: 100px; height: 100px; object-fit: cover; border-radius: 15px; margin: 0 auto 20px; }
    .workshop-title { color: #5156B8; font-weight: 700; font-size: 18px; margin-bottom: 10px; }
    .workshop-subtitle { font-size: 13px; color: #555; margin-bottom: 20px; flex-grow: 1; }
    .workshop-fac-name { color: #5156B8; font-weight: 600; font-size: 14px; margin-bottom: 2px; }
    .workshop-fac-org { font-size: 11px; color: #777; margin-bottom: 20px; }
    .btn-read-more { background-color: #7C83DB; color: white; border-radius: 20px; padding: 6px 25px; font-size: 13px; font-weight: 600; border: none; align-self: center; text-decoration: none; transition: 0.3s; }
    .btn-read-more:hover { background-color: #5156B8; color: white; }

    /* PENAMBAHAN CSS ANIMASI JS */
    .workshop-wrapper { transition: opacity 0.4s ease, transform 0.4s ease; opacity: 1; transform: scale(1); }
    .workshop-wrapper.fade-out { opacity: 0; transform: scale(0.95); }

    /* =========================================
       MODAL WORKSHOP DETAIL (NEW 3-SECTION LAYOUT)
       ========================================= */
    .modal-workshop-detail .modal-content {
        border-radius: 30px; 
        border: none;
        background-color: #FFFFFF;
        padding: 30px; 
    }
    
    .modal-workshop-detail .modal-header-custom {
        padding: 40px;
        color: #111;
        border-radius: 20px; 
        margin-bottom: 30px; 
    }
    
    .modal-workshop-detail .btn-go-back {
        color: #111;
        font-weight: 600;
        text-decoration: none;
        padding: 0;
        background: none;
        border: none;
        margin-bottom: 20px;
        font-size: 16px;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .modal-workshop-detail .ws-title {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 10px;
        color: #111;
    }
    
    .modal-workshop-detail .ws-subtitle {
        font-size: 20px;
        color: #111;
        font-weight: 500;
        margin-bottom: 0;
    }

    .modal-workshop-detail .modal-body-custom { padding: 0; }
    .modal-workshop-detail .info-card { background-color: #F4F4F6; border-radius: 20px; padding: 40px; height: 100%; }
    .modal-workshop-detail .ws-heading { color: #111; font-size: 18px; font-weight: 800; margin-bottom: 15px; display: flex; align-items: center; gap: 10px; }
    .modal-workshop-detail .ws-heading i { color: #5156B8; font-size: 20px; }
    .modal-workshop-detail .ws-text { font-size: 16px; color: #111; line-height: 1.6; margin-bottom: 30px; }

    .modal-workshop-detail .fac-header-row { display: flex; align-items: center; gap: 20px; margin-bottom: 20px; }
    .modal-workshop-detail .fac-img { width: 100px; height: 100px; border-radius: 12px; object-fit: cover; }
    .modal-workshop-detail .fac-name { font-size: 20px; font-weight: 800; color: #111; margin-bottom: 5px; }
    .modal-workshop-detail .fac-role { font-size: 16px; color: #444; font-weight: 500; }

    .modal-workshop-detail .ws-tag-pill {
        border: 1px solid #5156B8;
        color: #5156B8;
        background-color: transparent;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin: 0 10px 10px 0;
    }

    /* MEDIA QUERY UNTUK MOBILE */
    @media (max-width: 768px) {
        .carousel-item img {
            height: 250px; /* Menyesuaikan proporsi landscape di layar kecil */
        }
    }
</style>

<section class="home-hero">
    <img src="<?= base_url('assets/public/images/home-hero-shape.png') ?>" alt="" class="hero-shape d-none d-md-block">
    <img src="<?= base_url('assets/public/images/icon-ballet-white.png') ?>" alt="" class="hero-ballet d-none d-md-block">
    <div class="container position-relative" style="z-index: 2;">
        <div class="hero-pretitle">SLEC × NAFA Present</div>
        <img src="<?= base_url('assets/public/images/footer-logo.png') ?>" alt="Ageing Artfully Conference 2026" class="hero-title-img">
        <h2 class="hero-subtitle">Living Everyday Joys Through the Arts</h2>
        <div class="hero-date">Wednesday, 22 July 2026<br>9 AM - 5 PM</div>
        <a href="#intro" class="btn-outline-white">Explore More ></a>
    </div>
</section>

<section id="intro" class="intro-section">
    <img src="<?= base_url('assets/public/images/icon-brush.png') ?>" alt="" class="intro-brush d-none d-lg-block">
    <img src="<?= base_url('assets/public/images/icon-mask.png') ?>" alt="" class="intro-mask d-none d-lg-block">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6 position-relative" style="z-index: 2;">
                <h2 class="intro-title">Living Everyday<br>Joys Through<br>the Arts</h2>
                <p class="intro-text">SLEC x NAFA Ageing Artfully Conference 2026 invites a shift in perspective, from viewing the arts as intervention to embracing them as a lifelong practice that shapes identity, purpose, and belonging.</p>
                <p class="intro-text">Bringing together artists, academics, eldercare professionals, community partners, and older adults, this conference explores how creativity can be embedded into everyday life, beyond programmes and into lived experience.</p>
            </div>
        </div>
    </div>
</section>

<section class="matters-section">
    <img src="<?= base_url('assets/public/images/icon-mic.png') ?>" alt="" class="matters-mic d-none d-md-block">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7">
                <h2 class="matters-title">Why it Matters</h2>
                <p style="font-size: 18px;">Creativity in later life goes beyond well-being. It affirms identity, nurtures connection, and enables meaningful contribution, supporting older adults as active participants in cultural and community life.</p>
            </div>
        </div>
        <div id="conferenceCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#conferenceCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#conferenceCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#conferenceCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active"><img src="<?= base_url('assets/public/images/carousel-1.jpg') ?>" class="d-block w-100" alt=""></div>
                <div class="carousel-item"><img src="<?= base_url('assets/public/images/carousel-2.jpg') ?>" class="d-block w-100" alt=""></div>
                <div class="carousel-item"><img src="<?= base_url('assets/public/images/carousel-3.jpg') ?>" class="d-block w-100" alt=""></div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#conferenceCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
            <button class="carousel-control-next" type="button" data-bs-target="#conferenceCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
        </div>
    </div>
</section>

<section class="reimagining-section">
    <img src="<?= base_url('assets/public/images/icon-layer.png') ?>" alt="" class="reimagining-layer d-none d-lg-block">
    <div class="container">
        <div class="row justify-content-end mb-4">
            <div class="col-lg-8 text-lg-end">
                <h2 class="reimagining-title">Reimagining ageing<br>through <span style="color: #92B9FA;">creation</span>,<br><span style="color: #92B9FA;">connection</span> and<br><span style="color: #92B9FA;">contribution</span></h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="pillar-card card-yellow">
                    <i class="fas fa-leaf"></i>
                    <h3>Creation</h3>
                    <p>Creation in later life is an affirmation of identity. Through storytelling, artistic practice, and everyday creativity, individuals continue to express who they are and who they are becoming.</p>
                    <button class="btn-more" data-bs-toggle="modal" data-bs-target="#modalCreation">Read More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pillar-card card-blue">
                    <i class="fas fa-project-diagram"></i>
                    <h3>Connection</h3>
                    <p>The arts foster relationships across individuals, generations, and communities—creating shared spaces for belonging and mutual understanding.</p>
                    <button class="btn-more" data-bs-toggle="modal" data-bs-target="#modalConnection">Read More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pillar-card card-pink">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Contribution</h3>
                    <p>Older adults are not passive participants, but active contributors—mentors, collaborators, and cultural bearers whose creative engagement enriches society.</p>
                    <button class="btn-more" data-bs-toggle="modal" data-bs-target="#modalContribution">Read More</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-workshops">
    <div class="container">
        <p class="small text-muted fw-bold mb-2">SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h2 class="hw-title">More Workshops<br>More Learning</h2>
        <div class="row g-3 mb-5" style="max-width: 600px;">
            <div class="col-4"><div class="stat-box" style="background-color: #F8E6EC;"><div class="display-4">3</div><h5>Conference<br>Sessions</h5></div></div>
            <div class="col-4"><div class="stat-box" style="background-color: #EAE6FB;"><div class="display-4">10</div><h5>Breakout<br>Workshops</h5></div></div>
            <div class="col-4"><div class="stat-box" style="background-color: #DDF2F8;"><div class="display-4">1 Day</div><h5>Full of<br>Lectures</h5></div></div>
        </div>
        <p class="mb-4" style="font-size: 18px; max-width: 700px;">Participants are invited to choose up to 4 workshops based on their interests and the needs of the seniors they work with.</p>
        
        <div class="mb-5">
            <?php foreach($tags as $t): ?>
                <a href="javascript:void(0)" class="tag-pill" data-tag="<?= htmlspecialchars($t->tag_name) ?>">
                    <?= htmlspecialchars($t->tag_name) ?> <i class="fas fa-tag ms-1 opacity-50"></i>
                </a>
            <?php endforeach; ?>
        </div>
        
        <div class="row g-4">
            <?php foreach($workshops as $w): ?>
            <div class="col-md-6 col-lg-4 workshop-wrapper" data-tags="<?= htmlspecialchars(implode(',', $w->tag_names)) ?>">
                <div class="workshop-card">
                    <?php 
                        if($w->primary_facilitator && $w->primary_facilitator->image_path != 'default.png') { $fac_img = base_url('uploads/facilitators/'.$w->primary_facilitator->image_path); } 
                        else { $fac_name = $w->primary_facilitator ? $w->primary_facilitator->name : 'N/A'; $fac_img = 'https://ui-avatars.com/api/?name='.urlencode($fac_name).'&background=random'; }
                    ?>
                    <img src="<?= $fac_img ?>" alt="" class="workshop-img shadow-sm">
                    <h3 class="workshop-title"><?= htmlspecialchars($w->title) ?></h3>
                    <p class="workshop-subtitle"><?= htmlspecialchars($w->subtitle) ?></p>
                    <?php if($w->primary_facilitator): ?>
                        <p class="workshop-fac-name"><?= htmlspecialchars($w->primary_facilitator->name) ?></p>
                        <p class="workshop-fac-org"><?= htmlspecialchars($w->primary_facilitator->designation) ?><br><?= htmlspecialchars($w->primary_facilitator->organization) ?></p>
                    <?php endif; ?>
                    <button type="button" class="btn-read-more mt-auto" data-bs-toggle="modal" data-bs-target="#modalWorkshop<?= $w->id ?>">Read More</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="modal fade modal-kustom" id="modalCreation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="header-card header-card-yellow">
                <i class="fas fa-paint-brush header-bg-icon d-none d-md-block"></i>
                <button type="button" class="btn btn-go-back" data-bs-dismiss="modal">Go Back</button>
                <h2 class="header-title">Creation <i class="fas fa-feather-alt header-icon"></i></h2>
                <h3 class="header-subtitle">Affirming Identity and<br>Lifelong Creative Practice</h3>
            </div>
            <div class="desc-card">
                Creation in later life is not merely therapeutic—it is an affirmation of selfhood. We explore how the arts serve as a medium through which personal histories, values, and evolving aspirations continue to find expression.
            </div>
            <ul class="list-unstyled">
                <li class="list-item-card">Creative identity beyond illness, frailty, or institutional labels</li>
                <li class="list-item-card">Lifelong artistic practice as a source of meaning and resilience</li>
                <li class="list-item-card">Storytelling, memory-making, and narrative continuity</li>
                <li class="list-item-card">Designing environments and systems that sustain everyday creativity</li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade modal-kustom" id="modalConnection" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="header-card header-card-blue">
                <i class="fas fa-hands-helping header-bg-icon d-none d-md-block"></i>
                <button type="button" class="btn btn-go-back" data-bs-dismiss="modal">Go Back</button>
                <h2 class="header-title">Connection <i class="fas fa-link header-icon"></i></h2>
                <h3 class="header-subtitle">Strengthening Relationships<br>and Belonging</h3>
            </div>
            <div class="desc-card">
                Arts create spaces where relationships flourish—between individuals, generations, cultures, and communities. We examine how creative engagement fosters belonging and mutual understanding in later life.
            </div>
            <ul class="list-unstyled">
                <li class="list-item-card">Intergenerational arts collaborations</li>
                <li class="list-item-card">Community-embedded and culturally grounded creative practices</li>
                <li class="list-item-card">Arts as a bridge between care settings and the wider community</li>
                <li class="list-item-card">Building relational, not just programme-based, approaches to engagement</li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade modal-kustom" id="modalContribution" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="header-card header-card-pink">
                <i class="fas fa-pen-nib header-bg-icon d-none d-md-block" style="transform: translateY(-50%) rotate(-45deg);"></i>
                <button type="button" class="btn btn-go-back" data-bs-dismiss="modal">Go Back</button>
                <h2 class="header-title">Contribution <i class="fas fa-sun header-icon"></i></h2>
                <h3 class="header-subtitle">Elders as Co-creators and<br>Collaborators</h3>
            </div>
            <div class="desc-card">
                Beyond participation lies contribution. We reframe older adults not as passive recipients of care, but as creators, mentors, and knowledge holders whose artistic engagement enriches society.
            </div>
            <ul class="list-unstyled">
                <li class="list-item-card">Elders as co-creators and collaborators in artistic practice</li>
                <li class="list-item-card">Mentorship, transmission of skills, and cultural memory</li>
                <li class="list-item-card">Art as legacy building and purpose making</li>
                <li class="list-item-card">Ethical and participatory models that centre voice and authorship</li>
            </ul>
        </div>
    </div>
</div>

<?php 
// Memanggil model secara dinamis di dalam view 
$CI =& get_instance();
$CI->load->model('Tag_model');
$CI->load->model('Workshop_model');

// Array palet warna pastel yang cerah namun memastikan tulisan hitam tetap terbaca dengan jelas (mirip header di gambar)
$header_colors = ['#FDBA74', '#FCA5A5', '#A7F3D0', '#BAE6FD', '#C4B5FD', '#FBCFE8', '#FDE047', '#D9F99D'];

foreach($workshops as $w): 
    // Ambil warna header secara acak untuk setiap iterasi pop-up
    $active_bg = $header_colors[array_rand($header_colors)];

    // Ambil tag spesifik untuk workshop ini
    $related_tag_ids = $CI->Workshop_model->get_related_tags($w->id);
    $workshop_specific_tags = [];
    foreach($related_tag_ids as $tid) {
        $tag_obj = $CI->Tag_model->get_by_id($tid);
        if($tag_obj) $workshop_specific_tags[] = $tag_obj->tag_name;
    }
?>
<div class="modal fade modal-workshop-detail" id="modalWorkshop<?= $w->id ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content shadow-lg">
            
            <div class="modal-header-custom" style="background-color: <?= $active_bg ?>;">
                <button type="button" class="btn-go-back" data-bs-dismiss="modal">
                    <i class="fas fa-chevron-left"></i> Go Back
                </button>
                <h2 class="ws-title"><?= htmlspecialchars($w->title) ?></h2>
                <h5 class="ws-subtitle"><?= htmlspecialchars($w->subtitle) ?></h5>
            </div>

            <div class="modal-body-custom">
                <div class="row g-4">
                    
                    <div class="col-lg-6">
                        <div class="info-card">
                            <h6 class="ws-heading"><i class="fas fa-clipboard-list"></i> Workshop Synopsis</h6>
                            <p class="ws-text"><?= nl2br(htmlspecialchars($w->synopsis)) ?></p>
                            
                            <h6 class="ws-heading"><i class="fas fa-map-marker-alt"></i> Workshop Location</h6>
                            <p class="ws-text"><?= htmlspecialchars($w->location_venue) ?><br><?= htmlspecialchars($w->location_room) ?></p>
                            
                            <h6 class="ws-heading"><i class="fas fa-check-double"></i> Best Suited for</h6>
                            <p class="ws-text" style="margin-bottom: 25px;"><?= htmlspecialchars($w->best_suited_for) ?></p>
                            
                            <div>
                                <?php foreach($workshop_specific_tags as $tag_name): ?>
                                    <span class="ws-tag-pill">
                                        <?= htmlspecialchars($tag_name) ?> <i class="fas fa-star" style="font-size: 12px; opacity: 0.7;"></i>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="info-card">
                            <h6 class="ws-heading"><i class="far fa-id-badge"></i> Facilitator Profile</h6>
                            
                            <?php if($w->primary_facilitator): ?>
                                <div class="fac-header-row mt-4">
                                    <?php 
                                        if($w->primary_facilitator && $w->primary_facilitator->image_path != 'default.png') { 
                                            $fac_img_detail = base_url('uploads/facilitators/'.$w->primary_facilitator->image_path); 
                                        } else { 
                                            $fac_name_detail = $w->primary_facilitator ? $w->primary_facilitator->name : 'Facilitator'; 
                                            $fac_img_detail = 'https://ui-avatars.com/api/?name='.urlencode($fac_name_detail).'&background=random&size=200'; 
                                        }
                                    ?>
                                    <img src="<?= $fac_img_detail ?>" alt="Facilitator" class="fac-img shadow-sm">
                                    
                                    <div>
                                        <div class="fac-name"><?= htmlspecialchars($w->primary_facilitator->name) ?></div>
                                        <div class="fac-role">
                                            <?= htmlspecialchars($w->primary_facilitator->designation) ?><br>
                                            <?= htmlspecialchars($w->primary_facilitator->organization) ?>
                                        </div>
                                    </div>
                                </div>
                                <p class="ws-text mt-3" style="margin-bottom: 0;">
                                    <?= nl2br(htmlspecialchars($w->primary_facilitator->bio)) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tagPills = document.querySelectorAll('.tag-pill');
    const workshopWrappers = document.querySelectorAll('.workshop-wrapper');
    let activeTags = new Set();

    tagPills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const tag = this.getAttribute('data-tag');
            if (activeTags.has(tag)) {
                activeTags.delete(tag);
                this.classList.remove('active');
            } else {
                activeTags.add(tag);
                this.classList.add('active');
            }
            filterContent();
        });
    });

    function filterContent() {
        workshopWrappers.forEach(wrapper => {
            const tagsAttr = wrapper.getAttribute('data-tags');
            const cardTags = tagsAttr ? tagsAttr.split(',').map(t => t.trim()) : [];
            let isMatch = true;

            if (activeTags.size > 0) {
                activeTags.forEach(t => { 
                    if (!cardTags.includes(t)) isMatch = false; 
                });
            }

            if (isMatch) {
                wrapper.classList.remove('d-none');
                setTimeout(() => wrapper.classList.remove('fade-out'), 10);
            } else {
                wrapper.classList.add('fade-out');
                setTimeout(() => { 
                    if(wrapper.classList.contains('fade-out')) wrapper.classList.add('d-none'); 
                }, 400);
            }
        });
    }
});
</script>
<!-- end file application/views/public/home.php -->

<!-- file application/controllers/Pages.php -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function about()
    {
        // Setup SEO Meta
        $data['title'] = 'About Us | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Learn about our vision and the collaboration between St Luke’s ElderCare and Nanyang Academy of Fine Arts.';
        
        // TRIGGER HEADER GELAP
        $data['is_dark_header'] = TRUE; 
        
        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/about', $data);
        $this->load->view('public/layout/footer');
    }

    public function getting_here()
    {
        // Setup SEO Meta
        $data['title'] = 'Getting Here | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'Directions to NAFA Campus 1 for the Ageing Artfully Conference. Find train, bus, and car parking information.';
        
        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/getting_here');
        $this->load->view('public/layout/footer');
    }
}
?>
<!-- end file application/controllers/Pages.php -->

<!-- file application/views/public/getting_here.php -->
<style>
    .page-title {
        color: #5B62C6; /* Warna ungu kebiruan desain */
        font-weight: 800;
        font-size: 48px;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    .page-subtitle {
        color: #5B62C6;
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 40px;
        line-height: 1.4;
    }
    .info-card {
        background-color: #F8F9FA;
        border-radius: 15px;
        padding: 40px;
        margin-bottom: 30px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
    .info-section-title {
        font-weight: 700;
        font-size: 24px;
        color: #000;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .info-section-title i {
        color: #5B62C6;
        margin-right: 15px;
        font-size: 20px;
    }
    .info-text {
        font-size: 16px;
        color: #333;
        line-height: 1.6;
        margin-bottom: 25px;
    }
    .enquiries-section {
        margin-top: 60px;
    }
    .enquiries-title {
        color: #5B62C6;
        font-weight: 800;
        font-size: 42px;
        margin-bottom: 20px;
    }
    .enquiries-box {
        background-color: #F8F9FA;
        border-radius: 15px;
        padding: 30px 40px;
        max-width: 500px;
    }
    .enquiries-box p {
        font-weight: 700;
        margin-bottom: 10px;
        color: #000;
    }
    .enquiries-box a {
        color: #5B62C6;
        text-decoration: underline;
        font-weight: 500;
    }
</style>

<div class="container">
    <h1 class="page-title">Getting Here</h1>
    <h2 class="page-subtitle">NAFA Campus 1, 80 Bencoolen Street,<br>Wing B, Level 2 Seminar Room, Singapore 189655</h2>

    <div class="mb-5">
        <img src="<?= base_url('assets/public/images/map.png') ?>" alt="Map to NAFA Campus 1" class="img-fluid rounded-4 shadow-sm w-100">
    </div>

    <div class="info-card">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="info-section-title">
                    <i class="fas fa-train"></i> Train
                </div>
                <div class="info-text ms-4 ms-md-5">
                    Bencoolen MRT Station DT21 (3 mins walk)<br>
                    Rochor MRT Station DT13 (8 mins walk)<br>
                    Bras Basah MRT Station CC2 (7 mins walk)<br>
                    Dhoby Ghaut MRT Station NS24/NE6/CC1 (11 mins walk)
                </div>

                <div class="info-section-title mt-4">
                    <i class="fas fa-parking"></i> Car
                </div>
                <div class="info-text ms-4 ms-md-5 mb-0">
                    Car parks in NAFA Campus 1 and in proximity are indicated. Click <a href="#" style="color:#5B62C6; text-decoration:underline;">here</a> to view carpark rates.
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-section-title">
                    <i class="fas fa-bus"></i> Bus
                </div>
                <div class="info-text ms-4 ms-md-5 mb-0">
                    <strong>Opp NAFA Campus 3 (07517)</strong><br>
                    <span style="color:#5B62C6;">56, 131, 147, 166, 857, 980</span><br><br>
                    
                    <strong>Sunshine Plaza (07571)</strong><br>
                    <span style="color:#5B62C6;">56</span><br><br>

                    <strong>Before Bencoolen Stn Exit A (04029)</strong><br>
                    <span style="color:#5B62C6;">64, 65, 139</span>
                </div>
            </div>
        </div>
    </div>

    <div class="enquiries-section">
        <h2 class="enquiries-title">Enquiries</h2>
        <div class="enquiries-box">
            <p>For more enquiries please contact</p>
            <a href="mailto:secretariat.ageingartfully@slec.org.sg">secretariat.ageingartfully@slec.org.sg</a>
        </div>
    </div>
</div>
<!-- end file application/views/public/getting_here.php -->

<!-- file application/views/public/speakers.php -->
<style>
    /* Section 1: The Programme Hero */
    .programme-hero {
        background-color: #5156B8; /* Navy Blue */
        color: white;
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }
    .shape-1 {
        position: absolute;
        top: 0;
        right: 0;
        max-width: 400px;
        z-index: 0;
    }
    .programme-hero .container {
        position: relative;
        z-index: 1;
    }
    .stat-card {
        border-radius: 15px;
        border: none;
        height: 100%;
    }
    .stat-card .display-4 {
        font-weight: 800;
        color: #1B2A47;
    }
    .stat-card h5 {
        color: #1B2A47;
        font-weight: 600;
    }

    /* Section 2: Plenary Speakers */
    .section-title {
        color: #5156B8;
        font-weight: 800;
        font-size: 42px;
        margin-bottom: 15px;
    }
    .speaker-card {
        border: 1px solid #5156B8;
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        height: 100%;
        background-color: white;
        transition: transform 0.3s;
    }
    .speaker-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(81, 86, 184, 0.1);
    }
    .speaker-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 15px; 
        margin-bottom: 20px;
    }
    .speaker-name {
        color: #5156B8;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .speaker-title {
        font-size: 14px;
        color: #333;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .speaker-org {
        font-size: 12px;
        color: #5156B8;
        font-weight: 700;
    }

    /* Section 3: Breakout Workshops */
    .workshops-section {
        position: relative;
        padding: 60px 0;
        scroll-margin-top: 80px; 
    }
    .shape-2 {
        position: absolute;
        top: 0;
        right: 0;
        max-width: 300px;
        z-index: -1;
    }
    
    /* MODIFIKASI FILTER TAGS */
    .tag-pill {
        border: 1px solid #5156B8;
        color: #5156B8;
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 13px;
        display: inline-block;
        margin: 0 5px 10px 0;
        background: transparent;
        text-decoration: none;
        transition: all 0.2s;
    }
    .tag-pill:hover, .tag-pill.active {
        background-color: #5156B8;
        color: white;
    }
    
    /* PENAMBAHAN CSS ANIMASI JS */
    .workshop-wrapper { transition: opacity 0.4s ease, transform 0.4s ease; opacity: 1; transform: scale(1); }
    .workshop-wrapper.fade-out { opacity: 0; transform: scale(0.95); }

    .workshop-card {
        border: 1px solid #E0E0E0;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        height: 100%;
        background-color: white;
        display: flex;
        flex-direction: column;
    }
    .workshop-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 15px;
        margin: 0 auto 20px;
    }
    .workshop-title {
        color: #5156B8;
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .workshop-subtitle {
        font-size: 13px;
        color: #555;
        margin-bottom: 20px;
        flex-grow: 1;
    }
    .workshop-fac-name {
        color: #5156B8;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 2px;
    }
    .workshop-fac-org {
        font-size: 11px;
        color: #777;
        margin-bottom: 20px;
    }
    .btn-read-more {
        background-color: #7C83DB;
        color: white;
        border-radius: 20px;
        padding: 6px 25px;
        font-size: 13px;
        font-weight: 600;
        border: none;
        align-self: center;
        text-decoration: none;
        transition: 0.3s;
    }
    .btn-read-more:hover {
        background-color: #5156B8;
        color: white;
    }

    /* =========================================
       MODAL WORKSHOP DETAIL (FROM HOME.PHP)
       ========================================= */
    .modal-workshop-detail .modal-content { border-radius: 30px; border: none; background-color: #FFFFFF; padding: 30px; }
    .modal-workshop-detail .modal-header-custom { padding: 40px; color: #111; border-radius: 20px; margin-bottom: 30px; }
    .modal-workshop-detail .btn-go-back { color: #111; font-weight: 600; text-decoration: none; padding: 0; background: none; border: none; margin-bottom: 20px; font-size: 16px; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px; }
    .modal-workshop-detail .ws-title { font-size: 42px; font-weight: 800; line-height: 1.2; margin-bottom: 10px; color: #111; }
    .modal-workshop-detail .ws-subtitle { font-size: 20px; color: #111; font-weight: 500; margin-bottom: 0; }
    .modal-workshop-detail .modal-body-custom { padding: 0; }
    .modal-workshop-detail .info-card { background-color: #F4F4F6; border-radius: 20px; padding: 40px; height: 100%; }
    .modal-workshop-detail .ws-heading { color: #111; font-size: 18px; font-weight: 800; margin-bottom: 15px; display: flex; align-items: center; gap: 10px; }
    .modal-workshop-detail .ws-heading i { color: #5156B8; font-size: 20px; }
    .modal-workshop-detail .ws-text { font-size: 16px; color: #111; line-height: 1.6; margin-bottom: 30px; }
    .modal-workshop-detail .fac-header-row { display: flex; align-items: center; gap: 20px; margin-bottom: 20px; }
    .modal-workshop-detail .fac-img { width: 100px; height: 100px; border-radius: 12px; object-fit: cover; }
    .modal-workshop-detail .fac-name { font-size: 20px; font-weight: 800; color: #111; margin-bottom: 5px; }
    .modal-workshop-detail .fac-role { font-size: 16px; color: #444; font-weight: 500; }
    .modal-workshop-detail .ws-tag-pill { border: 1px solid #5156B8; color: #5156B8; background-color: transparent; padding: 8px 20px; border-radius: 30px; font-size: 14px; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; margin: 0 10px 10px 0; }
</style>

<section class="programme-hero">
    <img src="<?= base_url('assets/public/images/bg-shape-1.png') ?>" alt="" class="shape-1">
    <div class="container">
        <p class="small fw-bold mb-3">> SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h1 class="display-3 fw-bold mb-4">The Programme</h1>
        <p class="lead mb-5" style="max-width: 600px;">
            At the heart of the conference is the belief that the arts are not just activities, but everyday practices that support connection, identity, and well-being.
        </p>
        
        <div class="row g-4" style="max-width: 700px;">
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #F8E6EC;">
                    <div class="card-body p-4">
                        <div class="display-4">4</div>
                        <h5>Plenary<br>Sessions</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #EAE6FB;">
                    <div class="card-body p-4">
                        <div class="display-4">10</div>
                        <h5>Breakout<br>Workshops</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #DDF2F8;">
                    <div class="card-body p-4">
                        <div class="display-4">1 Day</div>
                        <h5>Full of<br>Lectures</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 mt-4">
    <h2 class="section-title">The Speakers</h2>
    <p class="mb-5" style="max-width: 800px; color: #333; font-size: 18px;">
        This year's conference features speakers from across a wide range of fields, bringing together diverse perspectives to offer a multidisciplinary look at the future of ageing. These plenary sessions are designed to inspire and widen your horizons through innovative approaches to senior well-being.
    </p>

    <div class="row g-4">
        <?php foreach($speakers as $s): ?>
        <div class="col-md-6 col-lg-3">
            <div class="speaker-card">
                <?php $img_src = ($s->image_path != 'default.png' && $s->image_path != '') ? base_url('uploads/speakers/'.$s->image_path) : 'https://ui-avatars.com/api/?name='.urlencode($s->name).'&background=random'; ?>
                <img src="<?= $img_src ?>" alt="<?= htmlspecialchars($s->name) ?>" class="speaker-img shadow-sm">
                
                <h3 class="speaker-name"><?= htmlspecialchars($s->name) ?></h3>
                <p class="speaker-title"><?= htmlspecialchars($s->designation) ?></p>
                <p class="speaker-org mb-0"><?= htmlspecialchars(substr($s->bio_summary, 0, 50)) ?>...</p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="workshops-section" id="breakout-workshops">
    <img src="<?= base_url('assets/public/images/bg-shape-2.png') ?>" alt="" class="shape-2">
    <div class="container">
        <h2 class="section-title">Breakout Workshops</h2>
        <p class="mb-4" style="max-width: 600px; color: #333; font-size: 18px;">
            Participants are invited to choose up to 4 workshops based on their interests and the needs of the seniors they work with.
        </p>

        <div class="mb-5">
            <?php foreach($tags as $t): ?>
                <a href="javascript:void(0)" class="tag-pill" data-tag="<?= htmlspecialchars($t->tag_name) ?>"><?= htmlspecialchars($t->tag_name) ?></a>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php foreach($workshops as $w): ?>
            <div class="col-md-6 col-lg-4 workshop-wrapper" data-tags="<?= htmlspecialchars(implode(',', $w->tag_names)) ?>">
                <div class="workshop-card">
                    <?php 
                        if($w->primary_facilitator && $w->primary_facilitator->image_path != 'default.png') {
                            $fac_img = base_url('uploads/facilitators/'.$w->primary_facilitator->image_path);
                        } else {
                            $fac_name = $w->primary_facilitator ? $w->primary_facilitator->name : 'N/A';
                            $fac_img = 'https://ui-avatars.com/api/?name='.urlencode($fac_name).'&background=random';
                        }
                    ?>
                    <img src="<?= $fac_img ?>" alt="Facilitator" class="workshop-img shadow-sm">
                    
                    <h3 class="workshop-title"><?= htmlspecialchars($w->title) ?></h3>
                    <p class="workshop-subtitle"><?= htmlspecialchars($w->subtitle) ?></p>
                    
                    <?php if($w->primary_facilitator): ?>
                        <p class="workshop-fac-name"><?= htmlspecialchars($w->primary_facilitator->name) ?></p>
                        <p class="workshop-fac-org"><?= htmlspecialchars($w->primary_facilitator->designation) ?><br><?= htmlspecialchars($w->primary_facilitator->organization) ?></p>
                    <?php endif; ?>

                    <button type="button" class="btn-read-more mt-auto" data-bs-toggle="modal" data-bs-target="#modalWorkshop<?= $w->id ?>">Read More</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php 
// Memanggil model secara dinamis di dalam view (SAYA BIARKAN UTUH)
$CI =& get_instance();
$CI->load->model('Tag_model');
$CI->load->model('Workshop_model');

// Array palet warna pastel
$header_colors = ['#FDBA74', '#FCA5A5', '#A7F3D0', '#BAE6FD', '#C4B5FD', '#FBCFE8', '#FDE047', '#D9F99D'];

foreach($workshops as $w): 
    // Ambil warna header secara acak untuk setiap iterasi pop-up
    $active_bg = $header_colors[array_rand($header_colors)];

    // Ambil tag spesifik untuk workshop ini
    $related_tag_ids = $CI->Workshop_model->get_related_tags($w->id);
    $workshop_specific_tags = [];
    foreach($related_tag_ids as $tid) {
        $tag_obj = $CI->Tag_model->get_by_id($tid);
        if($tag_obj) $workshop_specific_tags[] = $tag_obj->tag_name;
    }
?>
<div class="modal fade modal-workshop-detail" id="modalWorkshop<?= $w->id ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content shadow-lg">
            
            <div class="modal-header-custom" style="background-color: <?= $active_bg ?>;">
                <button type="button" class="btn-go-back" data-bs-dismiss="modal">
                    <i class="fas fa-chevron-left"></i> Go Back
                </button>
                <h2 class="ws-title"><?= htmlspecialchars($w->title) ?></h2>
                <h5 class="ws-subtitle"><?= htmlspecialchars($w->subtitle) ?></h5>
            </div>

            <div class="modal-body-custom">
                <div class="row g-4">
                    
                    <div class="col-lg-6">
                        <div class="info-card">
                            <h6 class="ws-heading"><i class="fas fa-clipboard-list"></i> Workshop Synopsis</h6>
                            <p class="ws-text"><?= nl2br(htmlspecialchars($w->synopsis)) ?></p>
                            
                            <h6 class="ws-heading"><i class="fas fa-map-marker-alt"></i> Workshop Location</h6>
                            <p class="ws-text"><?= htmlspecialchars($w->location_venue) ?><br><?= htmlspecialchars($w->location_room) ?></p>
                            
                            <h6 class="ws-heading"><i class="fas fa-check-double"></i> Best Suited for</h6>
                            <p class="ws-text" style="margin-bottom: 25px;"><?= htmlspecialchars($w->best_suited_for) ?></p>
                            
                            <div>
                                <?php foreach($workshop_specific_tags as $tag_name): ?>
                                    <span class="ws-tag-pill">
                                        <?= htmlspecialchars($tag_name) ?> <i class="fas fa-star" style="font-size: 12px; opacity: 0.7;"></i>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="info-card">
                            <h6 class="ws-heading"><i class="far fa-id-badge"></i> Facilitator Profile</h6>
                            
                            <?php if($w->primary_facilitator): ?>
                                <div class="fac-header-row mt-4">
                                    <?php 
                                        if($w->primary_facilitator && $w->primary_facilitator->image_path != 'default.png') { 
                                            $fac_img_detail = base_url('uploads/facilitators/'.$w->primary_facilitator->image_path); 
                                        } else { 
                                            $fac_name_detail = $w->primary_facilitator ? $w->primary_facilitator->name : 'Facilitator'; 
                                            $fac_img_detail = 'https://ui-avatars.com/api/?name='.urlencode($fac_name_detail).'&background=random&size=200'; 
                                        }
                                    ?>
                                    <img src="<?= $fac_img_detail ?>" alt="Facilitator" class="fac-img shadow-sm">
                                    
                                    <div>
                                        <div class="fac-name"><?= htmlspecialchars($w->primary_facilitator->name) ?></div>
                                        <div class="fac-role">
                                            <?= htmlspecialchars($w->primary_facilitator->designation) ?><br>
                                            <?= htmlspecialchars($w->primary_facilitator->organization) ?>
                                        </div>
                                    </div>
                                </div>
                                <p class="ws-text mt-3" style="margin-bottom: 0;">
                                    <?= nl2br(htmlspecialchars($w->primary_facilitator->bio)) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tagPills = document.querySelectorAll('.tag-pill');
    const workshopWrappers = document.querySelectorAll('.workshop-wrapper');
    let activeTags = new Set();

    tagPills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const tag = this.getAttribute('data-tag');
            if (activeTags.has(tag)) {
                activeTags.delete(tag);
                this.classList.remove('active');
            } else {
                activeTags.add(tag);
                this.classList.add('active');
            }
            filterContent();
        });
    });

    function filterContent() {
        workshopWrappers.forEach(wrapper => {
            const tagsAttr = wrapper.getAttribute('data-tags');
            const cardTags = tagsAttr ? tagsAttr.split(',').map(t => t.trim()) : [];
            let isMatch = true;

            if (activeTags.size > 0) {
                activeTags.forEach(t => { 
                    if (!cardTags.includes(t)) isMatch = false; 
                });
            }

            if (isMatch) {
                wrapper.classList.remove('d-none');
                setTimeout(() => wrapper.classList.remove('fade-out'), 10);
            } else {
                wrapper.classList.add('fade-out');
                setTimeout(() => { 
                    if(wrapper.classList.contains('fade-out')) wrapper.classList.add('d-none'); 
                }, 400);
            }
        });
    }
});
</script>
<!-- end file application/views/public/speakers.php -->