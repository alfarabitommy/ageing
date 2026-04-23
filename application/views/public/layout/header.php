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
            scroll-behavior: smooth; /* Tambahan untuk efek scroll yang mulus */
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
            transition: filter 0.3s;
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

        /* THEME 1: LIGHT THEME (Home, Schedules, Getting Here) */
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

        /* THEME 2: DARK THEME (Speakers, About) */
        .navbar-dark-theme {
            background-color: #5156B8; /* Menyatu dengan hero section ungu */
        }
        .navbar-dark-theme .nav-link { color: #FFFFFF; }
        .navbar-dark-theme .nav-link:hover, 
        .navbar-dark-theme .nav-link.active { color: #1B2A47; } /* Hover menjadi Navy pekat */
        
        /* Trik CSS: Ubah logo gelap jadi putih otomatis */
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
    <div class="container-fluid px-4 px-lg-5">
        
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/public/images/logos.png') ?>" alt="SLEC, NAFA, UAS Logos">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="<?= (isset($is_dark_header) && $is_dark_header) ? 'filter: invert(1);' : '' ?>"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
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
</nav>

<main class="min-vh-100">