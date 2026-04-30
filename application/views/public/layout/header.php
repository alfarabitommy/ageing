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

    <link rel="icon" type="image/png" href="<?= base_url('assets/public/images/favicon.png') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/public/images/favicon.png') ?>">

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
            padding: 15px 0; 
            transition: box-shadow 0.4s ease-in-out; 
            z-index: 1030; 
        }
        
        /* State saat di-scroll ke bawah */
        .navbar.navbar-shadow {
            box-shadow: 0 4px 15px rgba(0,0,0,0.15); 
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
        
        /* Logo Size Fix */
        .navbar-brand img {
            /* PERBAIKAN: Dikurangi dari 55px ke 45px untuk menghemat ruang horizontal di desktop */
            height: 45px; 
            width: auto;
            object-fit: contain;
        }

        .nav-link {
            /* PERBAIKAN: Font dikecilkan sedikit dan padding dirampingkan untuk desktop */
            font-size: 11.5px;
            font-weight: 500;
            padding: 8px 8px !important;
            transition: color 0.3s;
            white-space: nowrap; 
        }
        .btn-register {
            /* PERBAIKAN: Font dikecilkan sedikit dan padding dirampingkan untuk desktop */
            font-size: 11.5px;
            font-weight: 700;
            border-radius: 25px;
            padding: 6px 15px;
            transition: all 0.3s;
            white-space: nowrap;
        }

        /* Responsive Logo & Hamburger Fix */
        @media (max-width: 991px) {
            .navbar {
                padding: 10px 0; 
            }
            .navbar-brand {
                width: 75%;
                gap: 10px;
                margin-right: 0;
            }
            .navbar-brand img {
                height: 35px; 
                max-width: 100%;
                width: auto;
                object-fit: contain;
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
                /* PENGAMANAN: Font size menu mobile tetap besar */
                font-size: 15px;
                padding: 12px 20px !important;
                border-bottom: 1px solid rgba(255,255,255,0.05);
                white-space: normal; /* Kembalikan sifat text normal khusus di menu mobile */
            }
            .offcanvas .nav-link:hover, 
            .offcanvas .nav-link.active {
                background-color: rgba(255,255,255,0.1);
                color: #FCE170 !important; 
            }
            .offcanvas .btn-register {
                /* PENGAMANAN: Font size tombol register mobile dikembalikan jadi besar */
                font-size: 14px;
                width: 100%;
                margin-top: 20px;
                background-color: #FCE170;
                color: #5156B8;
                border: none;
            }
        }

        /* THEME: DARK THEME GLOBAL */
        .navbar-dark-theme {
            background-color: #5156B8;
        }
        .navbar-dark-theme.navbar-shadow {
            background-color: #4348A0; 
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

<nav id="mainNavbar" class="navbar navbar-expand-lg sticky-top navbar-dark-theme">
    <div class="container-fluid px-3 px-lg-5 d-flex justify-content-between align-items-center">
        
        <div class="navbar-brand">
            <a href="https://slec.org.sg/" target="_blank">
                <img src="<?= base_url('assets/public/images/SLEC-Logo_high-res--white-.png') ?>" alt="SLEC Logo">
            </a>
            <a href="https://www.nafa.edu.sg/" target="_blank">
                <img src="<?= base_url('assets/public/images/nafa_uas_white.png') ?>" alt="NAFA UAS Logo">
            </a>
        </div>
        
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FFFFFF" viewBox="0 0 16 16">
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
                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == '') ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == 'about') ? 'active' : '' ?>" href="<?= base_url('about') ?>">About Us</a></li>
                    
                    <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(1) == 'speakers') ? 'active' : '' ?>" href="<?= base_url('speakers#plenary-speakers') ?>" id="navItemSpeakers">Speakers</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('speakers#breakout-workshops') ?>" id="navItemWorkshops">Breakout Workshops</a></li>
                    
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
        
        function checkScroll() {
            if (window.scrollY > 50) {
                navbar.classList.add("navbar-shadow");
            } else {
                navbar.classList.remove("navbar-shadow");
            }
        }
        
        checkScroll();
        window.addEventListener("scroll", checkScroll);

        const navItemSpeakers = document.getElementById("navItemSpeakers");
        const navItemWorkshops = document.getElementById("navItemWorkshops");
        
        if (navItemSpeakers) {
            navItemSpeakers.addEventListener("click", function(e) {
                if (window.location.pathname.includes("speakers")) {
                    e.preventDefault(); 
                    
                    const targetSection = document.getElementById('plenary-speakers');
                    if(targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    } else {
                        window.scrollTo({ top: 0, behavior: 'smooth' }); 
                    }
                    
                    const offcanvasElement = document.getElementById('offcanvasNavbar');
                    if (offcanvasElement) {
                        if (typeof bootstrap !== 'undefined') {
                            const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                            if (bsOffcanvas) bsOffcanvas.hide();
                        }
                    }
                    
                    if (navItemWorkshops) navItemWorkshops.classList.remove("active");
                    navItemSpeakers.classList.add("active");
                    
                    history.pushState(null, null, window.location.pathname + '#plenary-speakers');
                }
            });
        }

        const workshopSection = document.getElementById("breakout-workshops");

        if (workshopSection && navItemSpeakers && navItemWorkshops) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        navItemSpeakers.classList.remove("active");
                        navItemWorkshops.classList.add("active");
                    } else {
                        navItemWorkshops.classList.remove("active");
                        if (window.location.pathname.includes("speakers")) {
                            navItemSpeakers.classList.add("active");
                        }
                    }
                });
            }, { 
                rootMargin: "-80px 0px -20% 0px", 
                threshold: 0.01 
            }); 
            
            observer.observe(workshopSection);
        }
        
        if (navItemWorkshops) {
            navItemWorkshops.addEventListener("click", function() {
                const offcanvasElement = document.getElementById('offcanvasNavbar');
                if (offcanvasElement && typeof bootstrap !== 'undefined') {
                    const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                    if (bsOffcanvas) bsOffcanvas.hide();
                }
            });
        }
    });
</script>

<main class="min-vh-100">