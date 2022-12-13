<?php

class Connection
{
    private $localhost = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "CodesOfAsher";
    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:localhost=$this->localhost;dbname=" . $this->dbname, $this->user, $this->pass);
        } catch (PDOException $err) {
            echo "Database error in conecction" . $err->getMessage();
            exit();
        }

    }


}

class Login extends Connection
{
    private $emailUser;
    private $passUser;

    private $nameUser;


    public function setEmail($date)
    {
        $this->emailUser = $date;

    }

    public function setPass($date)
    {
        $this->passUser = $date;

    }

    public function setName($date)
    {
        $this->nameUser = $date;
    }

    public function getPass()
    {
        return $this->passUser;
    }

    public function getEmail()
    {
        return $this->emailUser;
    }

    public function getName()
    {
        return $this->nameUser;
    }

    public function getUsers()
    {
        $emailUua = $this->getEmail();
        $passUua = $this->getPass();
        $stmt = $this->conn->prepare("SELECT emailUser, userPassword FROM users_tb WHERE emailUser='$emailUua' AND userPassword='$passUua'");
        $result = $stmt->execute();


        if ($result == 1) {
            while ($row = $stmt->fetch())
                ;
            echo $row['emailUser'];
        }

    }

    public function read($emailU, $passU)
    {
        $sql = "SELECT * FROM users_tb WHERE emailUser='$emailU' AND passUser='$passU' OR nameUser='$emailU' AND passUser='$passU'";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute() == 1) {
            $result = $stmt->fetchAll();
            return $result;
        } else{
            return false;
        }
        ;

    }

}

class Register extends Connection
{

    private $emailUser;
    private $passUser;

    private $nameUser;


    public function setEmail($date)
    {
        $this->emailUser = $date;

    }

    public function setPass($date)
    {
        $this->passUser = $date;

    }

    public function setName($date)
    {
        $this->nameUser = $date;
    }

    public function getPass()
    {
        return $this->passUser;
    }

    public function getEmail()
    {
        return $this->emailUser;
    }

    public function getName()
    {
        return $this->nameUser;
    }

    public function insert($nameU, $emailU, $passU)
    {
        $sql = 'INSERT INTO users_tb (nameUser,emailUser, passUser) VALUES (:nameU,:emailU, :passU)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'emailU' => $emailU,
            'passU' => $passU,
            'nameU' => $nameU
        ]);
        return true;
    }


}
?>