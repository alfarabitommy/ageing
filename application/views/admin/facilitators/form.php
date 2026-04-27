<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--multiple { min-height: 38px; border: 1px solid #ced4da; border-radius: 0.375rem; }
    .select2-container--default .select2-selection--multiple .select2-selection__choice { background-color: var(--primary-navy); color: white; border: none; border-radius: 5px; padding: 2px 8px; margin-top: 6px; }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove { color: white; margin-right: 5px; }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover { color: var(--accent-lime); background: transparent; }
</style>

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
                
                <?php 
                $is_team = ($facilitator && isset($facilitator->is_team)) ? $facilitator->is_team : 0;
                $selected_members = ($facilitator && isset($facilitator->team_members) && $facilitator->team_members) ? explode(',', $facilitator->team_members) : [];
                ?>
                <div class="col-md-12 mb-3">
                    <div class="form-check form-switch p-3 bg-light rounded border">
                        <input class="form-check-input ms-0 me-3" type="checkbox" id="isTeamSwitch" name="is_team" value="1" <?= $is_team ? 'checked' : '' ?> style="width: 40px; height: 20px; cursor: pointer;">
                        <label class="form-check-label fw-bold" for="isTeamSwitch" style="padding-top: 2px; cursor: pointer;">Is this a Team/Group?</label>
                    </div>
                </div>

                <div class="col-md-12 mb-3" id="teamMembersContainer" style="<?= $is_team ? '' : 'display:none;' ?>">
                    <label class="form-label fw-bold small text-muted">Select Team Members</label>
                    <select name="team_members[]" class="form-control select2-team" multiple="multiple" data-placeholder="Choose individual facilitators...">
                        <?php 
                        // PERUBAHAN UTAMA: Render yang sudah terpilih lebih dulu agar urutannya terjaga di UI saat Edit
                        if(!empty($selected_members)):
                            foreach($selected_members as $sm_id):
                                foreach($all_facilitators as $af):
                                    if($af->id == trim($sm_id)):
                        ?>
                                    <option value="<?= $af->id ?>" selected><?= $af->name ?></option>
                        <?php 
                                    endif;
                                endforeach;
                            endforeach;
                        endif;

                        // Kemudian render sisa fasilitator yang belum dipilih
                        foreach($all_facilitators as $af): 
                            if(!in_array($af->id, $selected_members)):
                                if(!$facilitator || $af->id != $facilitator->id): 
                        ?>
                                    <option value="<?= $af->id ?>"><?= $af->name ?></option>
                        <?php 
                                endif;
                            endif;
                        endforeach; 
                        ?>
                    </select>
                    <div class="form-text small text-primary"><i class="fas fa-info-circle"></i> Click order determines the display order in the workshop pop-up.</div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold small text-muted">Biography <span class="text-danger">*</span></label>
                    <span class="small text-muted d-block mb-1">(Note: For Team, this bio will be shown at the bottom of the member list)</span>
                    <textarea class="form-control" name="bio" rows="4" required><?= $facilitator ? $facilitator->bio : '' ?></textarea>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold small text-muted">Primary Profile Photo (For List)</label>
                    <input type="file" class="form-control" name="image_path" accept="image/*">
                    <div class="form-text small">Upload for list view (Max 2MB).</div>
                    <?php if($facilitator && $facilitator->image_path != 'default.png' && $facilitator->image_path != ''): ?>
                        <div class="mt-2">
                            <span class="small text-muted d-block mb-1">Current Primary Photo:</span>
                            <img src="<?= base_url('uploads/facilitators/'.$facilitator->image_path) ?>" alt="Current Image" width="80" class="rounded shadow-sm">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold small text-muted">Pop-up Profile Photo (Optional)</label>
                    <input type="file" class="form-control" name="image_path_popup" accept="image/*">
                    <div class="form-text small">Used if the member list is not applicable.</div>
                    <?php if($facilitator && isset($facilitator->image_path_popup) && $facilitator->image_path_popup != 'default.png' && $facilitator->image_path_popup != ''): ?>
                        <div class="mt-2">
                            <span class="small text-muted d-block mb-1">Current Pop-up Photo:</span>
                            <img src="<?= base_url('uploads/facilitators/'.$facilitator->image_path_popup) ?>" alt="Current Popup Image" width="80" class="rounded shadow-sm">
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

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2-team').select2({ width: '100%', allowClear: true });
        
        // MODIFIKASI JS: Memaksa urutan penyimpanan sesuai urutan klik user
        $("select[name='team_members[]']").on("select2:select", function (evt) {
            var element = evt.params.data.element;
            var $element = $(element);
            
            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });

        $('#isTeamSwitch').change(function() {
            if($(this).is(':checked')) {
                $('#teamMembersContainer').slideDown();
            } else {
                $('#teamMembersContainer').slideUp();
                $('.select2-team').val(null).trigger('change'); 
            }
        });
    });
</script>