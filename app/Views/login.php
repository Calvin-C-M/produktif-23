<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= $NAMA_INSTANSI ?></title>
</head>
<body>
    <form action="/login/control" method="post">
        <div>
            <label for="username">Username</label>
            <input 
                type="text"
                name="username"
                id="username"
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
        <button>Login</button>
        <div>
            <a href="/forgot">
                Aku lupa password?
            </a>
            <a href="/register">
                Aku belum punya akun
            </a>
        </div>
    </form>
</body>
</html>