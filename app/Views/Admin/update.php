<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | <?= NAMA_INSTANSI ?></title>

    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("sweetalert/sweetalert2.min.css") ?>">

    <script src="<?= base_url("bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("sweetalert/sweetalert2.all.min.js") ?>"></script>
</head>
<body>
    <main class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <h1>Update Data</h1>
        <div class="w-50 bg-body-secondary border border-2 border-primary-subtle p-3 rounded-2 text-primary-emphasis shadow">
            <form action="/admin/update/control" method="post">
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input 
                        type="text"
                        name="nama"
                        id="nama"
                        class="form-control"
                        value="<?= $userData['nama'] ?>"
                    >
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <select name="alamat" id="alamat" class="form-select">
                    </select>
                </div>
                <div>
                    <input 
                        type="hidden" 
                        name="id"
                        value="<?= $userData['id'] ?>"
                    >
                </div>
                <div>
                    <button class="btn btn-primary">Update</button>
                    <button type="submit" class="btn btn-outline-secondary" onclick="location.href='/admin/home'">Back</button>
                </div>
            </form>
        </div>
    </main>
    
    <script>
        const alamatOption = document.querySelector("#alamat")
        const selectedOptionValue = "<?= $userData['alamat'] ?>"
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
                            <option value="${daerah.nama}" ${(selectedOptionValue == daerah.nama) ? "selected" : ""}>${daerah.nama}</option>
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