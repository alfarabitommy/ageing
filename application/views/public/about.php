<style>
    /* Global Section Spacing */
    section { padding: 80px 0; }
    .section-title { color: #5156B8; font-size: 42px; font-weight: 800; margin-bottom: 30px; letter-spacing: -0.5px; }
    .text-purple { color: #5156B8; }

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
        background-color: #5156B8;
        color: white;
        border-radius: 30px;
        padding: 60px;
        position: relative;
        box-shadow: 0 15px 40px rgba(81, 86, 184, 0.2);
        overflow: hidden;
    }
    .vision-overlay-box h3 { font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #92B9FA; } /* Light blue text */
    .vision-overlay-box p { font-size: 24px; font-weight: 500; line-height: 1.5; margin-bottom: 20px; }
    .icon-pen { position: absolute; right: -5%; top: -10%; max-width: 350px; opacity: 0.9; pointer-events: none; }

    /* 3. Conference Objectives (White Theme) */
    .objectives-section { background-color: #FAFAFA; padding-top: 120px; /* Ekstra padding atas karena ada overlay box */ }
    .obj-card {
        background: white; 
        border: 1px solid #5156B8; 
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
</style>

<div id="aboutCarousel" class="carousel slide about-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('assets/public/images/carousel-1.jpg') ?>" class="d-block w-100" alt="About Us 1">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/public/images/carousel-2.jpg') ?>" class="d-block w-100" alt="About Us 2">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/public/images/carousel-3.jpg') ?>" class="d-block w-100" alt="About Us 3">
        </div>
    </div>
</div>

<div class="container vision-container">
    <div class="vision-overlay-box">
        <img src="<?= base_url('assets/public/images/CLE-White Pen.png') ?>" alt="" class="icon-pen d-none d-md-block">
        <div class="row">
            <div class="col-lg-9 position-relative" style="z-index: 2;">
                <h3>> Our Vision</h3>
                <p>At its heart, Ageing Artfully reimagines ageing as a stage rich with potential—for creation that affirms identity, connection that nurtures belonging, and contribution that sustains purpose.</p>
                <p style="font-size: 18px; font-weight: 400; opacity: 0.9;">We move toward a vision of ageing that honours not only well-being but the enduring human desire to create, relate, and celebrate.</p>
            </div>
        </div>
    </div>
</div>

<section class="objectives-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Conference Objectives</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="obj-card">
                    <i class="fas fa-sync-alt"></i>
                    <h4>Shift the narrative</h4>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card">
                    <i class="fas fa-hands-holding-heart"></i>
                    <h4>Deepen dignity</h4>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card">
                    <i class="fas fa-seedling"></i>
                    <h4>Inspire sustainable</h4>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card">
                    <i class="fas fa-level-up-alt"></i>
                    <h4>Elevate older adults</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="position-relative bg-white pt-5">
    <div class="container position-relative">
        <img src="<?= base_url('assets/public/images/icon-brush.png') ?>" alt="" class="icon-brush d-none d-lg-block">
        
        <div class="row align-items-center">
            <div class="col-lg-6 pe-lg-5 mb-5 mb-lg-0 position-relative" style="z-index: 2;">
                <span class="profile-label text-purple">> About St Luke's ElderCare (SLEC)</span>
                <h2 class="profile-title text-purple">Revolutionizing the care industry in Singapore</h2>
                <p class="profile-text">SLEC is a Christian healthcare provider dedicated to enriching the lives of seniors in Singapore, regardless of race, language and religion.</p>
                <p class="profile-text">Guided by our GRACE philosophy of care, we are committed to providing compassionate and holistic care that fosters autonomy and choice.</p>
                
                <div class="location-box">
                    <span class="location-title text-purple"><i class="fas fa-map-marker-alt me-2"></i> Office Location</span>
                    <p class="location-text fw-bold">St Luke's ElderCare (SLEC) Headquarters</p>
                    <p class="location-text">461 Clementi Road #04-11, Block A, SIM Headquarters, Singapore 599491</p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="<?= base_url('assets/public/images/about-slec.jpg') ?>" alt="SLEC Profile" class="profile-img">
            </div>
        </div>
    </div>
</section>

<section class="position-relative bg-white pb-5">
    <div class="container position-relative">
        <img src="<?= base_url('assets/public/images/icon-mask-reverted.png') ?>" alt="" class="icon-mask d-none d-lg-block">
        
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 order-2 order-lg-1">
                <img src="<?= base_url('assets/public/images/about-nafa.jpg') ?>" alt="NAFA Profile" class="profile-img">
            </div>
            <div class="col-lg-6 ps-lg-5 order-1 order-lg-2 position-relative" style="z-index: 2;">
                <span class="profile-label text-purple">> About Nanyang Academy of Fine Arts (NAFA)</span>
                <h2 class="profile-title text-purple">Singapore's pioneer arts institution</h2>
                <p class="profile-text">Established in 1938, NAFA is Singapore's pioneer arts institution and a founding member of the University of the Arts Singapore (UAS).</p>
                <p class="profile-text">Renowned for its strength in Southeast Asian arts, NAFA is also recognised for its rigorous, practice-led curriculum, interdisciplinary approach, and strong engagement with the creative community.</p>
                
                <div class="location-box">
                    <span class="location-title text-purple"><i class="fas fa-map-marker-alt me-2"></i> Office Location</span>
                    <p class="location-text fw-bold">Nanyang Academy of Fine Arts</p>
                    <p class="location-text">80 Bencoolen Street, Singapore 189655</p>
                </div>
            </div>
        </div>
    </div>
</section>