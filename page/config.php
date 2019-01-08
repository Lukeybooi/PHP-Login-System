<?php
define('DATA', 'mysql:host=127.0.0.1;dbname=login');
define('USERNAME', 'root');
define('PASSWORD', '');

class Database
{
    private $conn;
    private $query;
    private $row;

    public function __construct()
    {
        $this->setConnection();
    }

    public function setQuery($sql)
    {
        $this->query = $this->conn->query($sql);
    }

    public function fetchQuery($username, $password)
    {
        $this->row = $this->query->fetchAll(PDO::FETCH_OBJ);
        return $this->checkCredential($username, $password);
    }

    public function fetchClass($username, $password, $value = -1)
    {
        $this->query->setFetchMode(PDO::FETCH_CLASS, 'Credential');
        $this->row = $this->query->fetchAll();
        return $this->checkCredentialClass($username, $password, $value);
    }

    public function fetchUsername($username)
    {
        $this->row = $this->query->fetchAll(PDO::FETCH_OBJ);
        return $this->checkUsername($username);
    }

    private function checkUsername($username)
    {
        for ($i = 0; $i < count($this->row); $i++) {
            if (strtolower($this->row[$i]->Username) === strtolower($username)) {
                return true;
            }
        }

        return false;
    }

    private function checkCredential($username, $password)
    {
        for ($i = 0; $i < count($this->row); $i++) {
            if (strtolower($this->row[$i]->Username) === $username && $this->row[$i]->Password === $password) {
                return true;
            }
        }

        return false;
    }

    private function checkCredentialClass($username, $password, $value)
    {
        for ($i = 0; $i < count($this->row); $i++) {
            if (strtolower($this->row[$i]->getUsername()) === $username && $this->row[$i]->getPassword() === $password) {

                switch ($value) {
                    case 0:return $this->row[$i]->getID();
                        break;
                    case 1:return $this->row[$i]->getUsername();
                        break;
                    case 2:return $this->row[$i]->getPassword();
                        break;
                    case 3:return $this->row[$i]->getFirst_Name();
                        break;
                    case 4:return $this->row[$i]->getLast_Name();
                        break;
                    case 5:return $this->row[$i]->getFull_Name();
                        break;
                    default:return true;
                }
            }
        }
        return false;
    }

    private function setConnection()
    {
        $this->conn = new PDO(DATA, USERNAME, PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

class Credential
{
    private $ID;
    private $Username;
    private $Password;
    private $First_Name;
    private $Last_Name;
    private $Full_Name;

    public function __construct()
    {
        $this->Full_Name = $this->First_Name . " " . $this->Last_Name;
    }

    /**
     * Get the value of ID
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Get the value of Username
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * Get the value of Password
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Get the value of First_Name
     */
    public function getFirst_Name()
    {
        return $this->First_Name;
    }

    /**
     * Get the value of Last_Name
     */
    public function getLast_Name()
    {
        return $this->Last_Name;
    }

    /**
     * Get the value of Full_Name
     */
    public function getFull_Name()
    {
        return $this->Full_Name;
    }
}
