<?php
class Car
{
    private $conn;
    private $table = 'schein'; //define table

    public $id;
    public $name;
    public $b21;
    public $b22;
    public $j;
    public $vier;
    public $d1;
    public $d2;
    public $zwei;
    public $fuenf;
    public $v9;
    public $vierzehn;
    public $p3;
    public $nid;
    public $verbin;
    public $verbau;
    public $co2kom;
    public $wid;
    public $sehrs;
    public $schnell;
    public $langsam;
    public $co2komb;



    public function __construct($cardb)
    {
        $this->conn = $cardb; //constructor
    }
    public function read() //read all lines and return stmt
    {
        $query = 'SELECT 
        s.id,
        s.name,
        s.b21,
        s.b22,
        s.j,
        s.vier,
        s.d1,
        s.d2,
        s.zwei,
        s.fuenf,
        s.v9,
        s.vierzehn,
        s.p3,
        n.verbin,
        n.verbau,
        n.co2kom,
        w.sehrs,
        w.schnell,
        w.langsam,
        w.co2komb
        FROM ' . $this->table . ' s 
        LEFT JOIN 
            nefz n ON s.id=n.id
        LEFT JOIN
            wltp w ON s.id=w.id;
        ';//prepare syntax from query

        $stmt = $this->conn->prepare($query);//prepare query
        $stmt->execute();//exec
        $stmt->store_result();//store result and return stmt
        return $stmt;
    }

    public function read_single() //read single line and return stmt
    {
        $query = 'SELECT 
        s.id,
        s.name,
        s.b21,
        s.b22,
        s.j,
        s.vier,
        s.d1,
        s.d2,
        s.zwei,
        s.fuenf,
        s.v9,
        s.vierzehn,
        s.p3,
        n.verbin,
        n.verbau,
        n.co2kom,
        w.sehrs,
        w.schnell,
        w.langsam,
        w.co2komb
        FROM ' . $this->table . ' s 
        LEFT JOIN 
            nefz n ON s.id=n.id
        LEFT JOIN
            wltp w ON s.id=w.id
        WHERE s.id = ? LIMIT 1';//prepare syntax from query

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
