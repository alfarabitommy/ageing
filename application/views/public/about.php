<style>
    /* =========================================
       GLOBAL SECTION SPACING & TYPOGRAPHY
       ========================================= */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'DM Sans', sans-serif;
        background-color: #f4f7f6;
        color: #333;
        line-height: 1.6;
    }

    section { padding: 80px 0; }
    .section-title { 
        color: #fff; 
        font-size: 42px; 
        font-weight: 800; 
        margin-bottom: 30px; 
        letter-spacing: -0.5px; 
        text-align: center;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 0;
    }

    @keyframes slideUpFade {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* =========================================
       1. PROGRAMME HERO
       ========================================= */
    .programme-hero {
        background-color: #5156B8; 
        color: white;
        padding: 80px 0 280px; 
        position: relative;
        overflow: hidden;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        letter-spacing: -1px;
    }

    .slider-thumb {
        position: absolute;
        bottom: 20%;
        right: -10%; 
        z-index: 0;
        margin-bottom: 5%;
   }

    .slider-thumb img {
        max-width: 700px;
        transition: all 0.3s ease;
    }

    .programme-hero .container {
        position: relative;
        z-index: 2;
    }

    /* =========================================
       2. CAROUSEL OVERLAY (VISION CONTAINER)
       ========================================= */
    .vision-container {
        position: relative;
        z-index: 10;
        margin-top: -300px; 
        padding: 0 15px;
    }
    .vision-overlay-box {
        background-color: #ffffff;
        border-radius: 30px;
        position: relative;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1); 
        overflow: hidden;
        animation: slideUpFade 0.6s ease forwards;
    }
    .vision-overlay-box .carousel-inner {
        border-radius: 30px; 
    }
    .vision-overlay-box .carousel-item img {
        height: 600px; 
        object-fit: cover;
        border-radius: 30px;
    }
    .vision-overlay-box .carousel-indicators {
        bottom: 15px;
    }
    .vision-overlay-box .carousel-indicators [data-bs-target] {
        width: 10px; 
        height: 10px; 
        border-radius: 50%; 
        background-color: rgba(255,255,255,0.5); 
        border: none; 
        margin: 0 6px;
        transition: all 0.3s;
    }
    .vision-overlay-box .carousel-indicators .active { 
        background-color: white; 
        transform: scale(1.2);
    }

    .transition-text-section {
        padding: 60px 0 20px;
        text-align: center;
    }
    
    /* INTRO SECTION */
    .intro-section {
        font-size :32px;
        font-family: 'DM Sans', sans-serif;
        background-color: #fff; 
        padding: 100px 0;
        position: relative;
        overflow: hidden;
        line-height: 130%;

    }
    .intro-title { font-size: 52px; color: #111; line-height: 1.1; margin-bottom: 30px; }
    .intro-text { font-size: 32px; color: #333; margin-bottom: 20px; font-weight: 500; }
    .intro-brush { position: absolute; top: -30%; left: -10%; width: 650px; z-index: 1;}
        
    /* =========================================
       Our Vision Mision
    ========================================= */
    .vision-section {
        padding: 100px;
        background-color: #FFCCF3;
        position: relative;
        overflow: hidden;
    }

   .our-vision {
        max-width: 100%;
        height: auto;
        position: relative;
        font-size: 3.5rem;
        letter-spacing: -0.02em;
        line-height: 115%;
        display: inline-block;
        font-weight: 800;
        color: #000;
        text-align: left;
        z-index: 2;
    }

    .intro-vision {
        font-size: 25px;
        color: #000;
        position: relative;
        z-index: 2;
    }

     .matters-mask {
        position: absolute; 
        right: 0%;
        top: -5%;
        max-width: 550px;
        z-index: 1;
     }
    
    /* =========================================
       3. CONFERENCE OBJECTIVES
       ========================================= */
    .conference-objectives {
        max-width: 100%;
        height: auto;
        position: relative;
        font-size: 3.2rem;
        letter-spacing: -0.02em;
        line-height: 115%;
        display: inline-block;
        font-weight: 800;
        color: #fff;
        text-align: left;
        margin-bottom: 20px;
    }

    .intro-conference {
        font-size: 28px;
        color: #fff;
    }

    .objectives-section { 
        background-color: #998CFF; 
        padding: 80px 0; 
    }
    .objectives-subtitle {
        color: white;
        font-size: 26px;
        font-weight: 500;
        line-height: 1.5;
        text-align: center;
        max-width: 900px;
        margin: 0 auto 50px auto;
        left: 20%;
    }

    .obj-card {
        border-radius: 25px; 
        padding: 10px 25px;
        margin-bottom: 10%; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        animation: slideUpFade 0.6s ease forwards;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .obj-card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); 
    }
    .obj-card-1 { background: #f6e498; animation-delay: 0.1s; }
    .obj-card-2 { background: #ffc1f1; animation-delay: 0.2s; }
    .obj-card-3 { background: #94c0fa; animation-delay: 0.3s; }
    .obj-card-4 { background: #ffc184; animation-delay: 0.4s; }

    .obj-card h4 { font-size: 20px; font-weight: 800; margin-bottom: 10px; line-height: 1.3; }
    .obj-card p { font-size: 15px; margin: 0; opacity: 0.85; font-weight: 500; }

    /* =========================================
       Icon Rectangle
       ========================================= */
    .rectangle-brain, .rectangle-deepen, .rectangle-inspire, .rectangle-elevate {
        width: 100%; 
        height: auto; 
        display: flex;
        justify-content: center; 
        align-items: center; 
        margin: 30px auto; 
    }

    .icon-brain, .icon-deepen, .icon-inspire, .icon-elevate {
        width: 120px; 
        height: 120px;
        object-fit: contain;
    }

    /* =========================================
       4. NEWS / ABOUT ORGANISATIONS SECTION
       ========================================= */
    .news-section {
        padding: 80px 0;
        background-color: #f4f7f6; 
    }
    .news-grid {
        display: flex;
        gap: 30px; 
        flex-wrap: wrap; 
    }
    
    .news-item {
        background: #ffffff;
        flex: 1; 
        min-width: 300px; 
        border-radius: 20px;
        border: 1px solid #E2E4E8; 
        padding: 18px; 
        box-shadow: 0 4px 15px rgba(0,0,0,0.02); 
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        animation: slideUpFade 0.6s ease forwards;
    }
    .news-item:nth-child(1) { animation-delay: 0.2s; }
    .news-item:nth-child(2) { animation-delay: 0.4s; }

    .news-item:hover {
        transform: translateY(-5px); 
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    }
    
    .news-item img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        border-radius: 12px; 
    }
    
    .news-content {
        padding: 25px 10px 10px 10px; 
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .news-content h3 {
        margin: 0 0 15px 0;
        color: #5156B8; 
        font-weight: 800;
        font-size: 26px;
        line-height: 1.3;
    }
    .news-content p {
        font-size: 16px;
        color: #111;
        margin-bottom: 25px;
        line-height: 1.6;
        font-weight: 400;
        flex-grow: 1; 
    }
    
    .read-more-outline {
        align-self: flex-start;
        text-decoration: none;
        color: #5156B8;
        background-color: transparent;
        font-weight: 700;
        font-size: 15px;
        padding: 8px 24px;
        border: 2px solid #5156B8;
        border-radius: 30px; 
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .read-more-outline:hover {
        background-color: #5156B8;
        color: #ffffff;
    }

    /* =========================================
       5. MODAL POP-UP (ORGANISATION DETAILS)
       ========================================= */
    .about-modal .modal-content {
        border-radius: 30px;
        border: none;
        padding: 50px;
        background-color: #FFFFFF;
    }
    .about-modal .btn-go-back {
        color: #5156B8;
        font-weight: 600;
        font-size: 15px;
        background: none;
        border: none;
        padding: 0;
        margin-bottom: 20px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: opacity 0.3s;
    }
    .about-modal .btn-go-back:hover { opacity: 0.7; }
    
    .about-modal .modal-header-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }
    .about-modal .modal-title-custom {
        font-size: 42px;
        font-weight: 800;
        color: #4B4CB0; 
        line-height: 1.2;
        letter-spacing: -1px;
        margin: 0;
        max-width: 600px;
    }
    .about-modal .modal-logos {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .about-modal .modal-logos img {
        max-height: 100px;
        object-fit: contain;
    }

    .about-modal .hero-img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 25px;
        margin-bottom: 40px;
    }

    .about-modal .info-box {
        background-color: #F4F4F6; 
        border-radius: 25px;
        padding: 40px;
        height: 100%;
    }
    .about-modal .info-box p {
        font-size: 16px;
        color: #111;
        margin-bottom: 20px;
        line-height: 1.6;
    }
    .about-modal .info-box p:last-child { margin-bottom: 0; }
    
    /* Contact group classes (info-heading, contact-group, dll) tetap saya pertahankan 
       di CSS karena bisa jadi dibutuhkan jika ada pengembangan ke depannya,
       namun secara visual tag HTML-nya telah saya hapus di bawah. */
    .about-modal .info-heading {
        font-size: 18px;
        font-weight: 800;
        color: #111;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .about-modal .info-heading i { color: #5156B8; font-size: 20px; }
    .about-modal .contact-group { margin-bottom: 30px; }
    .about-modal .contact-group:last-child { margin-bottom: 0; }
    .about-modal .contact-title { font-weight: 700; color: #111; margin-bottom: 5px; }
    .about-modal .contact-link { color: #5156B8; text-decoration: none; display: block; margin-bottom: 8px; font-weight: 600; }
    .about-modal .contact-link:hover { text-decoration: underline; }

    /* =========================================
       RESPONSIVE MOBILE ADJUSTMENTS
       ========================================= */
    @media (max-width: 991px) {
        section { padding: 50px 0; }
        
        .programme-hero { padding: 40px 0 160px; }
        .hero-title { font-size: 2.2rem; }
        .programme-hero p.lead { font-size: 16px; margin-bottom: 30px !important; }
        
        .vision-container { margin-top: -125px; } 
        .vision-overlay-box .carousel-item img { height: 250px; }
        .transition-text-section { padding: 40px 0 10px; }
        
        .intro-section { padding: 60px 0; font-size: 20px; }
        .intro-vision { font-size: 18px; }
        
        .vision-section { padding: 60px 20px; }
        .our-vision { width: 100%; height: auto; font-size: 2.5rem; margin-bottom: 15px; }
        
        .objectives-section { padding: 60px 0; }
        .conference-objectives { width: 100%; height: auto; font-size: 2.2rem; bottom: auto; }
        .intro-conference { font-size: 18px; }

        .section-title { font-size: 32px; }
        .objectives-subtitle { font-size: 18px; padding: 0 15px; margin-bottom: 30px; }
        
        .obj-card { padding: 30px 20px; margin-bottom: 15px; }
        .obj-card h4 { font-size: 18px; }
        .icon-brain, .icon-deepen, .icon-inspire, .icon-elevate { width: 80px; height: 80px; }
        
        .news-grid { flex-direction: column; gap: 20px; }
        .news-item { padding: 15px; }
        .news-item img { height: 220px; }
        .news-content { padding: 20px 5px 5px 5px; }
        .news-content h3 { font-size: 22px; }

        .about-modal .modal-content { padding: 30px 20px; }
        .about-modal .modal-header-row { flex-direction: column; gap: 20px; margin-bottom: 20px; }
        .about-modal .modal-title-custom { font-size: 32px; }
        .about-modal .modal-logos img { max-height: 40px; }
        .about-modal .hero-img { height: 250px; border-radius: 15px; margin-bottom: 25px; }
        .about-modal .info-box { padding: 25px; }

        /* ORNAMENTS MOBILE ADJUSTMENTS */
        .slider-thumb img { max-width: 250px; opacity: 0.4; pointer-events: none; z-index: 0; }
        .intro-brush { max-width: 280px; top: -25%; left: -5%; opacity: 0.4; z-index: 0; pointer-events: none; }
        .matters-mask { max-width: 220px; top: -7%; right: -5%; opacity: 0.4; z-index: 0; pointer-events: none; }
        .slider-thumb { position: absolute; bottom: 10%; right: -10%;  z-index: 0; margin-bottom: 5%;}
    }
</style>

<section class="programme-hero">
    
    <div class="slider-thumb">
        <img src="<?= base_url('assets/public/images/icon-pen-about.png') ?>" alt="" class="shape-1">
    </div>

    <div class="container">
        <p class="small mb-3" style="font-weight: 400;">> SLEC x NAFA Ageing Artfully Conference 2026</p>
        
        <h1 class="hero-title">Reimagining Ageing<br>
        through the Power of<br>
        the Arts Together
        </h1>
        
        <p class="lead mb-5" style="max-width: 850px; font-weight: 400;">
             <span style="font-weight: 800;">St Luke’s ElderCare (SLEC) and Nanyang Academy of Fine Arts
             (NAFA), University of the Arts Singapore (UAS)</span> have been
             collaborating to bring together arts education and community care
             to promote innovative approaches in engaging seniors and
             supporting their well-being.
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
                    <img src="<?= base_url('assets/public/images/carousel-1.jpg') ?>" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/public/images/carousel-2.jpg') ?>" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/public/images/carousel-3.jpg') ?>" class="d-block w-100" alt="Slide 3">
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


<section id="intro" class="intro-section">
    <img src="<?= base_url('assets/public/images/icon-brush.png') ?>" alt="" class="intro-brush">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-9 position-relative" style="z-index: 2; max-width: 850px;">
                <p class="intro-vision" style="font-weight: 400;">The two organisations formalised 
                    their partnership with the signing of a Memorandum of 
                    Understanding in August 2025, and the <span style="font-weight: 800;">Ageing Artfully 
                    Conference is one of the partnership highlights.</span>
                </p>
            </div>
        </div>

    </div>
</section>

<section class="vision-section">
    <img src="<?= base_url('assets/public/images/icon-mask-about.png') ?>" alt="" class="matters-mask">
<div class="container">
        <div class="row mb-5">
            <div class="col-lg-9" style="max-width: 850px;">
                <div class="our-vision">Our Vision</div>
                <p class="intro-vision" style="font-weight: 400;">
                    At its heart, Ageing Artfully reimagines ageing as a stage rich with potential—for <span style="font-weight: 800;">creation that affirms identity, connection that nurtures belonging, and contribution that sustains purpose.</span><br><br>
                </p>
                <p class="intro-vision" style="font-weight: 400;">
                    We move toward a vision of ageing that honours not only well-being, but the enduring human desire to <span style="font-weight: 800;">create, relate, and celebrate.</span>
                </p>
            </div>
        </div>
</section>


<section class="objectives-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="conference-objectives">Conference Objectives</div>
                <p class="intro-conference" style="font-weight: 400;">
                    Through interdisciplinary dialogue among artists, academics, 
                    eldercare professionals, community partners, and older adults themselves, 
                    the conference aims to:
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-1">
                    <div class="rectangle-brain">
                        <img src="<?= base_url('assets/public/images/brain-research.png') ?>" alt="" class="icon-brain">
                    </div>
                    <h4 style="color: #000;">
                        Shift the narrative
                    </h4>
                    <p style="color: #000;">
                        from arts as therapy to arts<br>as living practice
                    </p>
                </div>
            </div>


            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-2">
                    <div class="rectangle-deepen">
                           <img src="<?= base_url('assets/public/images/heart.png') ?>" alt="" class="icon-deepen">
                    </div>
                    <h4 style="color: #000;">
                        Deepen dignity
                    </h4>
                    <p style="color: #000;">
                        and agency-centered<br>approaches in ageing
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-3">
                    <div class="rectangle-inspire">
                           <img src="<?= base_url('assets/public/images/idea-01.png') ?>" alt="" class="icon-inspire">
                    </div>
                    <h4 style="color: #000;">
                        Inspire sustainable
                    </h4>
                    <p style="color: #000;">
                        community-integrated<br>creative ecosystem
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-4">
                    <div class="rectangle-elevate">
                        <img src="<?= base_url('assets/public/images/arrow.png') ?>" alt="" class="icon-elevate">
                    </div>  
                    <h4 style="color: #000;">
                        Elevate older adults
                    </h4>
                    <p style="color: #000;">
                        as active contributors<br>to cultural life
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="news-section">
    <div class="container">
        <div class="news-grid">
            <div class="news-item">
                <img src="<?= base_url('assets/public/images/slec.png') ?>" alt="About SLEC">
                <div class="news-content">
                    <h3>About St Luke’s ElderCare<br>(SLEC)</h3>
                    <p>For over 26 years, SLEC has been using art to bring
                       meaning, joy and connection to seniors across 31 locations.
                    </p>
                    <button type="button" class="read-more-outline" data-bs-toggle="modal" data-bs-target="#modalSLEC">Read More</button>
                </div>
            </div>

            <div class="news-item">
                <img src="<?= base_url('assets/public/images/about-nafa.png') ?>" alt="About NAFA">
                <div class="news-content">
                    <h3>About Nanyang Academy<br>of Fine Arts (NAFA)</h3>
                    <p>NAFA is Singapore’s pioneer arts institution and a founding member of the University of the Arts Singapore (UAS).</p>
                    <button type="button" class="read-more-outline" data-bs-toggle="modal" data-bs-target="#modalNAFA">Read More</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODAL SLEC -->
<div class="modal fade about-modal" id="modalSLEC" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content shadow-lg">
            
            <button type="button" class="btn-go-back" data-bs-dismiss="modal">
                <i class="fas fa-chevron-left"></i> Go Back
            </button>
            
            <div class="modal-header-row">
                <h2 class="modal-title-custom">About St Luke's<br>ElderCare (SLEC)</h2>
                <div class="modal-logos">
                    <img src="<?= base_url('assets/public/images/slec-logo.png') ?>" alt="SLEC Logo">
                </div>
            </div>

            <img src="<?= base_url('assets/public/images/slec.png') ?>" alt="SLEC Hero" class="hero-img">

            <div class="row g-4">
                <!-- PERBAIKAN: Diperlebar menjadi col-lg-12 karena kotak kontak dihilangkan -->
                <div class="col-lg-12">
                    <div class="info-box">
                        <p>SLEC is a Christian healthcare provider dedicated to enriching the lives of seniors in Singapore, regardless of race, language and religion. Guided by our GRACE philosophy of care, we are committed to providing compassionate and holistic care that fosters autonomy and choice.</p>
                        <p>To empower seniors of varying needs, from the fit to the frail, we offer a comprehensive suite of services island wide. These include community-based programmes that promote active ageing; centre-based offerings such as day care, rehabilitation and nursing; residential (nursing home) services for long-term care; and home-based services covering medical, nursing and therapy needs.</p>
                        <p>Leveraging our legacy of over 25 years, we are on an unstoppable mission to transform the care challenges of Singapore's ageing population.</p>
                        <p>Through innovation, collaboration and education, we seek to elevate the community care sector, where seniors thrive in their golden years and age with dignity, independence and joy.</p>
                    </div>
                </div>
                <!-- BLOK CONTACT INFO DIHAPUS -->
            </div>

        </div>
    </div>
</div>

<!-- MODAL NAFA -->
<div class="modal fade about-modal" id="modalNAFA" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content shadow-lg">
            
            <button type="button" class="btn-go-back" data-bs-dismiss="modal">
                <i class="fas fa-chevron-left"></i> Go Back
            </button>
            
            <div class="modal-header-row">
                <h2 class="modal-title-custom">About Nanyang Academy<br>of Fine Arts (NAFA)</h2>
                <div class="modal-logos">
                    <img src="<?= base_url('assets/public/images/nafa-logo.png') ?>" alt="NAFA UAS Logo">
                </div>
            </div>

            <img src="<?= base_url('assets/public/images/nafa.png') ?>" alt="NAFA Hero" class="hero-img">

            <div class="row g-4">
                <!-- PERBAIKAN: Diperlebar menjadi col-lg-12 karena kotak kontak dihilangkan -->
                <div class="col-lg-12">
                    <div class="info-box">
                        <p>Established in 1938, NAFA is Singapore's pioneer arts institution and a founding member of the University of the Arts Singapore (UAS). Renowned for its strength in Southeast Asian arts, NAFA is also recognised for its rigorous, practice-led curriculum, interdisciplinary approach, and strong engagement with the creative community. This commitment is reflected in initiatives such as the Institute of Southeast Asian Arts (ISEAA), which advances artistic practice and research in the region.</p>
                        <p>With 16 Cultural Medallion and 15 Young Artist Award alumni, NAFA has nurtured some of the nation's most celebrated artists and creative practitioners. Supporting learners at various stages of learning, from early arts education to diploma, degree, postgraduate, and continuing education programmes, NAFA offers educational pathways across art, design, performing arts, and interdisciplinary practices, guided by its mission of "inspiring learning and growth through the arts".</p>
                    </div>
                </div>
                <!-- BLOK CONTACT INFO DIHAPUS -->
            </div>

        </div>
    </div>
</div>