<style>
    /* Global Section Spacing */
    section { padding: 80px 0; }
    .section-title { color: #fff; font-size: 42px; font-weight: 800; margin-bottom: 30px; letter-spacing: -0.5px; }
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
        background-color: #ffff;
        border-radius: 30px;
        position: relative;
        box-shadow: 0 5px 10px rgba(81, 86, 184, 0.2);
        overflow: hidden;
        margin-top: 5%;
       
    }
    .vision-overlay-box h3 { font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #92B9FA; } /* Light blue text */
    .vision-overlay-box p { font-size: 24px; font-weight: 500; line-height: 1.5; margin-bottom: 20px; }
    .icon-pen { position: absolute; right: -5%; top: -10%; max-width: 350px; opacity: 0.9; pointer-events: none; }

    /* 3. Conference Objectives (White Theme) */
    .objectives-section { background-color: #998CFF; padding-top: 120px; /* Ekstra padding atas karena ada overlay box */ }
    .obj-card-1 {
        background: #f6e498; 
        border: 0px solid #5156B8; 
        border-radius: 25px; 
        padding: 40px 20px; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease;
    }

    .obj-card-2 {
        background: #ffc1f1; 
        border: 0px solid #5156B8; 
        border-radius: 25px; 
        padding: 40px 20px; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease;
    }

    .obj-card-3 {
        background: #94c0fa; 
        border: 0px solid #5156B8; 
        border-radius: 25px; 
        padding: 40px 20px; 
        height: 100%; 
        text-align: center;
        color: #5156B8;
        transition: transform 0.3s ease;
    }

    .obj-card-4{
        background: #ffc184; 
        border: 0px solid #5156B8; 
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


    /* star slider background biru */
    .programme-hero {
        background-color: #5156B8; /* Navy Blue */
        color: white;
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }
    /* slider backgroud end */


    /* star slide */

    .slider-thumb {
    position: absolute;
    bottom: 0;
    right: -10%;
    z-index: 3;
    padding-bottom: 10%;
}
    /* star slide */

    /* star slide */

    .slider-icon {
    position: absolute;
    bottom: -120%;
    left: -10%;
    z-index: 3;
    width: 20%;
    
    /* padding-bottom: 50%; */
}
    /* end slide */

  /* berita */

  /* Reset CSS Dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #f4f7f6;
    color: #333;
    line-height: 1.6;
}

/* Container untuk membatasi lebar konten */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 0;
}

.section-title {
    text-align: center;
    margin-bottom: 40px;
    font-size: 2.5rem;
    color: #2c3e50;
}

/* Flexbox untuk 2 Kolom */
.news-grid {
    display: flex;
    gap: 30px; /* Jarak antar kolom */
    flex-wrap: wrap; /* Agar responsif ke bawah jika layar kecil */
}

.news-item {
    background: #fff;
    flex: 1; /* Membuat kolom sama rata */
    min-width: 300px; /* Lebar minimum sebelum turun ke bawah */
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.news-item:hover {
    transform: translateY(-5px); /* Efek angkat saat hover */
}

.news-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.news-content {
    padding: 20px;
}

.date {
    font-size: 0.85rem;
    color: #888;
}

.news-content h3 {
    margin: 10px 0;
    color: #2c3e50;
}

.news-content p {
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 20px;
}

.read-more {
    text-decoration: none;
    color: #3498db;
    font-weight: bold;
    font-size: 0.9rem;
}

.read-more:hover {
    color: #2c3e50;
}

/* Media Query untuk Mobile (Layar Kecil) */
@media (max-width: 768px) {
    .news-grid {
        flex-direction: column; /* Mengubah kolom menjadi baris */
    }
}

  */  
   
    


    


</style>


<section class="programme-hero">
    <!-- <img src=('assets/public/images/bg-shape-1.png') alt="" class="shape-1"> -->
    <div class="slider-thumb">
        <img src="assets/public/images/bg-shape-1.png">
    </div>

    <div class="container">
        <p class="small fw-bold mb-3">> SLEC x NAFA Ageing Artfully Conference 2026</p>
        <h1 class="display-3 fw-bold mb-4">Reimagining Ageing</br>
        through the Power of</br>
        the Arts Together

    </h1>
        <p class="lead mb-5" style="max-width: 600px;">
             St Luke's ElderCare (SLEC) and Nanyang Academy of FIne Arts</br>
             (NAFA),University of the Arts Singapore (UAS) have been</br>
             collaborating to bring together arts education and community care</br>
             to promote innovative approaches in enaging seniors and</br>
             supporting their well-being
        </p>
    </div>
</section>


<!--image slide start-->

<div class="container vision-container">
    <div class="vision-overlay-box">
        <div class="row">
              <img src="assets/public/images/Rectangle 11.png">
        </div>
    </div>
</div>
<!--image slide end-->



<section class="position-relative bg-white pb-5">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6 ps-lg-5 order-1 order-lg-2 position-relative" style="z-index: 2;">
                <p class="profile-text">The two Organisastions formalised their partnership with the.
                </br>signing of Memorandum of Understanding in August 2025,
                </br> and the Ageing Artfully Conference is one of the
                </br> partnership highlights.
                </p>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 order-2 order-lg-1"></div>
            <!-- <div class="slider-icon">
                <img src="assets/public/images/bg-shape-1.png">
            </div> -->
        </div>
    </div>
</section>


<section class="objectives-section">
    <div class="container">
        <h2 class="section-title text-right mb-5">Conference Objectives</h2>
        <P style="color: white; font-size: 32px; font-style:DM Sans;">Through interdisciplinary dialogue among artists, academics, 
          </br>eldercare professionals,community partners,and older adults themselves,</br>
            the conference aims to:
       </p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-1">
                    <i class="fas fa-sync-alt"></i>
                    <h4>Shift the narrative</h4>
                    <p>from arts as therapy to arts<br>as living practice</P>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-2">
                    <i class="fas fa-sync-alt"></i>
                    <h4>Deepen dignity</h4>
                    <p>and agency-centerd</br>approaches in ageing</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-3">
                    <i class="fas fa-seedling"></i>
                    <h4>Inspire sustainable</h4>
                    <p>community-integrated</br>creative ecosystem</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="obj-card-4">
                    <i class="fas fa-level-up-alt"></i>
                    <h4>Elevate older adults</h4>
                    <p>as active contributors</br>to cultural life</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!--blog section start-->
     <section class="news-section">
        <div class="container">
            <div class="news-grid">
                <!-- Kolom 1 -->
                <div class="news-item">
                    <img src="assets/public/images/about-slec.png">
                    <div class="news-content">
                        <h3>About St Luke's ElderCare</h3>
                        <p>SLEC was established 19XX and together thet</br>
                        revolutionized care industry in Singapore</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>

                <!-- Kolom 2 -->
                <div class="news-item">
                    <img src="assets/public/images/about-nafa.png">
                    <div class="news-content">
                        <h3>About Nanyang Academy</h3>
                        <p>NAFA is Singapore pioner arts institutions and</br>
                        a founding member of the University of the Arts Singapore(UAS)
                       </p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog section end-->