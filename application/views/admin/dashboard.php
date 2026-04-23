<div class="row g-4">
            <div class="col-12">
                <div class="card card-ceria bg-white">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-3" style="color: var(--primary-navy);">Selamat Datang di Micro-CMS!</h2>
                        <p class="text-muted fs-5 mb-4">
                            Portal manajemen konten khusus untuk <strong>Ageing Artfully Conference 2026</strong>. 
                            Gunakan menu di sebelah kiri untuk mengatur Jadwal, Pembicara, dan detail Breakout Workshops.
                        </p>
                        <a href="<?= base_url('admin/workshops') ?>" class="btn btn-lime btn-lg px-5 shadow-sm">
                            <i class="fas fa-rocket me-2"></i> Kelola Workshops
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-calendar-check"></i></div>
                        <h5 class="fw-bold text-dark">Jadwal Acara</h5>
                        <p class="text-muted small">Atur timeline kegiatan tanggal 22 Juli 2026.</p>
                        <a href="<?= base_url('admin/schedules') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Atur Jadwal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-users-cog"></i></div>
                        <h5 class="fw-bold text-dark">Fasilitator</h5>
                        <p class="text-muted small">Kelola data master dan foto pengajar sesi breakout.</p>
                        <a href="<?= base_url('admin/facilitators') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Atur Fasilitator</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-ceria text-center h-100">
                    <div class="card-body p-4">
                        <div class="display-4 mb-3" style="color: var(--accent-lime);"><i class="fas fa-tags"></i></div>
                        <h5 class="fw-bold text-dark">Kategori Tags</h5>
                        <p class="text-muted small">Tambahkan atau edit tag klasifikasi untuk workshop.</p>
                        <a href="<?= base_url('admin/tags') ?>" class="btn btn-outline-dark btn-sm rounded-pill mt-2">Atur Tags</a>
                    </div>
                </div>
            </div>
        </div>