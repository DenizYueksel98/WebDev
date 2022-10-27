<?php

namespace Model\User;

class User
{
    private $conn;
    private $table = 'users'; //define table

    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $timestamp;


    public function __construct($userdb)
    {
        $this->conn = $userdb; //constructor
    }
    public function read() //read all lines and return stmt
    {
        $query = 'SELECT 
        id,
        username,
        password,
        firstname,
        lastname,
        timestamp
        FROM ' . $this->table .
            ' ORDER BY timestamp DESC'; //prepare syntax from query

        $stmt = $this->conn->prepare($query); //prepare query
        $stmt->execute(); //exec
        $stmt->store_result(); //store result and return stmt
        return $stmt;
    }

    public function read_single() //read single line and return stmt
    {
        $query = 'SELECT 
        id,
        username,
        password,
        firstname,
        lastname,
        timestamp
        FROM ' . $this->table .
            ' WHERE id = ? LIMIT 1'; //prepare syntax from query

        $stmt = $this->conn->prepare($query); //prepare query
        $stmt->bind_param('i', $this->id); //bind param for id
        $stmt->execute(); //exec
        $stmt->store_result(); //store result and return stmt
        return $stmt;
    }
    public function create() //create new tupel in db
    {
        $query = 'INSERT INTO ' . $this->table . " (username, password, firstname, lastname) 
        VALUES (?, ?, ?, ?)"; //prepare syntax from query
        $stmt = $this->conn->prepare($query); //prepare query
        $this->username  = htmlspecialchars(strip_tags($this->username)); //get rid of html special chars and set vars
        $this->password  = htmlspecialchars(strip_tags($this->password));
        $this->firstname  = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname  = htmlspecialchars(strip_tags($this->lastname));
        $stmt->bind_param('ssss', $this->username, $this->password, $this->firstname, $this->lastname); //bind params for query
        if ($stmt->execute()) { //exec
            return true;
        }
        printf("Error %s. \n", $stmt->error); //error
        return false;
    }
    public function authenticate()
    {
        $query = 'SELECT ID, Passwort FROM userdata WHERE Benutzername = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $_POST['usernameLogin']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($this->id, $this->password);
            $stmt->fetch();
            if ($_POST['passwordLogin'] == $this->password) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['usernameLogin'];
                $_SESSION['id'] = $this->id;
                //check what page user first visited
                if (isset($_SESSION['url'])) {
                    $url = $_SESSION['url'];
                } else {
                    $url = "bu.index.php?c=user&a=register";
                }
                //redirect user to page they initially visited
                header("Location: $url");
            } else {
                echo 'Passwort falsch!';
            }
        } else {
            echo 'Nutzername falsch!';
        }

        $stmt->close();
    }
}
