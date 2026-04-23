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
    
    /* Carousel Styling */
    .carousel-inner { border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
    .carousel-item img { height: 600px; object-fit: cover; }
    .carousel-indicators [data-bs-target] { width: 12px; height: 12px; border-radius: 50%; background-color: rgba(255,255,255,0.7); border: none; margin: 0 5px; }
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