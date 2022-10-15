<?php
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


    public function __construct($db)
    {
        $this->conn = $db; //constructor
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
        ' ORDER BY timestamp DESC';//prepare syntax from query

        $stmt = $this->conn->prepare($query);//prepare query
        $stmt->execute();//exec
        $stmt->store_result();//store result and return stmt
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
        ' WHERE id = ? LIMIT 1';//prepare syntax from query

        $stmt = $this->conn->prepare($query);//prepare query
        $stmt->bind_param('i', $this->id);//bind param for id
        $stmt->execute();//exec
        $stmt->store_result();//store result and return stmt
        return $stmt;
    }
    public function create() //create new tupel in db
    {
        $query = 'INSERT INTO ' . $this->table . " (username, password, firstname, lastname) 
        VALUES (?, ?, ?, ?)";//prepare syntax from query
        $stmt = $this->conn->prepare($query);//prepare query
        $this->username  = htmlspecialchars(strip_tags($this->username));//get rid of html special chars and set vars
        $this->password  = htmlspecialchars(strip_tags($this->password));
        $this->firstname  = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname  = htmlspecialchars(strip_tags($this->lastname));
        $stmt->bind_param('ssss', $this->username, $this->password, $this->firstname, $this->lastname);//bind params for query
        if ($stmt->execute()) {//exec
            return true;
        }
        printf("Error %s. \n", $stmt->error);//error
        return false;
    }
}
