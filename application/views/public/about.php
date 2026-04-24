<style>
    /* =========================================
       GLOBAL SECTION SPACING & TYPOGRAPHY
       ========================================= */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'DM Sans', sans-serif;
    }

    body {
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

    /* Animasi Masuk (Slide Up Fade) */
    @keyframes slideUpFade {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* =========================================
       1. PROGRAMME HERO (STAR SLIDER BACKGROUND)
       ========================================= */
    .programme-hero {
        background-color: #5156B8; /* Navy Blue */
        color: white;
        padding: 80px 0 160px; /* Padding bawah diperbesar untuk memberi ruang carousel */
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
        bottom: 0;
        right: 0; /* Disesuaikan agar tidak overflow keluar viewport */
        z-index: 0;
    }
    .slider-thumb img {
        max-width: 300px;
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
        margin-top: -120px; /* Overlapping yang proporsional */
        padding: 0 15px;
    }
    .vision-overlay-box {
        background-color: #ffffff;
        border-radius: 30px;
        position: relative;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1); /* Bayangan diperhalus */
        overflow: hidden;
        animation: slideUpFade 0.6s ease forwards;
    }
    .vision-overlay-box .carousel-inner {
        border-radius: 30px; 
    }
    .vision-overlay-box .carousel-item img {
        height: 450px; 
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

    /* Teks Transisi Patahan */
    .transition-text-section {
        padding: 60px 0 20px;
        text-align: center;
    }
    .profile-text { 
        font-size: 18px; 
        color: #444; 
        line-height: 1.8; 
        max-width: 800px; /* Menggantikan <br> paksa agar responsif */
        margin: 0 auto;
        font-weight: 500;
    }

    /* =========================================
       3. CONFERENCE OBJECTIVES
       ========================================= */
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
    }

    .obj-card {
        border-radius: 25px; 
        padding: 40px 25px; 
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

    .obj-card i { font-size: 36px; margin-bottom: 20px; display: block; opacity: 0.9; }
    .obj-card h4 { font-size: 20px; font-weight: 800; margin-bottom: 10px; line-height: 1.3; }
    .obj-card p { font-size: 15px; margin: 0; opacity: 0.85; font-weight: 500; }

    /* =========================================
       4. NEWS / ABOUT ORGANISATIONS SECTION
       ========================================= */
    .news-section {
        padding: 80px 0;
    }
    .news-grid {
        display: flex;
        gap: 30px; 
        flex-wrap: wrap; 
    }
    .news-item {
        background: #fff;
        flex: 1; 
        min-width: 300px; 
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        transition: transform 0.3s ease, box-shadow 0.3s;
        opacity: 0;
        animation: slideUpFade 0.6s ease forwards;
    }
    .news-item:nth-child(1) { animation-delay: 0.2s; }
    .news-item:nth-child(2) { animation-delay: 0.4s; }

    .news-item:hover {
        transform: translateY(-5px); 
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    .news-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    .news-content {
        padding: 30px;
    }
    .news-content h3 {
        margin: 0 0 15px 0;
        color: #111;
        font-weight: 800;
        font-size: 22px;
    }
    .news-content p {
        font-size: 15px;
        color: #555;
        margin-bottom: 20px;
        line-height: 1.6;
    }
    .read-more {
        text-decoration: none;
        color: #5156B8;
        font-weight: 700;
        font-size: 15px;
        transition: opacity 0.3s;
    }
    .read-more:hover {
        opacity: 0.7;
    }

    /* =========================================
       RESPONSIVE MOBILE ADJUSTMENTS
       ========================================= */
    @media (max-width: 768px) {
        section { padding: 50px 0; }
        
        .programme-hero { padding: 40px 0 100px; }
        .hero-title { font-size: 2.2rem; }
        .programme-hero p.lead { font-size: 16px; margin-bottom: 30px !important; }
        
        /* Elemen hiasan dibuat estetik namun tidak mendominasi */
        .slider-thumb img { 
            max-width: 150px; 
            opacity: 0.4; 
        }

        /* Penyesuaian Overlay Carousel agar tidak menabrak teks */
        .vision-container { margin-top: -60px; }
        .vision-overlay-box .carousel-item img { height: 250px; }
        
        .transition-text-section { padding: 40px 0 10px; }
        .profile-text { font-size: 16px; padding: 0 15px; }

        .objectives-section { padding: 60px 0; }
        .section-title { font-size: 32px; }
        .objectives-subtitle { font-size: 18px; padding: 0 15px; margin-bottom: 30px; }
        
        .obj-card { padding: 30px 20px; }
        .obj-card h4 { font-size: 18px; }
        
        .news-grid { flex-direction: column; gap: 20px; }
        .news-content { padding: 20px; }
    }
</style>

<section class="programme-hero">
    <div class="slider-thumb">
        <img src="<?= base_url('assets/public/images/bg-shape-1.png') ?>" alt="Shape">
    </div>

    <div class="container">
        <p class="small fw-bold mb-3">> SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h1 class="hero-title">Reimagining Ageing<br>
        through the Power of<br>
        the Arts Together
        </h1>
        <p class="lead mb-5" style="max-width: 600px;">
             St Luke's ElderCare (SLEC) and Nanyang Academy of Fine Arts
             (NAFA), University of the Arts Singapore (UAS) have been
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

<section class="transition-text-section bg-white">
    <div class="container">
        <p class="profile-text text-center">
            The two Organisations formalised their partnership with the 
            signing of Memorandum of Understanding in August 2025, 
            and the Ageing Artfully Conference is one of the 
            partnership highlights.
        </p>
    </div>
</section>

<section class="objectives-section">
    <div class="container">
        <h2 class="section-title mb-3">Conference Objectives</h2>
        <p class="objectives-subtitle">
            Through interdisciplinary dialogue among artists, academics, 
            eldercare professionals, community partners, and older adults themselves, 
            the conference aims to:
        </p>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-1">
                    <i class="fas fa-sync-alt"></i>
                    <h4>Shift the narrative</h4>
                    <p>from arts as therapy to arts<br>as living practice</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-2">
                    <i class="fas fa-heart"></i>
                    <h4>Deepen dignity</h4>
                    <p>and agency-centered<br>approaches in ageing</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-3">
                    <i class="fas fa-seedling"></i>
                    <h4>Inspire sustainable</h4>
                    <p>community-integrated<br>creative ecosystem</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card obj-card-4">
                    <i class="fas fa-level-up-alt"></i>
                    <h4>Elevate older adults</h4>
                    <p>as active contributors<br>to cultural life</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news-section bg-white">
    <div class="container">
        <div class="news-grid">
            <div class="news-item">
                <img src="<?= base_url('assets/public/images/about-slec.png') ?>" alt="About SLEC">
                <div class="news-content">
                    <h3>About St Luke's ElderCare</h3>
                    <p>SLEC was established in 1999 and together they revolutionized the care industry in Singapore.</p>
                    <a href="#" class="read-more">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="news-item">
                <img src="<?= base_url('assets/public/images/about-nafa.png') ?>" alt="About NAFA">
                <div class="news-content">
                    <h3>About Nanyang Academy</h3>
                    <p>NAFA is Singapore's pioneer arts institution and a founding member of the University of the Arts Singapore (UAS).</p>
                    <a href="#" class="read-more">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>