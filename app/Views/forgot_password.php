<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | <?= NAMA_INSTANSI ?></title>
</head>
<body>
    <form action="/send-reset-password" method="post">
        <div>
            <label for="email">Email</label>
            <input 
                type="email"
                name="email"
                id="email"
                required
            >
        </div>
        <button>Reset</button>
    </form>
</body>
</html>