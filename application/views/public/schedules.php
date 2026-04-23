<style>
    /* Spesifik Styles untuk Halaman Schedule */
    .schedule-header {
        margin: 50px 0 40px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        flex-wrap: wrap;
    }
    .schedule-title {
        color: #383CA3; /* Warna navy sesuai desain */
        font-weight: 700;
        font-size: 42px;
        margin: 0;
    }
    .schedule-date {
        color: #5B62C6; /* Ungu kebiruan */
        font-weight: 500;
        font-size: 32px;
        margin: 0;
    }
    .event-card {
        border-radius: 15px;
        padding: 30px 40px;
        margin-bottom: 20px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    /* Warna selang-seling untuk Card seperti di desain */
    .bg-dark-purple { background-color: #4F4B9E; }
    .bg-light-purple { background-color: #9BA4F6; }
    .bg-mid-purple   { background-color: #8491F0; }
    
    .event-info h3 {
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 5px;
    }
    .event-location {
        font-size: 16px;
        opacity: 0.9;
        display: flex;
        align-items: center;
    }
    .event-location i {
        margin-right: 8px;
        font-size: 14px;
    }
    .event-time {
        font-weight: 700;
        font-size: 28px;
    }

    @media (max-width: 768px) {
        .event-card {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
        }
        .event-time {
            margin-top: 15px;
        }
        .schedule-title { font-size: 32px; }
        .schedule-date { font-size: 24px; margin-top: 10px; }
    }
</style>

<div class="container">
    <div class="schedule-header">
        <h1 class="schedule-title">Event Schedule</h1>
        <h2 class="schedule-date">Wednesday, 22 July 2026</h2>
    </div>

    <div class="schedule-list">
        <?php 
        // Array untuk warna background selang-seling
        $bg_colors = ['bg-dark-purple', 'bg-light-purple', 'bg-mid-purple'];
        $color_index = 0;

        foreach($schedules as $s): 
            $current_bg = $bg_colors[$color_index % count($bg_colors)];
            $color_index++;
            
            // Format Waktu
            $start = date('g:i A', strtotime($s->time_start));
            $time_display = $start;
            if(!empty($s->time_end)) {
                $end = date('g:i A', strtotime($s->time_end));
                $time_display = $start . ' &ndash; ' . $end;
            }
        ?>
        
        <div class="event-card <?= $current_bg ?>">
            <div class="event-info">
                <h3><?= htmlspecialchars($s->activity_title) ?></h3>
                <div class="event-location">
                    <i class="far fa-circle"></i> <?= htmlspecialchars($s->location) ?>
                </div>
            </div>
            <div class="event-time">
                <?= $time_display ?>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>