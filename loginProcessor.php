<?php
session_start();

if (isset($_POST['submit'])) {
    include "loginClass.php";

    $email = $_POST['userEmail'];
    $password = $_POST['userPass'];

    $login = new Login();

    $login->setEmail($email);
    $login->setPass($password);

    if($login->read($login->getEmail(), $login->getPass()) == false){
        echo "Usuário error ";
    } else {
        echo "<script>alert('Usuário Logado');document.location='loginD.php'</script>";
        $_SESSION["user"] = $_POST['userEmail'];
    }
    

}
?>