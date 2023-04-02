<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | <?= NAMA_INSTANSI ?></title>
</head>
<body>
    <form action="/reset-password/control" method="post">
        <div>
            <label for="new-password">New Password</label>
            <input 
                type="password"
                name="new-password"
                id="new-password"
            >
        </div>
        <div>
            <label for="confirm-password">Confirm Password</label>
            <input 
                type="password"
                name="confirm-password"
                id="confirm-password"
            >
        </div>
        <div>
            <input 
                type="hidden" 
                name="email"
                id="email"
                value="<?= $_SESSION["email"] ?>"
            >
        </div>
        <button>Reset Password</button>
    </form>
</body>
</html>