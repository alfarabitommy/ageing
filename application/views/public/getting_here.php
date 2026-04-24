<style>
    /* =========================================
       PAGE HEADER & TYPOGRAPHY
       ========================================= */
    .page-header {
        margin: 60px 0 40px;
    }
    .page-title {
        color: #5B62C6; /* Warna ungu kebiruan desain */
        font-weight: 800;
        font-size: 48px;
        letter-spacing: -0.5px;
        margin-bottom: 15px;
    }
    .page-subtitle {
        color: #5B62C6;
        font-weight: 600; /* Disesuaikan agar tidak terlalu tebal menyaingi judul */
        font-size: 24px;
        line-height: 1.5;
        margin-bottom: 0;
    }

    /* Animasi Masuk Konsisten */
    @keyframes slideUpFade {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        opacity: 0;
        animation: slideUpFade 0.6s ease forwards;
    }

    /* =========================================
       KARTU INFORMASI INDIVIDU (ABU-ABU TIPIS)
       ========================================= */
    .transport-card {
        background-color: #F8F9FA; /* Abu-abu tipis/muda */
        border-radius: 20px;
        padding: 35px;
        height: 100%;
        border: 1px solid rgba(0,0,0,0.02);
        box-shadow: 0 8px 25px rgba(0,0,0,0.03); /* Bayangan sangat halus */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        
        /* Setup Animasi */
        opacity: 0;
        animation: slideUpFade 0.6s ease forwards;
    }
    
    .transport-card:hover {
        transform: translateY(-5px); /* Efek melayang saat kursor di atasnya */
        box-shadow: 0 12px 35px rgba(0,0,0,0.06);
    }

    /* Header di dalam Kartu */
    .card-header-custom {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .card-icon {
        background-color: #EEF0FF; /* Latar belakang icon agar menonjol */
        color: #5B62C6;
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-right: 15px;
    }
    .card-title-text {
        font-weight: 800;
        font-size: 24px;
        color: #111;
        margin: 0;
    }

    /* Konten Teks di dalam Kartu */
    .info-list { 
        list-style: none; 
        padding: 0; 
        margin: 0; 
    }
    .info-list li { 
        margin-bottom: 12px; 
        color: #444; 
        font-size: 16px; 
        line-height: 1.6; 
    }
    .info-list li:last-child { margin-bottom: 0; }

    /* Khusus Teks Bus */
    .bus-route { margin-bottom: 20px; }
    .bus-route:last-child { margin-bottom: 0; }
    .bus-stop-name { 
        font-weight: 700; 
        color: #111; 
        display: block; 
        margin-bottom: 5px; 
    }
    .bus-numbers { 
        color: #5B62C6; 
        font-weight: 600; 
    }

    /* Link Kustom */
    .link-custom { 
        color: #5B62C6; 
        text-decoration: underline; 
        font-weight: 600; 
        transition: color 0.3s; 
    }
    .link-custom:hover { color: #383CA3; }

    /* =========================================
       SECTION ENQUIRIES (DIJADIKAN KARTU JUGA)
       ========================================= */
    .enquiries-section { margin-top: 50px; }
    .enquiries-title { 
        color: #5B62C6; 
        font-weight: 800; 
        font-size: 36px; 
        margin-bottom: 25px; 
    }

    /* =========================================
       RESPONSIVE MOBILE ADJUSTMENTS
       ========================================= */
    @media (max-width: 768px) {
        .page-header { margin: 40px 0 30px; }
        .page-title { font-size: 36px; }
        .page-subtitle { font-size: 18px; } /* Mengecilkan teks lokasi agar proporsional */
        
        .transport-card { 
            padding: 25px; /* Mengurangi padding di mobile */
            border-radius: 16px; 
        }
        .card-title-text { font-size: 22px; }
        .card-icon { 
            width: 40px; 
            height: 40px; 
            font-size: 18px; 
        }
        .enquiries-title { font-size: 30px; }
    }
</style>

<div class="container pb-5">
    <div class="page-header">
        <h1 class="page-title">Getting Here</h1>
        <h2 class="page-subtitle">NAFA Campus 1, 80 Bencoolen Street,<br>Wing B, Level 2 Seminar Room, Singapore 189655</h2>
    </div>

    <div class="map-container mb-5">
        <img src="<?= base_url('assets/public/images/map.png') ?>" alt="Map to NAFA Campus 1" class="img-fluid w-100">
    </div>

    <div class="row g-4">
        
        <div class="col-lg-4 col-md-6">
            <div class="transport-card" style="animation-delay: 0.1s;">
                <div class="card-header-custom">
                    <div class="card-icon"><i class="fas fa-train"></i></div>
                    <h3 class="card-title-text">Train</h3>
                </div>
                <ul class="info-list">
                    <li>Bencoolen MRT Station DT21 (3 mins walk)</li>
                    <li>Rochor MRT Station DT13 (8 mins walk)</li>
                    <li>Bras Basah MRT Station CC2 (7 mins walk)</li>
                    <li>Dhoby Ghaut MRT Station NS24/NE6/CC1 (11 mins walk)</li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="transport-card" style="animation-delay: 0.2s;">
                <div class="card-header-custom">
                    <div class="card-icon"><i class="fas fa-bus"></i></div>
                    <h3 class="card-title-text">Bus</h3>
                </div>
                <div class="bus-route">
                    <span class="bus-stop-name">Opp NAFA Campus 3 (07517)</span>
                    <span class="bus-numbers">56, 131, 147, 166, 857, 980</span>
                </div>
                <div class="bus-route">
                    <span class="bus-stop-name">Sunshine Plaza (07571)</span>
                    <span class="bus-numbers">56</span>
                </div>
                <div class="bus-route">
                    <span class="bus-stop-name">Before Bencoolen Stn Exit A (04029)</span>
                    <span class="bus-numbers">64, 65, 139</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="transport-card" style="animation-delay: 0.3s;">
                <div class="card-header-custom">
                    <div class="card-icon"><i class="fas fa-parking"></i></div>
                    <h3 class="card-title-text">Car</h3>
                </div>
                <p class="mb-0" style="color: #444; font-size: 16px; line-height: 1.6;">
                    Car parks in NAFA Campus 1 and in proximity are indicated. Click <a href="#" class="link-custom">here</a> to view carpark rates.
                </p>
            </div>
        </div>

    </div>

    <div class="enquiries-section">
        <h2 class="enquiries-title">Enquiries</h2>
        <div class="transport-card" style="max-width: 100%; animation-delay: 0.4s; padding: 30px 35px;">
            <div class="row align-items-center">
                <div class="col-md-auto mb-3 mb-md-0 text-center text-md-start">
                    <div class="card-icon mx-auto mx-md-0" style="width: 60px; height: 60px; font-size: 24px;">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                </div>
                <div class="col-md text-center text-md-start">
                    <p style="font-weight: 700; color: #111; font-size: 18px; margin-bottom: 5px;">For more enquiries please contact</p>
                    <a href="mailto:secretariat.ageingartfully@slec.org.sg" class="link-custom" style="font-size: 16px;">secretariat.ageingartfully@slec.org.sg</a>
                </div>
            </div>
        </div>
    </div>
</div>