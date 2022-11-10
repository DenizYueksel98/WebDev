<?php

namespace Framework;
//Braucht DB Verbindung
interface Database
{
    public function connect();
    public function query($str);
    public function close();
}