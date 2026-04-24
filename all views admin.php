<!-- file admin/dashboard.php -->
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
<!-- end file admin/dashboard.php -->

<!-- file admin/login.php -->
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
<!-- end file admin/login.php -->

<!-- file admin/facilitators/form.php -->
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
<!-- end file admin/facilitators/form.php -->

<!-- file admin/facilitators/index.php -->
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
<!-- end file admin/facilitators/index.php -->

<!-- file admin/layout/footer.php -->
</div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- end file admin/layout/footer.php -->

<!-- file admin/layout/header.php -->
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
<!-- end file admin/layout/header.php -->

<!-- file admin/schedules/form.php -->
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
<!-- end file admin/schedules/form.php -->

<!-- file admin/schedules/index.php -->
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
<!-- end file admin/schedules/index.php -->

<!-- file admin/speakers/form.php -->
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
<!-- end file admin/speakers/form.php -->

<!-- file admin/speakers/index.php -->
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
<!-- end file admin/speakers/index.php -->

<!-- file admin/tags/form.php -->
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
<!-- end file admin/tags/form.php -->

<!-- file admin/tags/index.php -->
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
<!-- end file admin/tags/index.php -->

<!-- file admin/workshops/form.php -->
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
<!-- end file admin/workshops/form.php -->

<!-- file admin/workshops/index.php -->
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
<!-- end file admin/workshops/index.php -->