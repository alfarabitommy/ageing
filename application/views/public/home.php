<style>
    /* =========================================
       GLOBAL & TYPOGRAPHY OVERRIDES
       ========================================= */
    html, body {
        max-width: 100%;
        /* overflow-x: hidden; DIHAPUS AGAR STICKY HEADER BERFUNGSI */
    }
    body {
        font-family: 'DM Sans', sans-serif;
        /* overflow-x: hidden; DIHAPUS AGAR STICKY HEADER BERFUNGSI */
    }
    h1, h2, h3, h4, h5, h6 { font-weight: 800; letter-spacing: -0.5px; }
    p { font-weight: 400; line-height: 1.7; }

    /* =========================================
       HERO SECTION
       ========================================= */
    .home-hero {
        background-color: #5156B8;
        color: white;
        padding: 80px 0 120px;
        position: relative;
        text-align: center;
        overflow: hidden; /* DITAMBAHKAN DI SINI UNTUK MENCEGAH HORIZONTAL SCROLL */
    }
    .hero-pretitle { position: relative; center: 0%; font-weight: 700; text-transform: uppercase; font-size: 14px; margin-bottom: 20px; letter-spacing: 1px; }
    .hero-title-img { position: relative; center: 0%; max-width: 600px; width: 100%; margin-bottom: 20px; }
    .hero-subtitle { position: relative; center: 0%; font-size: 24px; font-weight: 600; margin-bottom: 30px; }
    .hero-date { position: relative; center: 0%; font-size: 18px; font-weight: 500; margin-bottom: 40px; }
    .btn-outline-white {
        position: relative; border: 2px solid white; color: white; border-radius: 30px; padding: 10px 30px; font-weight: 700; transition: 0.3s; text-decoration: none; display: inline-block; z-index: 2;
    }
    .btn-outline-white:hover { background-color: white; color: #5156B8; transform: translateX(5px); }
    
    /* Hero Ornaments */
    .hero-ballet { position: absolute; right: -14%; bottom: 5%; max-width: 750px; z-index: 1; pointer-events: none; }
    
    /* PERBAIKAN SAXOPHONE DESKTOP DI SINI */
    .hero-saxophone { 
        position: absolute; 
        left: -7%; 
        bottom: -5%; /* Diturunkan posisinya menjauhi teks (sebelumnya 2%) */
        max-width: 540px; /* Dikecilkan 10% agar lebih rapi (sebelumnya 600px) */
        z-index: 1; 
        pointer-events: none; 
    }
    
    /* =========================================
       INTRO SECTION
       ========================================= */
    .intro-section {
        background-color: #FFDEB3; 
        padding: 100px 0;
        position: relative;
        overflow: hidden; /* DITAMBAHKAN DI SINI */
    }
    .intro-title { font-size: 52px; color: #111; line-height: 1.1; margin-bottom: 30px; }
    .intro-text { font-size: 18px; color: #333; margin-bottom: 20px; font-weight: 500; }
    .intro-brush { position: absolute; top: -12%; left: -5%; max-width: 550px; z-index: 1; pointer-events: none; }
    .intro-mask { position: absolute; bottom: 87%; left: -5%; max-width: 550px; z-index: 1; pointer-events: none; }

    /* =========================================
       MATTERS & CAROUSEL SECTION
       ========================================= */
    .matters-section { 
        padding: 100px 0; 
        background-color: #FAFAFA; 
        position: relative; 
        overflow: hidden; /* DITAMBAHKAN DI SINI */
    }
    .matters-title { font-size: 48px; color: #5156B8; margin-bottom: 20px; position: relative; z-index: 2; }
    .matters-mic { position: absolute; right: 0%; top: -250px; max-width: 650px; z-index: 1; pointer-events: none; }
    
    /* Carousel Styling */
    .carousel-inner { border-radius: 30px; box-shadow: 0 15px 30px rgba(0,0,0,0.1); position: relative; z-index: 2; }
    .carousel-item img {
        height: 600px;
        object-fit: cover; 
        border-radius: 30px;
    }
    .carousel-indicators { bottom: 10px; }
    .carousel-indicators [data-bs-target] { width: 10px; height: 10px; border-radius: 50%; background-color: rgba(255,255,255,0.6); border: none; margin: 0 5px; }
    .carousel-indicators .active { background-color: white; }

    /* =========================================
       REIMAGINING SECTION (PILLARS)
       ========================================= */
    .reimagining-section { 
        background-color: #5156B8; 
        padding: 100px 0; 
        position: relative; 
        color: white; 
        overflow: hidden; /* DITAMBAHKAN DI SINI */
    }
    .reimagining-title { font-size: 48px; line-height: 1.2; margin-bottom: 60px; position: relative; z-index: 2; }
    .reimagining-layer { position: absolute; left: 0%; top: -20%; max-width: 750px; z-index: 1; pointer-events: none; }

    .pillar-card { border-radius: 20px; padding: 40px; height: 100%; color: #111; display: flex; flex-direction: column; align-items: flex-start; position: relative; z-index: 2; }
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
    .modal-kustom .header-card-yellow { background-color: #F6E498; }
    .modal-kustom .header-card-blue { background-color: #94C0FA; }
    .modal-kustom .header-card-pink { background-color: #FFCCF3; }

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

    .modal-kustom .header-bg-img {
        position: absolute;
        right: 0%;
        top: 50%;
        transform: translateY(-50%);
        width: 400px;
        height: auto;
        pointer-events: none;
        z-index: 0;
    }

    .modal-kustom .header-card .btn-go-back,
    .modal-kustom .header-card .header-title,
    .modal-kustom .header-card .header-subtitle {
        position: relative;
        z-index: 1;
    }

    /* =========================================
       WORKSHOPS SECTION
       ========================================= */
    .home-workshops { 
        padding: 80px 0; 
        position: relative; 
        overflow: hidden; /* DITAMBAHKAN DI SINI */
    }
    .hero-shape { position: absolute; right: 0%; top: 0%; max-width: 600px; z-index: 0; pointer-events: none; }

    .hw-title { font-size: 52px; color: #5156B8; line-height: 1.1; margin-bottom: 30px; position: relative; z-index: 2; }
    .stat-box { border-radius: 15px; padding: 25px; height: 100%; display: flex; flex-direction: column; justify-content: center; position: relative; z-index: 2; }
    .stat-box .display-4 { font-weight: 800; color: #111; }
    .stat-box h5 { color: #111; font-weight: 600; margin: 0; }
    
    .tags-grid-container { display: flex; flex-direction: column; gap: 10px; position: relative; z-index: 2; }
    .tags-row { display: flex; flex-wrap: wrap; gap: 10px; }

    .tag-pill { 
        border: 1px solid #5156B8; 
        color: #5156B8; 
        border-radius: 20px; 
        padding: 5px 15px; 
        font-size: 13px; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center;
        margin: 0; 
        text-decoration: none; 
        transition: 0.2s; 
        background-color: transparent; 
    }
    .tag-pill:hover, .tag-pill.active { background-color: #5156B8; color: white; }
    
    .tag-pill .icon-default { display: inline-block; width: 16px; height: auto; margin-left: 6px; }
    .tag-pill .icon-active { display: none; width: 16px; height: auto; margin-left: 6px; }
    .tag-pill:hover .icon-default, .tag-pill.active .icon-default { display: none; }
    .tag-pill:hover .icon-active, .tag-pill.active .icon-active { display: inline-block; }

    /* PERBAIKAN ANIMASI GLIDE ELEGAN */
    .workshop-wrapper { 
        transition: max-width 0.5s cubic-bezier(0.25, 1, 0.5, 1), 
                    padding 0.5s cubic-bezier(0.25, 1, 0.5, 1), 
                    opacity 0.4s ease, 
                    transform 0.4s ease; 
        opacity: 1; 
        transform: scale(1); 
        max-width: 100%;
        overflow: hidden; 
    }

    .workshop-wrapper.fade-out { 
        opacity: 0; 
        transform: scale(0.8); 
        max-width: 0 !important; 
        padding-left: 0 !important; 
        padding-right: 0 !important; 
        border: none !important; 
    }

    .workshop-card { 
        width: 100%; 
        min-width: 280px; 
        margin: 0 auto; 
        border: 1px solid #E0E0E0;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        height: 100%;
        background-color: white;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 2;
    }
    
    .workshop-img { width: 100px; height: 100px; object-fit: cover; border-radius: 15px; margin: 0 auto 20px; }
    .workshop-title { color: #5156B8; font-weight: 700; font-size: 18px; margin-bottom: 10px; }
    .workshop-subtitle { font-size: 13px; color: #555; margin-bottom: 20px; flex-grow: 1; }
    .workshop-fac-name { color: #5156B8; font-weight: 600; font-size: 14px; margin-bottom: 2px; }
    .workshop-fac-org { font-size: 13px; color: #777; margin-bottom: 20px; }
    .btn-read-more { background-color: #4F47B2; color: white; border-radius: 20px; padding: 6px 25px; font-size: 13px; font-weight: 600; border: none; align-self: center; text-decoration: none; transition: 0.3s; }
    .btn-read-more:hover { background-color: #5156B8; color: white; }

    /* =========================================
       MODAL WORKSHOP DETAIL
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

    /* =========================================
       RESPONSIVE MOBILE (Penyempurnaan Utama)
       ========================================= */
    @media (max-width: 991px) {
        .intro-title { font-size: 40px; }
        .matters-title { font-size: 38px; }
        .reimagining-title { font-size: 38px; margin-bottom: 40px; }
        .hw-title { font-size: 40px; }
    }

    @media (max-width: 768px) {
        .home-hero { padding: 60px 0 80px; }
        .intro-section, .matters-section, .reimagining-section, .home-workshops { padding: 50px 0; }
        .hero-subtitle { font-size: 18px; margin-bottom: 20px; }
        .hero-date { font-size: 15px; margin-bottom: 30px; }
        .hero-title-img { max-width: 80%; }
        .intro-title { font-size: 32px; margin-bottom: 20px; }
        .intro-text { font-size: 16px; }
        .matters-title { font-size: 32px; }
        .matters-section p { font-size: 16px !important; }
        .carousel-item img { height: 250px; }
        .reimagining-title { font-size: 28px; margin-bottom: 30px; text-align: left; }
        .pillar-card { padding: 25px; }
        .pillar-card h3 { font-size: 22px; }
        .pillar-card i, .pillar-card img { width: 40px !important; margin-bottom: 15px; }
        .hw-title { font-size: 32px; }
        .stat-box { padding: 15px !important; }
        .stat-box .display-4 { font-size: 28px; }
        .stat-box h5 { font-size: 12px; line-height: 1.2; }
        .workshop-card { width: 100%; padding: 20px; }
        
        /* FIX TAGS MOBILE LAYOUT (Tanpa Merusak Desktop) */
        .tags-grid-container { display: flex; flex-direction: row; flex-wrap: wrap; gap: 8px; }
        .tags-row { display: contents; } 
        
        .modal-kustom .modal-content { padding: 15px; }
        .modal-kustom .header-card { padding: 25px 20px; margin-bottom: 20px; }
        .modal-kustom .header-title { font-size: 28px; }
        .modal-kustom .header-subtitle { font-size: 18px; }
        .modal-kustom .desc-card { padding: 20px; font-size: 15px; }
        .modal-kustom .list-item-card { padding: 15px; font-size: 14px; }
        .modal-workshop-detail .modal-content { padding: 15px; }
        .modal-workshop-detail .modal-header-custom { padding: 25px 20px; margin-bottom: 20px; }
        .modal-workshop-detail .ws-title { font-size: 26px; }
        .modal-workshop-detail .ws-subtitle { font-size: 16px; }
        .modal-workshop-detail .info-card { padding: 25px 20px; }
        .modal-workshop-detail .ws-heading { font-size: 16px; }
        .modal-workshop-detail .ws-text { font-size: 15px; }
        .modal-workshop-detail .fac-header-row { flex-direction: column; align-items: flex-start; gap: 15px; }
        .modal-workshop-detail .fac-img { width: 80px; height: 80px; }
        .modal-workshop-detail .fac-name { font-size: 18px; }
        .modal-workshop-detail .fac-role { font-size: 14px; }

        .hero-ballet { max-width: 200px; right: -5%; top: 5%; bottom: auto; opacity: 0.4; z-index: 0; pointer-events: none; }
        .hero-saxophone { max-width: 200px; left: -5%; bottom: 12%; opacity: 0.4; z-index: 0; pointer-events: none; }
        .intro-brush { max-width: 260px; top: -5%; right: -5%; left: auto; opacity: 0.4; z-index: 0; pointer-events: none; transform: scaleX(-1); }
        .intro-mask { max-width: 150px; bottom: 5%; left: auto; right: -5%; opacity: 0.15; z-index: 0; top: auto; pointer-events: none; }
        .matters-mic { max-width: 220px; right: -5%; top: 0; opacity: 0.4; z-index: 0; pointer-events: none; }
        .reimagining-layer { max-width: 260px; top: 0; right: -5%; left: auto; opacity: 0.4; z-index: 0; pointer-events: none; transform: scaleX(-1); }
        .hero-shape { max-width: 150px; right: -5%; top: 5%; opacity: 0.15; z-index: 0; pointer-events: none; }
    }
</style>

<section class="home-hero">
        <img src="<?= base_url('assets/public/images/icon-ballet-white.png') ?>" alt="" class="hero-ballet">
        <img src="<?= base_url('assets/public/images/home-saxophone.png') ?>" alt="" class="hero-saxophone">
        
        <div class="container position-relative" style="z-index: 2;">
        <div class="hero-pretitle">SLEC × NAFA Present</div>
        <img src="<?= base_url('assets/public/images/footer-logo.png') ?>" alt="Ageing Artfully Conference 2026" class="hero-title-img">
        
        <h2 class="hero-subtitle">Living Everyday Joys Through the Arts</h2>
        <div class="hero-date">Wednesday, 22 July 2026<br>9:00 AM - 5:00 PM</div>
        <a href="<?= base_url('speakers#breakout-workshops') ?>" class="btn-outline-white">Explore More ></a>
    </div>
</section>

<section id="intro" class="intro-section">
    <img src="<?= base_url('assets/public/images/icon-brush.png') ?>" alt="" class="intro-brush">
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
    <img src="<?= base_url('assets/public/images/icon-mask.png') ?>" alt="" class="intro-mask">
    <img src="<?= base_url('assets/public/images/icon-mic.png') ?>" alt="" class="matters-mic">
    <div class="container position-relative" style="z-index: 2;">
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
    <img src="<?= base_url('assets/public/images/icon-layer.png') ?>" alt="" class="reimagining-layer">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row justify-content-end mb-4">
            <div class="col-lg-8 text-lg-end">
                <h2 class="reimagining-title">Reimagining ageing<br>through <span style="color: #92B9FA;">creation</span>,<br><span style="color: #92B9FA;">connection</span> and<br><span style="color: #92B9FA;">contribution</span></h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="pillar-card card-yellow">
                    <img src="<?= base_url('assets/public/images/quill.png') ?>" alt="" class="" style="width: 50px;">
                    <br>
                    <br>
                    <br>
                    <h3>Creation</h3>
                    <p>Creation in later life is an affirmation of identity. Through storytelling, artistic practice, and everyday creativity, individuals continue to express who they are and who they are becoming.</p>
                    <button class="btn-more" data-bs-toggle="modal" data-bs-target="#modalCreation">Read More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pillar-card card-blue">
                    <img src="<?= base_url('assets/public/images/affiliate.png') ?>" alt="" class="" style="width: 50px;">
                    <br>
                    <br>
                    <br>
                    <h3>Connection</h3>
                    <p>The arts foster relationships across individuals, generations, and communities—creating shared spaces for belonging and mutual understanding.</p>
                    <button class="btn-more" data-bs-toggle="modal" data-bs-target="#modalConnection">Read More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pillar-card card-pink">
                    <img src="<?= base_url('assets/public/images/atom.png') ?>" alt="" class="" style="width: 50px;">
                    <br>
                    <br>
                    <br>
                    <h3>Contribution</h3>
                    <p>Older adults are not passive participants, but active contributors—mentors, collaborators, and cultural bearers whose creative engagement enriches society.</p>
                    <button class="btn-more" data-bs-toggle="modal" data-bs-target="#modalContribution">Read More</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-workshops">
    <img src="<?= base_url('assets/public/images/home-hero-shape.png') ?>" alt="" class="hero-shape">
    <div class="container position-relative" style="z-index: 2;">
        <p class="small text-muted fw-bold mb-2">SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h2 class="hw-title">More Workshops<br>More Learning</h2>
        <div class="row g-2 g-md-4 mb-5" style="max-width: 600px;">
            <div class="col-4"><div class="stat-box" style="background-color: #D1CCFF;"><div class="display-4">14</div><h5>Inspiring<br>Practitioners</h5></div></div>
            <div class="col-4"><div class="stat-box" style="background-color: #FFC1F1;"><div class="display-4">10</div><h5>Breakout<br>Workshops</h5></div></div>
            <div class="col-4"><div class="stat-box" style="background-color: #94C0FA;"><div class="display-4">3</div><h5>Plenary<br>Sessions</h5></div></div>
        </div>
        <p class="mb-4" style="font-size: 18px; max-width: 700px;">Participants are invited to choose <strong>up to 4 workshops</strong> based on their interests and the needs of the seniors they work with.</p>
        
        <div class="tags-grid-container mb-5">
            <?php 
            $tag_chunks = array_chunk($tags, 6);
            foreach($tag_chunks as $chunk): 
            ?>
                <div class="tags-row">
                    <?php foreach($chunk as $t): ?>
                        <a href="javascript:void(0)" class="tag-pill" data-tag="<?= htmlspecialchars($t->tag_name) ?>">
                            <span><?= htmlspecialchars($t->tag_name) ?></span>
                            <?php if(!empty($t->icon_default) && !empty($t->icon_active)): ?>
                                <img src="<?= base_url('uploads/tags/'.$t->icon_default) ?>" class="icon-default" alt="">
                                <img src="<?= base_url('uploads/tags/'.$t->icon_active) ?>" class="icon-active" alt="">
                            <?php else: ?>
                                <i class="fas fa-tag opacity-50 icon-default"></i>
                                <i class="fas fa-tag opacity-50 icon-active"></i>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="row g-4 justify-content-center">
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
                <img src="<?= base_url('assets/public/images/creation-edited.png') ?>" alt="" class="header-bg-img d-none d-md-block">
                <button type="button" class="btn btn-go-back" data-bs-dismiss="modal">Go Back</button>
                <h2 class="header-title">Creation <img src="<?= base_url('assets/public/images/quill.png') ?>" alt="" class="" style="width: 50px;"></h2>
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
                <img src="<?= base_url('assets/public/images/connection-edited.png') ?>" alt="" class="header-bg-img d-none d-md-block">
                <button type="button" class="btn btn-go-back" data-bs-dismiss="modal">Go Back</button>
                <h2 class="header-title">Connection <img src="<?= base_url('assets/public/images/affiliate.png') ?>" alt="" class="" style="width: 50px;"></h2>
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
                <img src="<?= base_url('assets/public/images/contribution-edited.png') ?>" alt="" class="header-bg-img d-none d-md-block">
                <button type="button" class="btn btn-go-back" data-bs-dismiss="modal">Go Back</button>
                <h2 class="header-title">Contribution <img src="<?= base_url('assets/public/images/atom.png') ?>" alt="" class="" style="width: 50px;"></i></h2>
                <h3 class="header-subtitle">Strengthening Relationship</br>and Belonging</h3>
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
$CI =& get_instance();
$CI->load->model('Tag_model');
$CI->load->model('Workshop_model');

foreach($workshops as $w): 
    $active_bg = (isset($w->header_color) && !empty($w->header_color)) ? htmlspecialchars($w->header_color) : '#FDBA74';

    $related_tag_ids = $CI->Workshop_model->get_related_tags($w->id);
    $workshop_specific_tags = [];
    foreach($related_tag_ids as $tid) {
        $tag_obj = $CI->Tag_model->get_by_id($tid);
        if($tag_obj) $workshop_specific_tags[] = $tag_obj; 
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
                            <h6 class="ws-heading"><img src="<?= base_url('assets/public/images/clipboard.png') ?>" alt="" class="" style="width: 20px;"> Workshop Synopsis</h6>
                            <p class="ws-text"><?= nl2br(htmlspecialchars($w->synopsis)) ?></p>
                            
                            <h6 class="ws-heading"><img src="<?= base_url('assets/public/images/pin.png') ?>" alt="" class="" style="width: 20px;"> Workshop Location</h6>
                            <p class="ws-text"><?= htmlspecialchars($w->location_venue) ?><br><?= htmlspecialchars($w->location_room) ?></p>
                            
                            <h6 class="ws-heading"><img src="<?= base_url('assets/public/images/tick.png') ?>" alt="" class="" style="width: 20px;"> Best Suited for</h6>
                            <p class="ws-text" style="margin-bottom: 25px;"><?= htmlspecialchars($w->best_suited_for) ?></p>
                            
                            <div>
                                <?php foreach($workshop_specific_tags as $t_obj): ?>
                                    <span class="ws-tag-pill">
                                        <?= htmlspecialchars($t_obj->tag_name) ?> 
                                        <?php if(!empty($t_obj->icon_default)): ?>
                                            <img src="<?= base_url('uploads/tags/'.$t_obj->icon_default) ?>" style="width: 14px; height: auto;" alt="icon">
                                        <?php else: ?>
                                            <i class="fas fa-star" style="font-size: 12px; opacity: 0.7;"></i>
                                        <?php endif; ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="info-card">
                            <h6 class="ws-heading"><img src="<?= base_url('assets/public/images/user.png') ?>" alt="" class="" style="width: 20px;"> Facilitator Profile</h6>
                            
                            <?php if(!empty($w->all_facilitators)): ?>
                                <?php foreach($w->all_facilitators as $fac): ?>
                                    <div class="fac-header-row mt-4">
                                        <?php 
                                            // LOGIKA PEMILIHAN FOTO POPUP
                                            if(isset($fac->image_path_popup) && $fac->image_path_popup != 'default.png' && !empty($fac->image_path_popup)) { 
                                                $fac_img_detail = base_url('uploads/facilitators/'.$fac->image_path_popup); 
                                            } else if($fac->image_path != 'default.png' && !empty($fac->image_path)) { 
                                                $fac_img_detail = base_url('uploads/facilitators/'.$fac->image_path); 
                                            } else { 
                                                $fac_img_detail = 'https://ui-avatars.com/api/?name='.urlencode($fac->name).'&background=random&size=200'; 
                                            }
                                        ?>
                                        <img src="<?= $fac_img_detail ?>" alt="<?= htmlspecialchars($fac->name) ?>" class="fac-img shadow-sm">
                                        
                                        <div>
                                            <div class="fac-name"><?= htmlspecialchars($fac->name) ?></div>
                                            <div class="fac-role">
                                                <?= htmlspecialchars($fac->designation) ?><br>
                                                <?= htmlspecialchars($fac->organization) ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                
                                <p class="ws-text mt-4" style="margin-bottom: 30px;">
                                    <?= nl2br(htmlspecialchars($w->team_bio)) ?>
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
    let activeTag = null; 

    tagPills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const tag = this.getAttribute('data-tag');
            
            if (activeTag === tag) {
                activeTag = null;
                this.classList.remove('active');
            } else {
                tagPills.forEach(p => p.classList.remove('active'));
                activeTag = tag;
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

            if (activeTag !== null) {
                isMatch = cardTags.includes(activeTag);
            }

            if (isMatch) {
                wrapper.classList.remove('d-none'); 
                setTimeout(() => wrapper.classList.remove('fade-out'), 20); 
            } else {
                wrapper.classList.add('fade-out');
                setTimeout(() => { 
                    if(wrapper.classList.contains('fade-out')) wrapper.classList.add('d-none'); 
                }, 550);
            }
        });
    }
});
</script>