<div class="row g-4">
            <div class="col-12">
                <div class="card card-ceria bg-white">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-3" style="color: var(--primary-navy);">Welcome to Micro-CMS!!</h2>
                        <p class="text-muted fs-5 mb-4">
                            Dedicated content management portal for <strong>Ageing Artfully Conference 2026</strong>. 
                            Use the left menu to manage Schedules, Speakers, and Breakout Workshops details.
                        </p>
                        <a href="<?= base_url('admin/workshops') ?>" class="btn btn-lime btn-lg px-5 shadow-sm">
                            <i class="fas fa-rocket me-2"></i> Manage Workshops
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-calendar-check"></i></div>
                        <h5 class="fw-bold text-dark">Event Schedule</h5>
                        <p class="text-muted small">Manage the activity timeline for July 22, 2026.</p>
                        <a href="<?= base_url('admin/schedules') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Manage Schedule</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-users-cog"></i></div>
                        <h5 class="fw-bold text-dark">Facilitator</h5>
                        <p class="text-muted small">Manage the master data and photos of breakout session instructors.</p>
                        <a href="<?= base_url('admin/facilitators') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Atur Fasilitator</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-tags"></i></div>
                        <h5 class="fw-bold text-dark">Categories Tags</h5>
                        <p class="text-muted small">Add or edit classification tags for the workshop.</p>
                        <a href="<?= base_url('admin/tags') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Atur Tags</a>
                    </div>
                </div>
            </div>
        </div>