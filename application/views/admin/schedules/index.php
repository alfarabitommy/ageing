<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="card card-ceria bg-white">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--primary-navy);"><i class="fas fa-calendar-alt me-2"></i> Manage Event Schedule</h5>
        <a href="<?= base_url('admin/schedules/create') ?>" class="btn btn-lime btn-sm shadow-sm rounded-pill px-3">
            <i class="fas fa-plus"></i> Add Schedule
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
            <table id="schTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="15%">Date</th>
                        <th width="15%">Time</th>
                        <th>Activity</th>
                        <th>Location</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($schedules as $s): ?>
                    <tr>
                        <td class="small fw-bold"><?= date('d M Y', strtotime($s->event_date)) ?></td>
                        <td class="fw-bold text-nowrap">
                            <?= date('h:i A', strtotime($s->time_start)) ?>
                            <?= $s->time_end ? ' - ' . date('h:i A', strtotime($s->time_end)) : '' ?>
                        </td>
                        <td class="fw-bold"><?= $s->activity_title ?></td>
                        <td class="small text-muted"><i class="fas fa-map-marker-alt text-danger"></i> <?= $s->location ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/schedules/edit/'.$s->id) ?>" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/schedules/delete/'.$s->id) ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Are you sure you want to delete this schedule?')"><i class="fas fa-trash"></i></a>
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
        $('#schTable').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' },
            ordering: false // Sorting dikontrol oleh kueri SQL di model
        });
    });
</script>