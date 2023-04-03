<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= NAMA_INSTANSI ?></title>

    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("sweetalert/sweetalert2.min.css") ?>">

    <script src="<?= base_url("bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("sweetalert/sweetalert2.all.min.js") ?>"></script>
    <script src="<?= base_url("scripts/toggle_password.js") ?>"></script>
</head>
<body>
    <?php
        if(isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "<?= $_SESSION['success'] ?>"
            })
        </script>
    <?php endif; ?>

    <?php
        if(isset($_SESSION['error'])) : ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "<?= $_SESSION['error'] ?>"
            })
        </script>
    <?php endif; ?>

    <?php
        if(isset($_SESSION['warning'])) : ?>
        <script>
            Swal.fire({
                icon: "warning",
                title: "<?= $_SESSION['warning'] ?>"
            })
        </script>
    <?php endif; ?>

    <main class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="w-50 bg-body-secondary border border-2 border-primary-subtle p-3 rounded-2 text-primary-emphasis shadow">
            <h1 class="text-center">Login</h1>
            <form action="/login/control" method="post">
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input 
                        type="text"
                        name="email"
                        id="email"
                        class="form-control border-primary"
                        required
                    >
                </div>
                <div class="mb-3 position-relative">
                    <label class="form-label" for="password">Password</label>
                    <div class="">
                        <input 
                            type="password"
                            name="password"
                            id="password"
                            class="form-control border-primary"
                            required
                        >
                        <i id="password-toggler" class="bi bi-eye-fill position-absolute end-0 top-50 me-2 mt-1" onclick="toggle_password_visibility('password', 'password-toggler')"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-primary">Login</button>
                    <?php
                        if(isset($_SESSION['invalidLogin']) && $_SESSION['invalidLogin']) : ?>
                        <span class="text-danger">
                            Username/password salah!
                        </span>
                    <?php endif; ?>
                </div>
                <div class="d-flex flex-column gap-2 mt-3 ">
                    <a href="/forgot">
                        Aku lupa password?
                    </a>
                    <a href="/register">
                        Aku belum punya akun
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>