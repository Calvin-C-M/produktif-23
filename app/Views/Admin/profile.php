<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?= NAMA_INSTANSI ?></title>
    
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("sweetalert/sweetalert2.min.css") ?>">

    <script src="<?= base_url("bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("sweetalert/sweetalert2.all.min.js") ?>"></script>
    <script src="<?= base_url("scripts/toggle_password.js") ?>"></script>

</head>
<body>
    <main class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="position-relative w-25 d-flex flex-column align-items-center justify-content-center gap-3 bg-body-secondary border border-2 border-primary-subtle p-3 rounded-2 text-primary-emphasis shadow">
            <div>
                <span class="position-absolute top-0 start-0 mx-2">
                    <a href="/admin/home">Back</a>
                </span>
                <span class="position-absolute top-0 end-0 mx-2" style="cursor:pointer" onclick="location.href='/admin/update?id=<?= $user['id'] ?>'">
                    <i class="bi bi-pencil"></i>
                </span>
            </div>
            <img 
                src="https://github.com/mdo.png" 
                alt="Foto Profile <?= $user['nama'] ?>"
                class="rounded-circle w-50"
            >
            <h1><?= $user['nama'] ?></h1>
            <p class="text-"><?= $account['email'] ?></p>
            <p><?= $user['alamat'] ?></p>
        </div>
    </main>
</body>
</html>