<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | <?= NAMA_INSTANSI ?></title>

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
            <h1 class="text-center">Confirm Email</h1>
            <form action="/send-reset-password" method="post">
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input 
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        required
                    >
                </div>
                <button class="btn btn-primary">Confirm</button>
            </form>
        </div>
    </main>
</body>
</html>