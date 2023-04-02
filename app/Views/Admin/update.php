<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | <?= NAMA_INSTANSI ?></title>
</head>
<body>
    <form action="/admin/update/control" method="post">
        <div>
            <label for="nama">Nama</label>
            <input 
                type="text"
                name="nama"
                id="nama"
                value="<?= $userData['nama'] ?>"
            >
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input 
                type="text"
                name="alamat"
                id="alamat"
                value="<?= $userData['alamat'] ?>"
            >
        </div>
        <div>
            <input 
                type="hidden" 
                name="id"
                value="<?= $userData['id'] ?>"
            >
        </div>
        <button>Update</button>
    </form>
</body>
</html>