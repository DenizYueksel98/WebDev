<?php

namespace Model\Car;

use Framework\AbstractModel;
use Directory;
include_once(__DIR__.DS.'..'.DS.'..'.DS.'Framework/AbstractModel.php');
class Car extends AbstractModel
{
    public $id;
    public $name;
    public $b21;
    public $b22;
    public $j;
    public $vier;
    public $d1;
    public $d21;
    public $d22;
    public $d23;
    public $zwei;
    public $fuenf1;
    public $fuenf2;
    public $v9;
    public $vierzehn;
    public $p3;
    public $verbin;
    public $verbau;
    public $verbko;
    public $co2komN;
    public $sehrs;
    public $schnell;
    public $langsam;
    public $co2komW;
    public $verb_unit;
    public $co2_unit;

/*
    Nachfolgend für die nächsten 400 Zeilen Code gilt:
    Initial wurde das Projekt über ActiveRecord umgesetzt
    (eine Car Klasse bündelt sämtliche Funktionen) 
    Mittlerweile haben wir PoPo versucht vollständig umzusetzen und 
    daher Funktionen aus der car.php in CarReposity bzw. CarDatabase
    aufgeteilt. Diese können nun von den API Endpunkten oder Controllern 
    eingebunden und direkt verwendet werden. Getter&Setter&fromArray() Car extends AbstractModel


    public function setid($id){$this->id=$id;}
    public function setname($name){$this->name=$name;}
    public function setb21($b21){$this->b21=$b21;}
    public function setb22($b22){$this->b22=$b22;}
    public function setj($j){$this->j=$j;}
    public function setvier($vier){$this->vier=$vier;}
    public function setd1($d1){$this->d1=$d1;}
    public function setd21($d21){$this->d21=$d21;}
    public function setd22($d22){$this->d22=$d22;}
    public function setd23($d23){$this->d23=$d23;}
    public function setzwei($zwei){$this->zwei=$zwei;}
    public function setfuenf1($fuenf1){$this->fuenf1=$fuenf1;}
    public function setfuenf2($fuenf2){$this->fuenf2=$fuenf2;}
    public function setv9($v9){$this->v9=$v9;}
    public function setvierzehn($vierzehn){$this->vierzehn=$vierzehn;}
    public function setp3($p3){$this->p3=$p3;}
    public function setnid($nid){$this->nid=$nid;}
    public function setverbin($verbin){$this->verbin=$verbin;}
    public function setverbau($verbau){$this->verbau=$verbau;}
    public function setverbko($verbko){$this->verbko=$verbko;}
    public function setco2komN($co2komN){$this->co2komN=$co2komN;}
    public function setwid($wid){$this->wid=$wid;}
    public function setsehrs($sehrs){$this->sehrs=$sehrs;}
    public function setschnell($schnell){$this->schnell=$schnell;}
    public function setlangsam($langsam){$this->langsam=$langsam;}
    public function setco2komW($co2komW){$this->co2komW=$co2komW;}
    public function setverb_unit($verb_unit){$this->verb_unit=$verb_unit;}
    public function setco2_unit($co2_unit){$this->co2_unit=$co2_unit;}

    public function getid(){return $this->id;}
    public function getname(){return $this->name;}
    public function getb21(){return $this->b21;}
    public function getb22(){return $this->b22;}
    public function getj(){return $this->j;}
    public function getvier(){return $this->vier;}
    public function getd1(){return $this->d1;}
    public function getd21(){return $this->d21;}
    public function getd22(){return $this->d22;}
    public function getd23(){return $this->d23;}
    public function getzwei(){return $this->zwei;}
    public function getfuenf1(){return $this->fuenf1;}
    public function getfuenf2(){return $this->fuenf2;}
    public function getv9(){return $this->v9;}
    public function getvierzehn(){return $this->vierzehn;}
    public function getp3(){return $this->p3;}
    public function getnid(){return $this->nid;}
    public function getverbin(){return $this->verbin;}
    public function getverbau(){return $this->verbau;}
    public function getverbko(){return $this->verbko;}
    public function getco2komN(){return $this->co2komN;}
    public function getwid(){return $this->wid;}
    public function getsehrs(){return $this->sehrs;}
    public function getschnell(){return $this->schnell;}
    public function getlangsam(){return $this->langsam;}
    public function getco2komW(){return $this->co2komW;}
    public function getverb_unit(){return $this->verb_unit;}
    public function getco2_unit(){return $this->co2_unit;}
   */
   /*
    public function __construct(
        $id,
        $name,
        $b21,
        $b22,
        $j,
        $vier,
        $d1,
        $d2,
        $zwei,
        $fuenf,
        $v9,
        $vierzehn,
        $p3,
        $verbin,
        $verbau,
        $verbko,
        $co2kom,
        $sehrs,
        $schnell,
        $langsam,
        $co2komW
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->b21 = $b21;
        $this->b22 = $b22;
        $this->j = $j;
        $this->vier = $vier;
        $this->d1 = $d1;
        $this->d2 = $d2;
        $this->zwei = $zwei;
        $this->fuenf = $fuenf;
        $this->v9 = $v9;
        $this->vierzehn = $vierzehn;
        $this->p3 = $p3;
        $this->nid = $id;
        $this->verbin = $verbin;
        $this->verbau = $verbau;
        $this->verbko = $verbko;
        $this->co2kom = $co2komN;
        $this->wid = $id;
        $this->sehrs = $sehrs;
        $this->schnell = $schnell;
        $this->langsam = $langsam;
        $this->co2komW = $co2komW;
    }*/
    /*
    public function readAll()
    {
        $resultArray = $this->repo->readAll();
        return $resultArray;
    }
    public function readAllSql() //read all lines and return stmt
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
        w.co2komW
        FROM ' . $this->table . ' s 
        LEFT JOIN '
            . $this->nefz . ' n ON s.id=n.id
        LEFT JOIN '
            . $this->wltp . ' w ON s.id=w.id;
        '; //prepare syntax from query
        
        return $query;
    }*/
    /*
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
        w.co2komW
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
    public function readSingle()
    {
        $this->conn->readSingle($this->id);
    }
    function likeCheck()
    {
        str_contains(strtoupper($this->theta), 'LIKE') ? $this->val = '%' . $this->value . '%' : $this->val = $this->value;
    }
    function filterCheck()
    { //check if table is not supplied and add if missing
        if (str_contains(strtolower($this->filter), 'id'))         $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'name')
        )          $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'b21')
        )           $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'b22')
        )           $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'j')
        )             $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'vier')
        )          $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'd1')
        )            $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'd2')
        )            $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'zwei')
        )          $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'fuenf')
        )         $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'v9')
        )            $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'vierzehn')
        )      $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'p3')
        )            $this->fil = 's.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'verbin')
        )        $this->fil = 'n.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'verbau')
        )        $this->fil = 'n.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'verbko')
        )        $this->fil = 'n.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'co2komN')
        )        $this->fil = 'n.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'sehrs')
        )         $this->fil = 'w.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'schnell')
        )       $this->fil = 'w.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'langsam')
        )       $this->fil = 'w.' . $this->filter;
        elseif (
            str_contains(strtolower($this->filter), 'co2komW')
        )       $this->fil = 'w.' . $this->filter;
        $this->fil = $this->filter;
    }
    public function read_filter() //read lines with filter
    {
        $this->filterCheck(); //check if table is not supplied and add if missing
        $this->likeCheck(); //if theta is LIKE then surround value with %
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
        w.co2komW
        FROM ' . $this->table . ' s 
        LEFT JOIN '
            . $this->nefz . ' n ON s.id=n.id
        LEFT JOIN '
            . $this->wltp . ' w ON s.id=w.id
        WHERE ' . $this->fil . ' ' . $this->theta . " '" . $this->val . "'" . ' ;'; //prepare syntax from query
        $stmt = $this->conn->prepare($query); //prepare query
        //$stmt->bind_param('ssi', $this->filter, $this->theta, $this->value); //bind param for id
        $stmt->execute(); //exec
        $stmt->store_result(); //store result and return stmt
        return $stmt;
    }*/
    //Transaktionsmanagement TODO
    //Try&Catch 
    /*
    public function create() //create new tupel in db
    {
        $query = 'INSERT INTO ' . $this->nefz . " (
            id,
            verbin,
            verbau,
            verbko,
            co2komN)
            VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query); //prepare query
        $this->nid       = htmlspecialchars(strip_tags($this->nid)); //get rid of html special chars and set vars
        $this->verbin    = htmlspecialchars(strip_tags($this->verbin));
        $this->verbau    = htmlspecialchars(strip_tags($this->verbau));
        $this->verbko    = htmlspecialchars(strip_tags($this->verbko));
        $this->co2kom    = htmlspecialchars(strip_tags($this->co2komN));
        $stmt->bind_param(
            'idddd',
            $this->nid,
            $this->verbin,
            $this->verbau,
            $this->verbko,
            $this->co2kom
        );
        if ($stmt->execute() == false) { //exec
            printf("Error while inserting in %s %s. \n", $this->nefz, $stmt->error); //error
        }
        $query = 'INSERT INTO ' . $this->wltp . " (
            id,
            sehrs,
            schnell,
            langsam,
            co2komW)
            VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query); //prepare query
        $this->wid        = htmlspecialchars(strip_tags($this->wid)); //get rid of html special chars and set vars
        $this->sehrs      = htmlspecialchars(strip_tags($this->sehrs));
        $this->schnell    = htmlspecialchars(strip_tags($this->schnell));
        $this->langsam    = htmlspecialchars(strip_tags($this->langsam));
        $this->co2komW    = htmlspecialchars(strip_tags($this->co2komW));
        $stmt->bind_param(
            'idddd',
            $this->wid,
            $this->sehrs,
            $this->schnell,
            $this->langsam,
            $this->co2komW
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
    }*/
}
