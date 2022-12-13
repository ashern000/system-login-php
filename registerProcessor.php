<?php

if (isset($_POST['submit'])) {
    include "loginClass.php";

    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $password = $_POST["userPass"];

    $register = new Register();
    $register->setEmail($email);
    $register->setName($name);
    $register->setPass($password);

    $register->insert($register->getName(), $register->getEmail(), $register->getPass());
}


?>