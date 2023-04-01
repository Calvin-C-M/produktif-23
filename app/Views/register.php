<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | <?= NAMA_INSTANSI ?></title>
</head>
<body>
    <form action="/register/control" method="post">
        <div>
            <label for="nama">Nama</label>
            <input 
                type="text"
                name="nama"
                id="nama"
            >
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input 
                type="text"
                name="alamat"
                id="alamat"
            >
        </div>
        <div>
            <label for="email">Email</label>
            <input 
                type="email"
                name="email"
                id="email"
            >
        </div>
        <div>
            <label for="password">Password</label>
            <input 
                type="password"
                name="password"
                id="password"
            >
        </div>
        <button>Register</button>
        <div>
            <a href="/">
                Aku sudah punya akun
            </a>
        </div>
    </form>
</body>
</html>