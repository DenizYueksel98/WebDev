<?php
namespace Controller;
use Framework\AbstractController;
use Framework\AbstractRepository;
use Framework\Database;
//Wird noch entfernt, wurde von Niels nur zu Demozwecken verwendet

class MySqlController extends AbstractController
{
    public function defaultAction()
    {
        
        $this->disableView();
        $db= new Database(
            $host = "127.0.0.1",
            $username = "root",
            $password = "", //
            $userdatabase = "wwi2021a"
        );
        $repo = new AbstractRepository($db);
        print_r($repo->test());
    }
}