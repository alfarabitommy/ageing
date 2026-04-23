<div class="card card-ceria bg-white" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $speaker ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $speaker ? 'Edit' : 'Tambah' ?> Pembicara
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?= $speaker ? $speaker->name : '' ?>" required placeholder="Contoh: A/Prof (Dr) Carol Ma">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Gelar/Jabatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="designation" value="<?= $speaker ? $speaker->designation : '' ?>" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Ringkasan Biografi</label>
                    <textarea class="form-control" name="bio_summary" rows="3"><?= $speaker ? $speaker->bio_summary : '' ?></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold small text-muted">Foto Profil</label>
                    <input type="file" class="form-control" name="image_path" accept="image/*">
                    <div class="form-text small">Maks 2MB. Format: JPG, PNG, WEBP.</div>
                    <?php if($speaker && $speaker->image_path != 'default.png' && $speaker->image_path != ''): ?>
                        <div class="mt-2">
                            <span class="small text-muted d-block mb-1">Foto Saat Ini:</span>
                            <img src="<?= base_url('uploads/speakers/'.$speaker->image_path) ?>" alt="Current Image" width="80" class="rounded shadow-sm">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/speakers') ?>" class="btn btn-light fw-bold rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Simpan Data</button>
            </div>
        </form>
    </div>
</div>