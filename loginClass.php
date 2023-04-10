<?php

/**
 * Connection to the database
 * This class extends to others, being mandatory to pass the connection variables to each instance
 * @param string host
 * @param string database user
 * @param string database password 
 * @param string database
 */

class Connection
{
    private $localhost;
    private $user;
    private $pass;
    private $dbname;

    protected $conn;

    public function __construct($user, $host, $pass, $dbname)
    {
        $this->user = $user;
        $this->localhost = $host;
        $this->pass = $pass;
        $this->dbname = $dbname;

        try {

            $this->conn = new PDO("mysql:localhost=$this->localhost;dbname=$this->dbname", $this->user, $this->pass);

        } catch (PDOException $e) {

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

    /**
     * Set user email
     * @param string userEmail
     */
    public function setEmail($date)
    {
        $this->emailUser = $date;

    }

    /**
     * Set user password
     * @param string userPassword
     */
    public function setPass($date)
    {
        $this->passUser = $date;

    }

    /**
     * Set user name
     * @param string userName
     */

    public function setName($date)
    {
        $this->nameUser = $date;
    }

    /**
     * Get user password
     * @return string userPassword
     */

    public function getPass()
    {
        return $this->passUser;
    }

    /**
     * Get user email
     * @return string userEmail
     */

    public function getEmail()
    {
        return $this->emailUser;
    }

    /**
     * Get userName
     * @return string userName
     */

    public function getName()
    {
        return $this->nameUser;
    }


    /**
     * Get users from database
     */

    public function getUsers()
    {
        $emailUser = $this->getEmail();
        $passUser = $this->getPass();
        $stmt = $this->conn->prepare("SELECT emailUser, userPassword FROM users_tb WHERE emailUser='$emailUser' AND userPassword='$passUser'");
        $result = $stmt->execute();


        if ($result == 1) {
            while ($row = $stmt->fetch())
                ;
            echo $row['emailUser'];
        }

    }

    public function read($email, $pass)
    {
        $sql = "SELECT * FROM users_tb WHERE emailUser='$email' AND passUser='$pass' OR nameUser='$email' AND passUser='$pass'";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute() == 1) {
            $result = $stmt->fetchAll();
            return $result;
        } else {
            return false;
        }
        ;

    }

}

/**
 * This class is used to register the user, it extends from the connection class
 */

class Register extends Connection
{

    private $emailUser;
    private $passUser;
    private $nameUser;

    /**
     * Set user email
     * @param string userEmail
     */
    public function setEmail($date)
    {
        $this->emailUser = $date;

    }

    /**
     * Set user password
     * @param string userPassword
     */
    public function setPass($date)
    {
        $this->passUser = $date;

    }

    /**
     * Set user name
     * @param string userName
     */

    public function setName($date)
    {
        $this->nameUser = $date;
    }


    /**
     * Get user password
     * @return string userPassword
     */

    public function getPass()
    {
        return $this->passUser;
    }


    /**
     * Get user email
     * @return string userEmail
     */

    public function getEmail()
    {
        return $this->emailUser;
    }

    /**
     * Get userName
     * @return string userName
     */

    public function getName()
    {
        return $this->nameUser;
    }

    /**
     * This function insert the user into the database
     * @param string name
     * @param string email
     * @param string pass
     * @return bool true
     */

    public function insert($name, $email, $pass)
    {
        $sql = 'INSERT INTO users_tb (nameUser,emailUser, passUser) VALUES (:nameUser,:emailUser, :passUser)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'emailUser' => $email,
            'passUser' => $pass,
            'nameUser' => $name
        ]);
        return true;
    }


}
?>