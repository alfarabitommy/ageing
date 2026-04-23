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