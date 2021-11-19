<?php

try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dtv";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT ?,? FROM artikelen");
    $stmt->execute(['Naam', 'Prijs']);
    $data = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    var_dump($data);
    // and somewhere later:
    foreach ($stmt->fetchAll() as $row=>$item) {
        var_dump($stmt);
        var_dump($row);
        var_dump($item);
        echo $row['Naam']. "<br />\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
