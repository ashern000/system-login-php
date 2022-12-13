<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="login-photo">
        <img src="" alt="Foto de Login">

    </div>
    <div class="login-container">

        <div class="form-col">

            <form action="loginProcessor.php" method="POST" autocomplete="off">
                <div class="email">
                    <label for="">Email or User Name</label>
                    <br>
                    <input type="text" name="userEmail" id="">
                </div>

                <br>

                <div class="password">
                    <label for="">Password</label>
                    <br>
                    <input type="password" name="userPass" id="">
                    <br>
                </div>
                <div class="submit-div">
                    <input type="submit" value="Entrar" name="submit">
                </div>
            </form>
        </div>

    </div>
</body>

</html>