<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Micro-CMS | Ageing Artfully 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; height: 100vh; }
        .login-card { max-width: 400px; width: 100%; margin: auto; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); background: #fff; }
        .brand-logo { text-align: center; margin-bottom: 1.5rem; }
        .brand-logo h4 { font-weight: bold; color: #333; }
    </style>
</head>
<body>

<div class="container">
    <div class="login-card">
        <div class="brand-logo">
            <h4>Micro-CMS</h4>
            <p class="text-muted small">Ageing Artfully Conference 2026</p>
        </div>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-center small" role="alert">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/process_login'); ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label small fw-bold">Username</label>
                <input type="text" class="form-control" id="username" name="username" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label small fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100 fw-bold">Login to CMS</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>