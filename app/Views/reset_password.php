<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | <?= NAMA_INSTANSI ?></title>

    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("sweetalert/sweetalert2.min.css") ?>">

    <script src="<?= base_url("bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("sweetalert/sweetalert2.all.min.js") ?>"></script>
    <script src="<?= base_url("scripts/toggle_password.js") ?>"></script>
</head>
<body>
    <?php
        if(isset($_SESSION['error'])) : ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "<?= $_SESSION['error'] ?>"
            })
        </script>
    <?php endif; ?>
    
    <main class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="w-50 bg-body-secondary border border-2 border-primary-subtle p-3 rounded-2 text-primary-emphasis shadow">
            <h1 class="text-center">Reset Password</h1>
            <form action="/reset-password/control" method="post">
                <div class="mb-3 position-relative">
                    <label class="form-label" for="new-password">New Password</label>
                    <div>
                        <input 
                            type="password"
                            name="new-password"
                            id="new-password"
                            class="form-control"
                            required
                        >
                        <i id="new-password-toggler" class="bi bi-eye-fill position-absolute end-0 top-50 me-2 mt-1" onclick="toggle_password_visibility('new-password', 'new-password-toggler')"></i>
                    </div>
                </div>
                <div class="mb-3 position-relative">
                    <label for="confirm-password">Confirm Password</label>
                    <div>
                        <input 
                            type="password"
                            name="confirm-password"
                            id="confirm-password"
                            class="form-control"
                            required
                        >
                        <i id="confirm-password-toggler" class="bi bi-eye-fill position-absolute end-0 top-50 me-2 mt-1" onclick="toggle_password_visibility('confirm-password', 'confirm-password-toggler')"></i>
                    </div>
                </div>
                <div>
                    <input 
                        type="hidden" 
                        name="email"
                        id="email"
                        value="<?= $_SESSION["email"] ?>"
                    >
                </div>
                <div>
                    <button class="btn btn-primary">Reset Password</button>
                    <button type="button" class="btn btn-outline-danger" onclick="location.href='/'">Cancel</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>