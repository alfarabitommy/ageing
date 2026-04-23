<style>
    .page-title {
        color: #5B62C6; /* Warna ungu kebiruan desain */
        font-weight: 800;
        font-size: 48px;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    .page-subtitle {
        color: #5B62C6;
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 40px;
        line-height: 1.4;
    }
    .info-card {
        background-color: #F8F9FA;
        border-radius: 15px;
        padding: 40px;
        margin-bottom: 30px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
    .info-section-title {
        font-weight: 700;
        font-size: 24px;
        color: #000;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .info-section-title i {
        color: #5B62C6;
        margin-right: 15px;
        font-size: 20px;
    }
    .info-text {
        font-size: 16px;
        color: #333;
        line-height: 1.6;
        margin-bottom: 25px;
    }
    .enquiries-section {
        margin-top: 60px;
    }
    .enquiries-title {
        color: #5B62C6;
        font-weight: 800;
        font-size: 42px;
        margin-bottom: 20px;
    }
    .enquiries-box {
        background-color: #F8F9FA;
        border-radius: 15px;
        padding: 30px 40px;
        max-width: 500px;
    }
    .enquiries-box p {
        font-weight: 700;
        margin-bottom: 10px;
        color: #000;
    }
    .enquiries-box a {
        color: #5B62C6;
        text-decoration: underline;
        font-weight: 500;
    }
</style>

<div class="container">
    <h1 class="page-title">Getting Here</h1>
    <h2 class="page-subtitle">NAFA Campus 1, 80 Bencoolen Street,<br>Wing B, Level 2 Seminar Room, Singapore 189655</h2>

    <div class="mb-5">
        <img src="<?= base_url('assets/public/images/map.png') ?>" alt="Map to NAFA Campus 1" class="img-fluid rounded-4 shadow-sm w-100">
    </div>

    <div class="info-card">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="info-section-title">
                    <i class="fas fa-train"></i> Train
                </div>
                <div class="info-text ms-4 ms-md-5">
                    Bencoolen MRT Station DT21 (3 mins walk)<br>
                    Rochor MRT Station DT13 (8 mins walk)<br>
                    Bras Basah MRT Station CC2 (7 mins walk)<br>
                    Dhoby Ghaut MRT Station NS24/NE6/CC1 (11 mins walk)
                </div>

                <div class="info-section-title mt-4">
                    <i class="fas fa-parking"></i> Car
                </div>
                <div class="info-text ms-4 ms-md-5 mb-0">
                    Car parks in NAFA Campus 1 and in proximity are indicated. Click <a href="#" style="color:#5B62C6; text-decoration:underline;">here</a> to view carpark rates.
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-section-title">
                    <i class="fas fa-bus"></i> Bus
                </div>
                <div class="info-text ms-4 ms-md-5 mb-0">
                    <strong>Opp NAFA Campus 3 (07517)</strong><br>
                    <span style="color:#5B62C6;">56, 131, 147, 166, 857, 980</span><br><br>
                    
                    <strong>Sunshine Plaza (07571)</strong><br>
                    <span style="color:#5B62C6;">56</span><br><br>

                    <strong>Before Bencoolen Stn Exit A (04029)</strong><br>
                    <span style="color:#5B62C6;">64, 65, 139</span>
                </div>
            </div>
        </div>
    </div>

    <div class="enquiries-section">
        <h2 class="enquiries-title">Enquiries</h2>
        <div class="enquiries-box">
            <p>For more enquiries please contact</p>
            <a href="mailto:secretariat.ageingartfully@slec.org.sg">secretariat.ageingartfully@slec.org.sg</a>
        </div>
    </div>
</div>