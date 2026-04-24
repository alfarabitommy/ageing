<style>
    /* =========================================
       SPESIFIK STYLES UNTUK HALAMAN SCHEDULE
       ========================================= */
    .schedule-header {
        margin: 60px 0 50px 0;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .schedule-title {
        color: #383CA3; 
        font-weight: 800;
        font-size: 42px;
        margin: 0;
        letter-spacing: -0.5px;
    }
    .schedule-date {
        color: #5B62C6; 
        font-weight: 500;
        font-size: 24px;
        margin: 0;
    }

    /* Animasi Masuk (Slide Up Fade) untuk menghilangkan kesan kaku */
    @keyframes slideUpFade {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .event-card {
        border-radius: 20px;
        padding: 35px 40px;
        margin-bottom: 25px;
        color: white;
        display: flex;
        flex-direction: row; /* DIUBAH: Menjadi horizontal (kiri-kanan) */
        justify-content: space-between; /* DIUBAH: Dorong info ke kiri, jam ke kanan */
        align-items: center; /* DIUBAH: Rata tengah secara vertikal */
        gap: 15px; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        
        /* Setup Animasi */
        opacity: 0;
        animation: slideUpFade 0.6s ease forwards;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    /* Palet Warna Sesuai Desain */
    .bg-dark-purple { background-color: #51529F; }
    .bg-light-purple { background-color: #A0A5EE; }
    .bg-mid-purple   { background-color: #6A6EC7; }
    
    .event-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .event-title {
        font-weight: 800;
        font-size: 32px;
        margin: 0;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .event-location {
        font-size: 16px;
        font-weight: 500;
        opacity: 0.95;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Mengakali icon O agar persis seperti di gambar */
    .event-location i {
        font-size: 14px;
        color: white;
    }

    .event-time {
        font-weight: 800;
        font-size: 32px;
        letter-spacing: -0.5px;
        text-align: right;
        flex-shrink: 0; /* Mencegah teks waktu menyusut/terlipat ke bawah jika judul terlalu panjang */
    }

    /* =========================================
       RESPONSIVE MOBILE ADJUSTMENTS
       ========================================= */
    @media (max-width: 768px) {
        .schedule-header {
            margin: 40px 0 30px 0;
        }
        .schedule-title { 
            font-size: 36px; 
        }
        .schedule-date { 
            font-size: 20px; 
        }
        .event-card {
            padding: 25px 25px 30px 25px;
            border-radius: 16px;
            gap: 12px;
            flex-direction: column; /* DIUBAH: Kembali tumpuk vertikal khusus di HP */
            align-items: flex-start; /* DIUBAH: Rata kiri */
        }
        .event-title {
            font-size: 26px; 
        }
        .event-location {
            font-size: 14px; 
            gap: 8px;
        }
        .event-time {
            font-size: 28px; 
            margin-top: 10px; /* DIUBAH: Beri jarak atas agar tidak menempel dengan lokasi di versi HP */
            text-align: left;
        }
    }
</style>

<div class="container pb-5">
    <div class="schedule-header" style="margin-bottom: 20px;">
        <h1 class="schedule-title">Event Schedule</h1>
    </div>

    <div class="schedule-list">
        <?php 
        // Array untuk warna background selang-seling agar tidak monoton
        $bg_colors = ['bg-dark-purple', 'bg-light-purple', 'bg-mid-purple'];
        $color_index = 0;
        $delay = 0; // Inisialisasi delay animasi
        $current_date = ''; // Logika pembatas grup tanggal

        foreach($schedules as $s): 
            
            // Cek jika tanggal berbeda, buat sub-header tanggal baru
            if ($current_date !== $s->event_date):
                $current_date = $s->event_date;
                $delay = 0; // Reset delay animasi per hari
        ?>
                <div class="schedule-header" style="margin-top: 30px; margin-bottom: 30px;">
                    <h2 class="schedule-date"><?= date('l, d F Y', strtotime($s->event_date)) ?></h2>
                </div>
        <?php
            endif;

            $current_bg = $bg_colors[$color_index % count($bg_colors)];
            $color_index++;
            
            // Format Waktu
            $start = date('g:i A', strtotime($s->time_start));
            $time_display = $start;
            if(!empty($s->time_end)) {
                $end = date('g:i A', strtotime($s->time_end));
                // Menggunakan en dash (–) untuk rentang waktu yang rapi
                $time_display = $start . ' &ndash; ' . $end;
            }
        ?>
        
        <div class="event-card <?= $current_bg ?>" style="animation-delay: <?= $delay ?>s;">
            <div class="event-info">
                <h3 class="event-title"><?= htmlspecialchars($s->activity_title) ?></h3>
                <div class="event-location">
                    <i class="far fa-circle"></i> <?= htmlspecialchars($s->location) ?>
                </div>
            </div>
            <div class="event-time">
                <?= $time_display ?>
            </div>
        </div>

        <?php 
            $delay += 0.15; // Menambah delay 0.15 detik untuk setiap card berikutnya
        endforeach; 
        ?>
    </div>
</div>