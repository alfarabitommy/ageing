<div class="card card-ceria bg-white" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $tag ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $tag ? 'Edit' : 'Tambah' ?> Tag
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST">
            <div class="mb-4">
                <label for="tag_name" class="form-label fw-bold small text-muted">Tag Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tag_name" name="tag_name" value="<?= $tag ? $tag->tag_name : '' ?>" required placeholder="Ex: Dementia Care">
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('admin/tags') ?>" class="btn btn-light fw-bold rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Save Data</button>
            </div>
        </form>
    </div>
</div>