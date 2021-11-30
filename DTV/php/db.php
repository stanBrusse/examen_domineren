<?php
$host = "localhost";
$dbuser = "bveens_dtv";
$dbpass = "Tennis@DTV!";
$dbname = "bveens_dtv";

$pdo = new PDO("mysql:host=$host;dbname=$dbuser", $dbpass, $dbname);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class db
{
    // --------CPANEL-------------
    // $username = "bveens_dtv";
    // $password = "Tennis@DTV!";
    // $dbname = "bveens_dtv";
    // --------CPANEL-------------
    private  $host = "localhost";
    private  $dbuser = "bveens_dtv";
    private  $dbpass = "Tennis@DTV!";
    private  $dbname = "bveens_dtv";

    function query($query)
    {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare($query);
        return $stmt;
    }
}
