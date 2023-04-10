<?php
php

/**
 * Connection to the database
 * This class extends to others, being mandatory to pass the connection variables to each instance
 * @param string host
 * @param string database user
 * @param string database password 
 * @param string database
 */

class Connection{
    private $localhost;
    private $user ;
    private $pass ;
    private $dbname;

    protected $conn;

    public function __construct($user, $host, $pass,$dbname)
    {
        $this->user = $user;
        $this->localhost = $host;
        $this->pass = $pass;
        $this->dbname = $dbname;

        try{

            $this->conn = new PDO("mysql:localhost=$this->localhost;dbname=$this->dbname",$this->user, $this->pass);

        } catch(PDOException $e){
            
            echo "Error connection: " . $e->getMessage();
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
