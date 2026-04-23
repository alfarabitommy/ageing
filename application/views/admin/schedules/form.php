<div class="card card-ceria bg-white" style="max-width: 700px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $schedule ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $schedule ? 'Edit' : 'Tambah' ?> Jadwal
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Waktu Mulai <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" name="time_start" value="<?= $schedule ? $schedule->time_start : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Waktu Selesai</label>
                    <input type="time" class="form-control" name="time_end" value="<?= $schedule ? $schedule->time_end : '' ?>">
                    <div class="form-text small">Kosongkan jika acara tidak memiliki rentang waktu spesifik.</div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Judul Aktivitas <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="activity_title" value="<?= $schedule ? $schedule->activity_title : '' ?>" placeholder="Contoh: Plenary Panel Discussion" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="location" value="<?= $schedule ? $schedule->location : '' ?>" placeholder="Contoh: NAFA Campus 1, Wing B, 2nd Floor" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Urutan (Opsional)</label>
                    <input type="number" class="form-control" name="sort_order" value="<?= $schedule ? $schedule->sort_order : '0' ?>">
                    <div class="form-text small">Digunakan hanya jika ada dua acara di waktu mulai yang persis sama.</div>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/schedules') ?>" class="btn btn-light fw-bold rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>