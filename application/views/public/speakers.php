<style>
    /* =========================================
       GLOBAL & TYPOGRAPHY
       ========================================= */
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
    body {
        font-family: 'DM Sans', sans-serif;
        /* KUNCI PERBAIKAN: Mencegah horizontal scroll global tanpa memotong gambar vertikal */
        overflow-x: hidden;
    }

    /* =========================================
       SECTION 1: THE PROGRAMME HERO
       ========================================= */
    .programme-hero {
        background-color: #5156B8; /* Navy Blue */
        color: white;
        padding: 80px 0 100px;
        position: relative;
        /* overflow: hidden; DIHAPUS agar ornamen tidak terpotong */
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
        z-index: 2;
    }
    .stat-card {
        border-radius: 15px;
        border: none;
        height: 100%;
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .stat-card .display-4 {
        font-weight: 800;
        color: #1B2A47;
    }
    .stat-card h5 {
        color: #1B2A47;
        font-weight: 600;
        margin: 0;
    }

    /* =========================================
       SECTION 2: PLENARY SPEAKERS
       ========================================= */
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
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .speaker-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(81, 86, 184, 0.1);
    }
    .speaker-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 15px; 
        margin-bottom: 20px;
    }
    
    .speaker-name {
        color: #5156B8;
        font-weight: 800;
        font-size: 24px;
        margin-bottom: 12px;
    }
    .speaker-title {
        font-size: 16px;
        color: #111;
        font-weight: 500;
        margin-bottom: 8px;
        line-height: 1.3;
    }
    .speaker-dept {
        font-size: 14px;
        color: #111;
        font-weight: 400;
        margin-bottom: 15px;
        line-height: 1.4;
        flex-grow: 1;
    }
    .speaker-org {
        font-size: 15px;
        color: #5156B8;
        font-weight: 800;
        margin-top: auto; 
        line-height: 1.3;
    }

    /* =========================================
       SECTION 3: BREAKOUT WORKSHOPS
       ========================================= */
    .workshops-section {
        position: relative;
        padding: 60px 0;
        scroll-margin-top: 80px; 
        /* overflow: hidden; DIHAPUS agar ornamen .shape-2 bebas menembus ke atas */
    }
    .shape-2 {
        position: absolute;
        top: -100px;
        right: 0;
        max-width: 500px;
        z-index: 1;
    }
    
    .tags-grid-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
        position: relative;
        z-index: 2;
    }
    .tags-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

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
        background: transparent;
        text-decoration: none;
        transition: all 0.2s;
    }
    .tag-pill:hover, .tag-pill.active {
        background-color: #5156B8;
        color: white;
    }
    
    .tag-pill .icon-default { 
        display: inline-block; 
        width: 16px; 
        height: auto; 
        margin-left: 6px; 
    }
    .tag-pill .icon-active { 
        display: none; 
        width: 16px; 
        height: auto; 
        margin-left: 6px; 
    }
    
    .tag-pill:hover .icon-default, .tag-pill.active .icon-default { 
        display: none; 
    }
    .tag-pill:hover .icon-active, .tag-pill.active .icon-active { 
        display: inline-block; 
    }
    
    .workshop-wrapper { 
        transition: opacity 0.4s ease, transform 0.4s ease; 
        opacity: 1; 
        transform: scale(1); 
        position: relative;
        z-index: 2;
    }
    .workshop-wrapper.fade-out { 
        opacity: 0; 
        transform: scale(0.95); 
    }

    .workshop-card {
        width: 90%; 
        margin: 0 auto; 
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
        flex-grow: 1;
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
        transition: 0.3s;
    }
    .btn-read-more:hover {
        background-color: #5156B8;
        color: white;
    }

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
    .modal-workshop-detail .modal-body-custom { 
        padding: 0; 
    }
    .modal-workshop-detail .info-card { 
        background-color: #F4F4F6; 
        border-radius: 20px; 
        padding: 40px; 
        height: 100%; 
    }
    .modal-workshop-detail .ws-heading { 
        color: #111; 
        font-size: 18px; 
        font-weight: 800; 
        margin-bottom: 15px; 
        display: flex; 
        align-items: center; 
        gap: 10px; 
    }
    .modal-workshop-detail .ws-text { 
        font-size: 16px; 
        color: #111; 
        line-height: 1.6; 
        margin-bottom: 30px; 
    }
    .modal-workshop-detail .fac-header-row { 
        display: flex; 
        align-items: center; 
        gap: 20px; 
        margin-bottom: 15px; 
    }
    .modal-workshop-detail .fac-img { 
        width: 100px; 
        height: 100px; 
        border-radius: 12px; 
        object-fit: cover; 
    }
    .modal-workshop-detail .fac-name { 
        font-size: 20px; 
        font-weight: 800; 
        color: #111; 
        margin-bottom: 5px; 
    }
    .modal-workshop-detail .fac-role { 
        font-size: 16px; 
        color: #444; 
        font-weight: 500; 
    }
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
       RESPONSIVE MOBILE ADJUSTMENTS
       ========================================= */
    @media (max-width: 768px) {
        /* Layout & Spacing */
        .programme-hero { padding: 40px 0 60px; }
        .programme-hero .display-3 { font-size: 2.2rem; }
        .section-title { font-size: 30px; }
        .workshops-section { padding: 40px 0; }
        
        /* Stat Cards Horizontal Override */
        .stat-card .card-body { padding: 15px !important; }
        .stat-card .display-4 { font-size: 28px; }
        .stat-card h5 { font-size: 12px; line-height: 1.2; }

        /* Stats & Cards */
        .speaker-card { margin: 0 auto; width: 100%; }
        .workshop-card { width: 100%; padding: 20px; }
        .tags-grid-container { gap: 8px; }
        .tags-row { gap: 8px; justify-content: flex-start; }

        /* Modal Adjustments */
        .modal-workshop-detail .modal-content { padding: 15px; }
        .modal-workshop-detail .modal-header-custom { padding: 25px 20px; margin-bottom: 20px; }
        .modal-workshop-detail .ws-title { font-size: 26px; }
        .modal-workshop-detail .ws-subtitle { font-size: 16px; }
        .modal-workshop-detail .info-card { padding: 25px 20px; }
        .modal-workshop-detail .fac-header-row { flex-direction: column; align-items: flex-start; text-align: left; gap: 15px; }
        .modal-workshop-detail .fac-img { width: 80px; height: 80px; }

        /* =========================================
           ORNAMENTS MOBILE ADJUSTMENTS (WATERMARK FINAL)
           ========================================= */
        .shape-1 { max-width: 250px; top: 5%; right: -5%; opacity: 0.4; z-index: 0; pointer-events: none; }
        .shape-2 { max-width: 250px; top: 10px; right: -5%; opacity: 0.4; z-index: 0; pointer-events: none; }
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
        
        <div class="row g-2 g-md-4" style="max-width: 700px;">
            <div class="col-4">
                <div class="card stat-card" style="background-color: #D1CCFF;">
                    <div class="card-body p-3 p-md-4">
                        <div class="display-4">14</div>
                        <h5>Inspiring<br>Practitioners</h5>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card stat-card" style="background-color: #FFC1F1;">
                    <div class="card-body p-3 p-md-4">
                        <div class="display-4">10</div>
                        <h5>Breakout<br>Workshops</h5>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card stat-card" style="background-color: #94C0FA;">
                    <div class="card-body p-3 p-md-4">
                        <div class="display-4">3</div>
                        <h5>Plenary<br>Sessions</h5>
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
                
                <?php if(isset($s->department) && !empty($s->department)): ?>
                    <p class="speaker-dept"><?= htmlspecialchars($s->department) ?></p>
                <?php endif; ?>
                
                <?php if(isset($s->organization) && !empty($s->organization)): ?>
                    <p class="speaker-org mb-0"><?= htmlspecialchars($s->organization) ?></p>
                <?php endif; ?>
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
                                <i class="fas fa-tag ms-1 opacity-50 icon-default"></i>
                                <i class="fas fa-tag ms-1 opacity-50 icon-active"></i>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php foreach($workshops as $w): ?>
            <div class="col-md-6 col-lg-4 workshop-wrapper" data-tags="<?= htmlspecialchars(implode(',', $w->tag_names)) ?>">
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

                    <button type="button" class="btn-read-more mt-auto" data-bs-toggle="modal" data-bs-target="#modalWorkshop<?= $w->id ?>">Read More</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

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
                                            if($fac->image_path != 'default.png' && !empty($fac->image_path)) { 
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
                                    <?= nl2br(htmlspecialchars($w->all_facilitators[0]->bio)) ?>
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
    // PERUBAHAN: Ubah dari new Set() menjadi variable null untuk menampung 1 tag aktif saja.
    let activeTag = null; 

    tagPills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const tag = this.getAttribute('data-tag');
            
            // PERUBAHAN: Logika Toggle Single-Select
            if (activeTag === tag) {
                // Jika tag yang sama diklik lagi, matikan tag tersebut (kembali tampilkan semua)
                activeTag = null;
                this.classList.remove('active');
            } else {
                // Jika tag baru diklik, matikan semua tag lain terlebih dahulu
                tagPills.forEach(p => p.classList.remove('active'));
                
                // Lalu hidupkan tag yang baru diklik
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

            // PERUBAHAN: Cek hanya 1 tag aktif saja
            if (activeTag !== null) {
                isMatch = cardTags.includes(activeTag);
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