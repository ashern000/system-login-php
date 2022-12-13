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

            <form action="registerProcessor.php" method="POST" autocomplete="off">
                <div class="name">
                    <label>Name</label>
                    <br>
                    <input type="text" name="userName" id="">
                </div>

                <div class="email">
                    <label for="">Email</label>
                    <br>
                    <input type="email" name="userEmail" id="">
                </div>



                <div class="password">
                    <label for="">Password</label>
                    <br>
                    <input type="password" name="userPass" id="">
                </div>


                <div class="submit-div">
                    <input type="submit" value="Entrar" name="submit">
                </div>
            </form>
        </div>

    </div>
</body>

</html>