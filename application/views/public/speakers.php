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
        border-radius: 15px; 
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
        font-weight: 400;
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
        scroll-margin-top: 80px; 
    }
    .shape-2 {
        position: absolute;
        top: -100px;
        right: 0;
        max-width: 500px;
        z-index: -1;
    }
    
    /* MODIFIKASI LAYOUT CONTAINER TAGS (FIX STRETCHING & ROW WRAPPING) */
    .tags-grid-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .tags-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    /* MODIFIKASI FILTER TAGS */
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
    
    /* ATURAN DUAL ICON CSS PADA TAG PILL */
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
    
    /* TRIGGER CSS KETIKA HOVER ATAU ACTIVE (Klik) */
    .tag-pill:hover .icon-default, .tag-pill.active .icon-default { 
        display: none; 
    }
    .tag-pill:hover .icon-active, .tag-pill.active .icon-active { 
        display: inline-block; 
    }
    
    /* PENAMBAHAN CSS ANIMASI JS */
    .workshop-wrapper { 
        transition: opacity 0.4s ease, transform 0.4s ease; 
        opacity: 1; 
        transform: scale(1); 
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
       MODAL WORKSHOP DETAIL (RESTORED FULL LINES)
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
    .modal-workshop-detail .ws-heading i { 
        color: #5156B8; 
        font-size: 20px; 
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
        margin-bottom: 20px; 
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
       RESPONSIVE MOBILE ADJUSTMENTS (NEW)
       ========================================= */
    @media (max-width: 768px) {
        .shape-1 { 
            max-width: 150px; 
            opacity: 0.4; 
        }
        .shape-2 { 
            max-width: 120px; 
            opacity: 0.4; 
        }
        .programme-hero { 
            padding: 40px 0 60px; 
        }
        .programme-hero .display-3 { 
            font-size: 2.2rem; 
        }
        .section-title { 
            font-size: 30px; 
        }
        .workshops-section {
            padding: 40px 0;
        }
        .modal-workshop-detail .modal-header-custom { 
            padding: 25px 20px; 
        }
        .modal-workshop-detail .ws-title { 
            font-size: 26px; 
        }
        .modal-workshop-detail .info-card { 
            padding: 25px 20px; 
        }
        .modal-workshop-detail .fac-header-row { 
            flex-direction: column; 
            text-align: center; 
        }
        .modal-workshop-detail .fac-img { 
            margin: 0 auto; 
        }
        .speaker-card {
            margin: 0 auto; 
            width: 90%; 
        }
        .workshop-card {
            width: 85%; 
        }
        .tags-grid-container {
            gap: 8px; 
        }
        .tags-row {
            gap: 8px;
        }
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

        <div class="tags-grid-container mb-5">
            <?php 
            // IMPLEMENTASI ARRAY_CHUNK UNTUK MAKSIMAL 6 ITEM PER BARIS
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
// Memanggil model secara dinamis di dalam view 
$CI =& get_instance();
$CI->load->model('Tag_model');
$CI->load->model('Workshop_model');

// Array palet warna pastel
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