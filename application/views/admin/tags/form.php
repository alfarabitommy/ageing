<div class="card card-ceria bg-white" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $tag ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $tag ? 'Edit' : 'Tambah' ?> Tag
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="tag_name" class="form-label fw-bold small text-muted">Tag Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tag_name" name="tag_name" value="<?= $tag ? htmlspecialchars($tag->tag_name) : '' ?>" required placeholder="Ex: Dementia Care">
            </div>

            <div class="mb-4">
                <label for="icon_default" class="form-label fw-bold small text-muted">Icon Default (Ungu)</label>
                <?php if($tag && !empty($tag->icon_default)): ?>
                    <div class="mb-2">
                        <img src="<?= base_url('uploads/tags/'.$tag->icon_default) ?>" style="height: 30px; background: #f4f4f4; padding: 5px; border-radius: 5px;" alt="Icon Default">
                    </div>
                <?php endif; ?>
                <input type="file" class="form-control" id="icon_default" name="icon_default" accept="image/png, image/jpeg, image/svg+xml, image/webp">
                <small class="text-muted">Akan ditampilkan saat tag normal. Biarkan kosong jika tidak ingin mengubah.</small>
            </div>

            <div class="mb-4">
                <label for="icon_active" class="form-label fw-bold small text-muted">Icon Active (Putih)</label>
                <?php if($tag && !empty($tag->icon_active)): ?>
                    <div class="mb-2">
                        <img src="<?= base_url('uploads/tags/'.$tag->icon_active) ?>" style="height: 30px; background: #5156B8; padding: 5px; border-radius: 5px;" alt="Icon Active">
                    </div>
                <?php endif; ?>
                <input type="file" class="form-control" id="icon_active" name="icon_active" accept="image/png, image/jpeg, image/svg+xml, image/webp">
                <small class="text-muted">Akan ditampilkan saat tag di-hover/di-klik. Biarkan kosong jika tidak ingin mengubah.</small>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-5">
                <a href="<?= base_url('admin/tags') ?>" class="btn btn-light fw-bold rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Save Data</button>
            </div>
        </form>
    </div>
</div>