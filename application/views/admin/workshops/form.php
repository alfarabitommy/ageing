<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--multiple {
        min-height: 38px;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: var(--primary-navy);
        color: white;
        border: none;
        border-radius: 5px;
        padding: 2px 8px;
        margin-top: 6px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        margin-right: 5px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: var(--accent-lime);
        background: transparent;
    }
</style>

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);">
            <i class="fas <?= $workshop ? 'fa-edit' : 'fa-plus' ?> me-2"></i> <?= $workshop ? 'Edit' : 'Add' ?> Workshop
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Workshop Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="<?= $workshop ? $workshop->title : '' ?>" required placeholder="Ex: Art Therapy for Dementia Care">
                    <div class="form-text small">URLs automatically adjust the title (SEO-friendly).</div>
                </div>
                
                <div class="col-md-8 mb-3">
                    <label class="form-label fw-bold small text-muted">Sub-title (Optional)</label>
                    <input type="text" class="form-control" name="subtitle" value="<?= $workshop ? $workshop->subtitle : '' ?>" placeholder="Ex: Supporting Identity, Memory and Well-being...">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold small text-muted">Sort Order <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="sort_order" value="<?= $workshop ? $workshop->sort_order : '0' ?>" required placeholder="Ex: 1">
                    <div class="form-text small">Angka urutan tampil (1, 2, 3...)</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Venue Location <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="location_venue" value="<?= $workshop ? $workshop->location_venue : '' ?>" required placeholder="Ex: NAFA Campus 1 - Tower Block">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold small text-muted">Room Location <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="location_room" value="<?= $workshop ? $workshop->location_room : '' ?>" required placeholder="Ex: Classroom | TB6-15">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Best Suited For <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="best_suited_for" value="<?= $workshop ? $workshop->best_suited_for : '' ?>" required placeholder="Ex: Caregivers seeking reflection and self-care tools">
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold small text-muted">Choose Categories (Tags) <span class="text-danger">*</span></label>
                    <select name="tags[]" class="form-control select2" multiple="multiple" required data-placeholder="Select one or more categories...">
                        <?php foreach($all_tags as $t): ?>
                            <option value="<?= $t->id ?>" <?= in_array($t->id, $selected_tags) ? 'selected' : '' ?>>
                                <?= $t->tag_name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold small text-muted">Choose Facilitator <span class="text-danger">*</span></label>
                    <select name="facilitators[]" class="form-control select2" multiple="multiple" required data-placeholder="Select one or more facilitators...">
                        <?php foreach($all_facilitators as $f): ?>
                            <option value="<?= $f->id ?>" <?= in_array($f->id, $selected_facilitators) ? 'selected' : '' ?>>
                                <?= $f->name ?> (<?= $f->organization ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold small text-muted">Synopsis Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="synopsis" rows="5" required><?= $workshop ? $workshop->synopsis : '' ?></textarea>
                </div>
            </div>
            
            <hr class="text-muted">
            
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('admin/workshops') ?>" class="btn btn-light fw-bold rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-lime fw-bold rounded-pill px-4">Save Data</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            allowClear: true
        });
    });
</script>