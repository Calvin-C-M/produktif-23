<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | <?= NAMA_INSTANSI ?></title>
    
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("sweetalert/sweetalert2.min.css") ?>">

    <script src="<?= base_url("bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("sweetalert/sweetalert2.all.min.js") ?>"></script>
    <script src="<?= base_url("scripts/toggle_password.js") ?>"></script>
</head>
<body>
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
            <h1 class="text-center">Register</h1>
            <form action="/register/control" method="post">
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
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input 
                        type="text"
                        name="nama"
                        id="nama"
                        class="form-control"
                        required
                    >
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <select name="alamat" id="alamat" class="form-select">
                        <option selected>Kabupaten/Kota</option>
                    </select>
                </div>
                <div class="mb-3 position-relative">
                    <label class="form-label" for="password">Password</label>
                    <div>
                        <input 
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            required
                        >
                        <i id="password-toggler" class="bi bi-eye-fill position-absolute end-0 top-50 me-2 mt-1" onclick="toggle_password_visibility('password', 'password-toggler')"></i>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                </div>
                <div>
                    <a href="/">
                        Aku sudah punya akun
                    </a>
                </div>
            </form>
        </div>
    </main>

    <script>
        const alamatOption = document.querySelector("#alamat")
        fetch("http://dev.farizdotid.com/api/daerahindonesia/provinsi")
        .then(res => res.json())
        .then(data => {
            const provinsiData = data.provinsi
            provinsiData.map(provinsi => {
                fetch(`http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${provinsi.id}`)
                .then(res => res.json())
                .then(d => {
                    const daerahData = d.kota_kabupaten
                    daerahData.map(daerah => {
                        alamatOption.innerHTML += `
                            <option value="${daerah.nama}">${daerah.nama}</option>
                        `
                    })
                })
                .catch(err => console.log(err))
            })
        })
        .catch(err => console.log(err))
    </script>
</body>
</html>