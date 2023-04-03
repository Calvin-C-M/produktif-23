<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home | <?= NAMA_INSTANSI ?></title>

    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("sweetalert/sweetalert2.min.css") ?>">

    <script src="<?= base_url("bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("sweetalert/sweetalert2.all.min.js") ?>"></script>
    <script src="<?= base_url("scripts/toggle_password.js") ?>"></script>

    <script src="<?= base_url("scripts/api_handler.js") ?>"></script>
</head>
<body>
    <main class="d-flex flex-column min-vh-100 justify-content-center align-items-center text-primary-emphasis ">
        <h1>Table User</h1>
        <div class="w-75">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <img 
                        src="https://github.com/mdo.png" 
                        width="32"
                        height="32"
                        class="rounded-circle"
                        alt="Foto Profil"
                    >
                    <span><?= $user['nama'] ?></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/admin/profile">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"  href="/">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <table class="table table-striped border border-2 border-primary-subtle rounded-2 shadow">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                </tbody>
            </table>
        </div>
    </main>

    <script>
        fetch("<?= base_url("/user") ?>")
        .then(res => res.json())
        .then(data => {
            let users = data.data
            const tableBody = document.querySelector(".table-body")
            const currUserId = "<?= $user['id'] ?>"
            users.map(user => {
                console.log(user)
                if(user.id != currUserId) {
                    tableBody.innerHTML += `
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.nama}</td>
                            <td>${user.alamat}</td>
                            <td>
                                <button class="btn btn-warning" onclick="location.href='/admin/update?id=${user.id}'">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger" onclick="deleteData(${user.id})">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                    `
                }
            })

        })
        .catch(err => {
            console.log(err)
        })
    </script>
</body>
</html>