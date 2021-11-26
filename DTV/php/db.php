<?php

class db
{
    // --------CPANEL-------------
    // $username = "bveens_dtv";
    // $password = "Tennis@DTV!";
    // $dbname = "bveens_dtv";
    // --------CPANEL-------------
    private  $host = "localhost";
    private  $dbuser = "root";
    private  $dbpass = "";
    private  $dbname = "dtv";

    function query($query)
    {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare($query);
        return $stmt;
    }
}
