<div class="card card-ceria bg-white" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $facilitator ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $facilitator ? 'Edit' : 'Add' ?> Facilitator
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?= $facilitator ? $facilitator->name : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Position/Profession <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="designation" value="<?= $facilitator ? $facilitator->designation : '' ?>" placeholder="Contoh: Art Therapist">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Organization/Affiliation <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="organization" value="<?= $facilitator ? $facilitator->organization : '' ?>" placeholder="Contoh: Art for Good">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Biography <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="bio" rows="4" required><?= $facilitator ? $facilitator->bio : '' ?></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold small text-muted">Profile Photo</label>
                    <input type="file" class="form-control" name="image_path" accept="image/*">
                    <div class="form-text small">Upload if you want to add or replace a photo (Max 2MB. Format: JPG, PNG, WEBP).</div>
                    <?php if($facilitator && $facilitator->image_path != 'default.png' && $facilitator->image_path != ''): ?>
                        <div class="mt-2">
                            <span class="small text-muted d-block mb-1">Current Photo:</span>
                            <img src="<?= base_url('uploads/facilitators/'.$facilitator->image_path) ?>" alt="Current Image" width="80" class="rounded shadow-sm">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/facilitators') ?>" class="btn btn-light fw-bold rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Save Data</button>
            </div>
        </form>
    </div>
</div>