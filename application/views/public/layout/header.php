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

        /* Navbar Base Styles & Shrink Transition */
        .navbar {
            padding: 15px 0; /* Padding awal sedikit diperbesar agar efek shrink terlihat */
            transition: all 0.4s ease-in-out; /* Animasi halus untuk shrink */
            z-index: 1030; /* Memastikan navbar selalu di atas elemen lain */
        }
        
        /* State saat di-scroll ke bawah (Shrink Effect) */
        .navbar.navbar-scrolled {
            padding: 5px 0; /* Padding mengecil */
            box-shadow: 0 4px 15px rgba(0,0,0,0.08); /* Menambah bayangan agar terpisah dari konten */
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .navbar-brand a {
            display: flex;
            align-items: center;
            transition: opacity 0.3s ease;
        }
        .navbar-brand a:hover {
            opacity: 0.8;
        }
        
        /* Animasi Logo saat Shrink */
        .navbar-brand img {
            height: 55px; /* Tinggi normal */
            width: auto;
            object-fit: contain;
            transition: all 0.4s ease-in-out; /* Animasi ikut menyusut */
        }
        .navbar.navbar-scrolled .navbar-brand img {
            height: 37px; /* Logo mengecil saat di-scroll */
        }

        .nav-link {
            font-size: 13px;
            font-weight: 500;
            padding: 8px 12px !important;
            transition: color 0.3s;
        }
        .btn-register {
            font-size: 13px;
            font-weight: 700;
            border-radius: 25px;
            padding: 6px 20px;
            transition: all 0.3s;
        }

        /* Responsive Logo & Hamburger Fix */
        @media (max-width: 991px) {
            .navbar {
                padding: 10px 0; /* Standar awal mobile */
            }
            .navbar-brand {
                width: 75%;
                gap: 10px;
                margin-right: 0;
            }
            .navbar-brand img {
                height: 35px; /* Standar mobile awal */
                max-width: 100%;
                width: auto;
                object-fit: contain;
            }
            /* Shrink di Mobile */
            .navbar.navbar-scrolled .navbar-brand img {
                height: 28px; /* Lebih kecil lagi saat scroll di mobile */
            }
            .navbar-brand a {
                max-width: calc(50% - 5px);
            }
            .navbar-toggler {
                width: 20%;
                display: flex;
                justify-content: flex-end; 
                align-items: center;
                padding: 0;
            }
            
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
                font-size: 15px;
                padding: 12px 20px !important;
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
            /* Box shadow dipindah ke class .navbar-scrolled agar lebih dinamis */
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
        .navbar-dark-theme.navbar-scrolled {
            background-color: #4348A0; /* Saat dark theme discroll, warna sedikit lebih pekat */
        }
        .navbar-dark-theme .nav-link { color: #FFFFFF; }
        .navbar-dark-theme .nav-link:hover, 
        .navbar-dark-theme .nav-link.active { color: #94C0FA; }
        
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

<nav id="mainNavbar" class="navbar navbar-expand-lg sticky-top <?= $theme_class ?>">
    <div class="container-fluid px-3 px-lg-5 d-flex justify-content-between align-items-center">
        
        <div class="navbar-brand">
            <?php if (isset($is_dark_header) && $is_dark_header): ?>
                <a href="https://slec.org.sg/" target="_blank">
                    <img src="<?= base_url('assets/public/images/SLEC-Logo_high-res--white-.png') ?>" alt="SLEC Logo">
                </a>
                <a href="https://www.nafa.edu.sg/" target="_blank">
                    <img src="<?= base_url('assets/public/images/nafa_uas_white.png') ?>" alt="NAFA UAS Logo">
                </a>
            <?php else: ?>
                <a href="https://slec.org.sg/" target="_blank">
                    <img src="<?= base_url('assets/public/images/slec-logo.png') ?>" alt="SLEC Logo">
                </a>
                <a href="https://www.nafa.edu.sg/" target="_blank">
                    <img src="<?= base_url('assets/public/images/nafa_uas_color.png') ?>" alt="NAFA UAS Logo">
                </a>
            <?php endif; ?>
        </div>
        
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="<?= (isset($is_dark_header) && $is_dark_header) ? '#FFFFFF' : '#1B2A47' ?>" viewBox="0 0 16 16">
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
                        <a class="btn btn-register" href="https://www.eventbrite.sg/e/ageing-artfully-conference-healing-expressions-through-the-arts-tickets-1687058570599?aff=oddtdtcreator" target="_blank">Register Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.getElementById("mainNavbar");
        
        // Fungsi untuk mengecek posisi scroll
        function checkScroll() {
            if (window.scrollY > 50) {
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
            }
        }
        
        // Panggil saat pertama load (berjaga jika di-refresh di tengah halaman)
        checkScroll();
        
        // Pasang event listener saat di-scroll
        window.addEventListener("scroll", checkScroll);
    });
</script>

<main class="min-vh-100">