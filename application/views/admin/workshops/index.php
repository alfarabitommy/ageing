<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-chalkboard-teacher me-2"></i> Manage Breakout Workshops</h5>
        <a href="<?= base_url('admin/workshops/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Add Workshop Session
        </a>
    </div>
    <div class="card-body p-4">
        
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table id="wsTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">Order</th>
                        <th width="5%" class="text-center">Color</th>
                        <th>Workshop Title</th>
                        <th>Venue Location</th>
                        <th>Best Suited For?</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($workshops as $w): ?>
                    <tr>
                        <td class="text-center fw-bold text-primary">#<?= $w->sort_order ?></td>
                        <td class="text-center">
                            <div style="width: 25px; height: 25px; border-radius: 50%; background-color: <?= isset($w->header_color) ? $w->header_color : '#FDBA74' ?>; margin: 0 auto; border: 1px solid #ddd;" title="<?= isset($w->header_color) ? $w->header_color : '#FDBA74' ?>"></div>
                        </td>
                        <td>
                            <div class="fw-bold"><?= $w->title ?></div>
                            <small class="text-muted">Slug: /workshop/<?= $w->slug ?></small>
                        </td>
                        <td>
                            <div class="fw-bold small"><?= $w->location_venue ?></div>
                            <small class="text-muted"><?= $w->location_room ?></small>
                        </td>
                        <td class="small"><?= substr($w->best_suited_for, 0, 50) . '...' ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/workshops/edit/'.$w->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/workshops/delete/'.$w->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Deleting this workshop will delete its tag and facilitator associations (the facilitator photo and master data will remain intact). Continue?')"><i class="fas fa-trash"></i></a>
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
        $('#wsTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' }
        });
    });
</script>