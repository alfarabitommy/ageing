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
        background-color: #FFDEB3; /* Soft orange dari desain */
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
    .pillar-card .btn { border: 1px solid #111; border-radius: 20px; padding: 5px 20px; font-weight: 700; font-size: 14px; background: transparent; color: #111; }
    .pillar-card .btn:hover { background: #111; color: white; }

    /* Card Colors based on Design */
    .card-yellow { background-color: #FCE170; }
    .card-blue { background-color: #92B9FA; }
    .card-pink { background-color: #FBD3E5; }

    /* WORKSHOPS SECTION (Reusing Styles from Speakers Page) */
    .home-workshops { padding: 80px 0; }
    .hw-title { font-size: 52px; color: #5156B8; line-height: 1.1; margin-bottom: 30px; }
    
    .stat-box { border-radius: 15px; padding: 25px; height: 100%; display: flex; flex-direction: column; justify-content: center; }
    .stat-box .display-4 { font-weight: 800; color: #111; }
    .stat-box h5 { color: #111; font-weight: 600; margin: 0; }
    
    .tag-pill { border: 1px solid #5156B8; color: #5156B8; border-radius: 20px; padding: 5px 15px; font-size: 13px; display: inline-block; margin: 0 5px 10px 0; text-decoration: none; transition: 0.2s; }
    .tag-pill:hover { background-color: #5156B8; color: white; }

    .workshop-card { border: 1px solid #E0E0E0; border-radius: 15px; padding: 25px; text-align: center; height: 100%; background-color: white; display: flex; flex-direction: column; }
    .workshop-img { width: 100px; height: 100px; object-fit: cover; border-radius: 15px; margin: 0 auto 20px; }
    .workshop-title { color: #5156B8; font-weight: 700; font-size: 18px; margin-bottom: 10px; }
    .workshop-subtitle { font-size: 13px; color: #555; margin-bottom: 20px; flex-grow: 1; }
    .workshop-fac-name { color: #5156B8; font-weight: 600; font-size: 14px; margin-bottom: 2px; }
    .workshop-fac-org { font-size: 11px; color: #777; margin-bottom: 20px; }
    .btn-read-more { background-color: #7C83DB; color: white; border-radius: 20px; padding: 6px 25px; font-size: 13px; font-weight: 600; border: none; align-self: center; text-decoration: none; }
    .btn-read-more:hover { background-color: #5156B8; color: white; }
</style>

<section class="home-hero">
    <img src="<?= base_url('assets/public/images/home-hero-shape.png') ?>" alt="" class="hero-shape d-none d-md-block">
    <img src="<?= base_url('assets/public/images/icon-ballet-white.png') ?>" alt="" class="hero-ballet d-none d-md-block">
    
    <div class="container position-relative" style="z-index: 2;">
        <div class="hero-pretitle">SLEC × NAFA Present</div>
        <img src="<?= base_url('assets/public/images/footer-logo.png') ?>" alt="Ageing Artfully Conference 2026" class="hero-title-img">
        <h2 class="hero-subtitle">Living Everyday Joys Through the Arts</h2>
        <div class="hero-date">
            Wednesday, 22 July 2026<br>
            9 AM - 5 PM
        </div>
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
                <p class="intro-text">
                    SLEC x NAFA Ageing Artfully Conference 2026 invites a shift in perspective, from viewing the arts as intervention to embracing them as a lifelong practice that shapes identity, purpose, and belonging.
                </p>
                <p class="intro-text">
                    Bringing together artists, academics, eldercare professionals, community partners, and older adults, this conference explores how creativity can be embedded into everyday life, beyond programmes and into lived experience.
                </p>
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
                <p style="font-size: 18px;">
                    Creativity in later life goes beyond well-being. It affirms identity, nurtures connection, and enables meaningful contribution, supporting older adults as active participants in cultural and community life.
                </p>
            </div>
        </div>

        <div id="conferenceCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#conferenceCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#conferenceCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#conferenceCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/public/images/carousel-1.jpg') ?>" class="d-block w-100" alt="Conference Audience">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/public/images/carousel-2.jpg') ?>" class="d-block w-100" alt="Conference Activity">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/public/images/carousel-3.jpg') ?>" class="d-block w-100" alt="Golden Grooves">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#conferenceCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#conferenceCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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
                    <a href="#" class="btn">Read More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pillar-card card-blue">
                    <i class="fas fa-project-diagram"></i>
                    <h3>Connection</h3>
                    <p>The arts foster relationships across individuals, generations, and communities—creating shared spaces for belonging and mutual understanding.</p>
                    <a href="#" class="btn">Read More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pillar-card card-pink">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Contribution</h3>
                    <p>Older adults are not passive participants, but active contributors—mentors, collaborators, and cultural bearers whose creative engagement enriches society.</p>
                    <a href="#" class="btn">Read More</a>
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
            <div class="col-4">
                <div class="stat-box" style="background-color: #F8E6EC;">
                    <div class="display-4">3</div>
                    <h5>Conference<br>Sessions</h5>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-box" style="background-color: #EAE6FB;">
                    <div class="display-4">10</div>
                    <h5>Breakout<br>Workshops</h5>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-box" style="background-color: #DDF2F8;">
                    <div class="display-4">1 Day</div>
                    <h5>Full of<br>Lectures</h5>
                </div>
            </div>
        </div>

        <p class="mb-4" style="font-size: 18px; max-width: 700px;">
            Participants are invited to choose up to 4 workshops based on their interests and the needs of the seniors they work with.
        </p>

        <div class="mb-5">
            <?php foreach($tags as $t): ?>
                <a href="javascript:void(0)" class="tag-pill"><?= htmlspecialchars($t->tag_name) ?> <i class="fas fa-tag ms-1 opacity-50"></i></a>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php foreach($workshops as $w): ?>
            <div class="col-md-6 col-lg-4">
                <div class="workshop-card">
                    <?php 
                        if($w->primary_facilitator && $w->primary_facilitator->image_path != 'default.png') {
                            $fac_img = base_url('uploads/facilitators/'.$w->primary_facilitator->image_path);
                        } else {
                            $fac_name = $w->primary_facilitator ? $w->primary_facilitator->name : 'N/A';
                            $fac_img = 'https://ui-avatars.com/api/?name='.urlencode($fac_name).'&background=random';
                        }
                    ?>
                    <img src="<?= $fac_img ?>" alt="Facilitator" class="workshop-img shadow-sm">
                    
                    <h3 class="workshop-title"><?= htmlspecialchars($w->title) ?></h3>
                    <p class="workshop-subtitle"><?= htmlspecialchars($w->subtitle) ?></p>
                    
                    <?php if($w->primary_facilitator): ?>
                        <p class="workshop-fac-name"><?= htmlspecialchars($w->primary_facilitator->name) ?></p>
                        <p class="workshop-fac-org"><?= htmlspecialchars($w->primary_facilitator->designation) ?><br><?= htmlspecialchars($w->primary_facilitator->organization) ?></p>
                    <?php endif; ?>

                    <a href="<?= base_url('workshop/'.$w->slug) ?>" class="btn-read-more mt-auto">Read More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>