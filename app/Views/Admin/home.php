<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home | <?= NAMA_INSTANSI ?></title>

    <script src="<?= base_url("scripts/api_handler.js") ?>"></script>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-body">
        </tbody>
    </table>

    <script>
        fetch("<?= base_url("/user") ?>")
        .then(res => res.json())
        .then(data => {
            let users = data.data
            const tableBody = document.querySelector(".table-body")
            users.map(user => {
                console.log(user)
                tableBody.innerHTML += `
                    <tr>
                        <td>${user.id}</td>
                        <td>${user.nama}</td>
                        <td>${user.alamat}</td>
                        <td>
                            <button>Update</button>
                            <button onclick="deleteData(${user.id})">Delete</button>
                        </td>
                    </tr>
                `
            })

        })
        .catch(err => {
            console.log(err)
        })
    </script>
</body>
</html>