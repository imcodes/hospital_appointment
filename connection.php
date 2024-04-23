<?php

$homepath = pathinfo(dirname(__FILE__,),PATHINFO_BASENAME);

    $database= new mysqli("localhost","root","","setz_db");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>