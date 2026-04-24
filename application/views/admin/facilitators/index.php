<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-users-cog me-2"></i> Manage Facilitator</h5>
        <a href="<?= base_url('admin/facilitators/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Add Fasilitator
        </a>
    </div>
    <div class="card-body p-4">
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table id="facTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">Photo</th>
                        <th>Name & Profile</th>
                        <th>Organization</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($facilitators as $f): ?>
                    <tr>
                        <td>
                            <?php $img_src = ($f->image_path != 'default.png' && $f->image_path != '') ? base_url('uploads/facilitators/'.$f->image_path) : 'https://ui-avatars.com/api/?name='.urlencode($f->name).'&background=random'; ?>
                            <img src="<?= $img_src ?>" alt="Foto" class="rounded-circle object-fit-cover" width="45" height="45">
                        </td>
                        <td>
                            <div class="fw-bold"><?= $f->name ?></div>
                            <div class="small text-muted"><?= $f->designation ?></div>
                        </td>
                        <td><span class="badge bg-secondary"><?= $f->organization ?></span></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/facilitators/edit/'.$f->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/facilitators/delete/'.$f->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Are you sure you want to delete the facilitators information and photo?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#facTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' }
        });
    });
</script>