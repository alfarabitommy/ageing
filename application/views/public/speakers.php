<style>
    /* Section 1: The Programme Hero */
    .programme-hero {
        background-color: #5156B8; /* Navy Blue */
        color: white;
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }
    .shape-1 {
        position: absolute;
        top: 0;
        right: 0;
        max-width: 400px;
        z-index: 0;
    }
    .programme-hero .container {
        position: relative;
        z-index: 1;
    }
    .stat-card {
        border-radius: 15px;
        border: none;
        height: 100%;
    }
    .stat-card .display-4 {
        font-weight: 800;
        color: #1B2A47;
    }
    .stat-card h5 {
        color: #1B2A47;
        font-weight: 600;
    }

    /* Section 2: Plenary Speakers */
    .section-title {
        color: #5156B8;
        font-weight: 800;
        font-size: 42px;
        margin-bottom: 15px;
    }
    .speaker-card {
        border: 1px solid #5156B8;
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        height: 100%;
        background-color: white;
        transition: transform 0.3s;
    }
    .speaker-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(81, 86, 184, 0.1);
    }
    .speaker-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 15px; /* Sedikit membulat sesuai desain */
        margin-bottom: 20px;
    }
    .speaker-name {
        color: #5156B8;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .speaker-title {
        font-size: 14px;
        color: #333;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .speaker-org {
        font-size: 12px;
        color: #5156B8;
        font-weight: 700;
    }

    /* Section 3: Breakout Workshops */
    .workshops-section {
        position: relative;
        padding: 60px 0;
        scroll-margin-top: 80px; /* Mencegah judul tertutup navbar sticky saat di-scroll */
    }
    .shape-2 {
        position: absolute;
        top: 0;
        right: 0;
        max-width: 300px;
        z-index: -1;
    }
    .tag-pill {
        border: 1px solid #5156B8;
        color: #5156B8;
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 13px;
        display: inline-block;
        margin: 0 5px 10px 0;
        background: white;
        text-decoration: none;
        transition: all 0.2s;
    }
    .tag-pill:hover {
        background-color: #5156B8;
        color: white;
    }
    .workshop-card {
        border: 1px solid #E0E0E0;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        height: 100%;
        background-color: white;
        display: flex;
        flex-direction: column;
    }
    .workshop-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 15px;
        margin: 0 auto 20px;
    }
    .workshop-title {
        color: #5156B8;
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .workshop-subtitle {
        font-size: 13px;
        color: #555;
        margin-bottom: 20px;
        flex-grow: 1; /* Mendorong tombol ke bawah */
    }
    .workshop-fac-name {
        color: #5156B8;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 2px;
    }
    .workshop-fac-org {
        font-size: 11px;
        color: #777;
        margin-bottom: 20px;
    }
    .btn-read-more {
        background-color: #7C83DB;
        color: white;
        border-radius: 20px;
        padding: 6px 25px;
        font-size: 13px;
        font-weight: 600;
        border: none;
        align-self: center;
        text-decoration: none;
    }
    .btn-read-more:hover {
        background-color: #5156B8;
        color: white;
    }
</style>

<section class="programme-hero">
    <img src="<?= base_url('assets/public/images/bg-shape-1.png') ?>" alt="" class="shape-1">
    <div class="container">
        <p class="small fw-bold mb-3">> SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h1 class="display-3 fw-bold mb-4">The Programme</h1>
        <p class="lead mb-5" style="max-width: 600px;">
            At the heart of the conference is the belief that the arts are not just activities, but everyday practices that support connection, identity, and well-being.
        </p>
        
        <div class="row g-4" style="max-width: 700px;">
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #F8E6EC;">
                    <div class="card-body p-4">
                        <div class="display-4">4</div>
                        <h5>Plenary<br>Sessions</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #EAE6FB;">
                    <div class="card-body p-4">
                        <div class="display-4">10</div>
                        <h5>Breakout<br>Workshops</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card" style="background-color: #DDF2F8;">
                    <div class="card-body p-4">
                        <div class="display-4">1 Day</div>
                        <h5>Full of<br>Lectures</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 mt-4">
    <h2 class="section-title">The Speakers</h2>
    <p class="mb-5" style="max-width: 800px; color: #333; font-size: 18px;">
        This year's conference features speakers from across a wide range of fields, bringing together diverse perspectives to offer a multidisciplinary look at the future of ageing. These plenary sessions are designed to inspire and widen your horizons through innovative approaches to senior well-being.
    </p>

    <div class="row g-4">
        <?php foreach($speakers as $s): ?>
        <div class="col-md-6 col-lg-3">
            <div class="speaker-card">
                <?php $img_src = ($s->image_path != 'default.png' && $s->image_path != '') ? base_url('uploads/speakers/'.$s->image_path) : 'https://ui-avatars.com/api/?name='.urlencode($s->name).'&background=random'; ?>
                <img src="<?= $img_src ?>" alt="<?= htmlspecialchars($s->name) ?>" class="speaker-img shadow-sm">
                
                <h3 class="speaker-name"><?= htmlspecialchars($s->name) ?></h3>
                <p class="speaker-title"><?= htmlspecialchars($s->designation) ?></p>
                <p class="speaker-org mb-0"><?= htmlspecialchars(substr($s->bio_summary, 0, 50)) ?>...</p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="workshops-section" id="breakout-workshops">
    <img src="<?= base_url('assets/public/images/bg-shape-2.png') ?>" alt="" class="shape-2">
    <div class="container">
        <h2 class="section-title">Breakout Workshops</h2>
        <p class="mb-4" style="max-width: 600px; color: #333; font-size: 18px;">
            Participants are invited to choose up to 4 workshops based on their interests and the needs of the seniors they work with.
        </p>

        <div class="mb-5">
            <?php foreach($tags as $t): ?>
                <a href="javascript:void(0)" class="tag-pill"><?= htmlspecialchars($t->tag_name) ?></a>
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