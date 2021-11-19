<?php
class db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dtv";

    public function query($query)
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("$query");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $conn = null;
        return $this;
    }
}

?>
