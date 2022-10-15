<?php
class Car
{
    private $conn;
    private $table = 'schein'; //define table schein
    private $wltp = 'wltp'; // define wltp
    private $nefz = 'nefz'; //define nefz
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
    public $verbko;
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
        n.verbko,
        n.co2kom,
        w.sehrs,
        w.schnell,
        w.langsam,
        w.co2komb
        FROM ' . $this->table . ' s 
        LEFT JOIN '
            . $this->nefz . ' n ON s.id=n.id
        LEFT JOIN '
            . $this->wltp . ' w ON s.id=w.id;
        '; //prepare syntax from query

        $stmt = $this->conn->prepare($query); //prepare query
        $stmt->execute(); //exec
        $stmt->store_result(); //store result and return stmt
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
        n.verbko,
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
        WHERE s.id = ? LIMIT 1'; //prepare syntax from query

        $stmt = $this->conn->prepare($query); //prepare query
        $stmt->bind_param('i', $this->id); //bind param for id
        $stmt->execute(); //exec
        $stmt->store_result(); //store result and return stmt
        return $stmt;
    }
    public function create() //create new tupel in db
    {
        $query = 'INSERT INTO ' . $this->nefz . " (
            id,
            verbin,
            verbau,
            verbko,
            co2kom)
            VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query); //prepare query
        $this->nid       = htmlspecialchars(strip_tags($this->nid)); //get rid of html special chars and set vars
        $this->verbin    = htmlspecialchars(strip_tags($this->verbin));
        $this->verbau    = htmlspecialchars(strip_tags($this->verbau));
        $this->verbko    = htmlspecialchars(strip_tags($this->verbko));
        $this->co2kom    = htmlspecialchars(strip_tags($this->co2kom));
        $stmt->bind_param(
            'idddd',
            $this->nid,
            $this->verbin,
            $this->verbau,
            $this->verbko,
            $this->co2kom
        );
        if (!$stmt->execute()) { //exec
            printf("Error while inserting in %s %s. \n", $this->nefz, $stmt->error); //error
        }
        $query = 'INSERT INTO ' . $this->wltp . " (
            id,
            sehrs,
            schnell,
            langsam,
            co2komb)
            VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query); //prepare query
        $this->wid        = htmlspecialchars(strip_tags($this->wid)); //get rid of html special chars and set vars
        $this->sehrs      = htmlspecialchars(strip_tags($this->sehrs));
        $this->schnell    = htmlspecialchars(strip_tags($this->schnell));
        $this->langsam    = htmlspecialchars(strip_tags($this->langsam));
        $this->co2komb    = htmlspecialchars(strip_tags($this->co2komb));
        $stmt->bind_param(
            'idddd',
            $this->wid,
            $this->sehrs,
            $this->schnell,
            $this->langsam,
            $this->co2komb
        );
        if (!$stmt->execute()) { //exec
            printf("Error while inserting in %s %s. \n", $this->wltp, $stmt->error); //error
        }
        $query = 'INSERT INTO ' . $this->table . " (
                id,
                name,
                b21,
                b22,
                j,
                vier,
                d1,
                d2,
                zwei,
                fuenf,
                v9,
                vierzehn,
                p3) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; //prepare syntax from query
        $stmt = $this->conn->prepare($query); //prepare query
        $this->id        = htmlspecialchars(strip_tags($this->id)); //get rid of html special chars and set vars
        $this->name      = htmlspecialchars(strip_tags($this->name));
        $this->b21       = htmlspecialchars(strip_tags($this->b21));
        $this->b22       = htmlspecialchars(strip_tags($this->b22));
        $this->j         = htmlspecialchars(strip_tags($this->j));
        $this->vier      = htmlspecialchars(strip_tags($this->vier));
        $this->d1        = htmlspecialchars(strip_tags($this->d1));
        $this->d2        = htmlspecialchars(strip_tags($this->d2));
        $this->zwei      = htmlspecialchars(strip_tags($this->zwei));
        $this->fuenf     = htmlspecialchars(strip_tags($this->fuenf));
        $this->v9        = htmlspecialchars(strip_tags($this->v9));
        $this->vierzehn  = htmlspecialchars(strip_tags($this->vierzehn));
        $this->p3        = htmlspecialchars(strip_tags($this->p3));
        $stmt->bind_param(
            'issssssssssss',
            $this->id,
            $this->name,
            $this->b21,
            $this->b22,
            $this->j,
            $this->vier,
            $this->d1,
            $this->d2,
            $this->zwei,
            $this->fuenf,
            $this->v9,
            $this->vierzehn,
            $this->p3
        ); //bind params for query
        if ($stmt->execute()) { //exec
            return true;
        }
        printf("Error while inserting in %s %s. \n", $this->table, $stmt->error); //error
        return false;
    }
}
