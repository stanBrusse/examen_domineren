<?php
// deze database is voor het maken en testen. kan weg
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dtv";

//maakt de connectie aan 
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

//Vraag resultaat
$sql = 'SELECT * FROM reservatie_baan';
$result = $conn->query($sql);
?>
<table border="black 1px" align="center" cellpadding="5px">
    <tr>
            <th colspan="2">Baan 1 (Tennisbaan)</th>
            <th colspan="2">Baan 2 (Tennisbaan)</th>
            <th colspan="2">Baan 3 (Tennisbaan)</th>
            <th colspan="2">Baan 4 (Tennisbaan)</th>
            <th colspan="2">Baan 5 (Squashbaan)</th>
            <th colspan="2">Baan 6 (Squashbaan)</th>
           <th colspan="2">Baan 7 (Squashbaan)</th>
    </tr>
    <tr>
<?php
echo "<tr>";
while(($row = $result->fetch_assoc())) {
    for($i = 1; $i <= 7; $i++){
        if( $row["baan_nummer"] == $i && $row["tijd_Begin"] == 1200 && $row["datum"] == "2021-11-15"){
          echo "<td>Gereserveerd" . $i . "</td>";
        }else{
          echo "<td>Beschikbaar" . $i . "</td>";
        }
      }
    }

    echo "</tr>";



// $datum = array();
// $baan_nummer = array();
// $tijd_Begin = array();

// while(($row = $result->fetch_assoc())) {
//     $datum[] = $row["datum"];
//     $baan_nummer[] = $row["baan_nummer"];
//     $tijd_Begin[] = $row["tijd_Begin"];
// }
// foreach ($datum as $date) {
//     if($date == "2021-11-15"){
//             if(in_array(1, $baan_nummer)){
//                     echo "Ja";
//             }
//         }
//     }
//     echo $row["nummer"];
//     if($row["datum"] == "2021-11-15"){
//         if($row["tijd_Begin"] == 1200){
//         switch($row["baan_nummer"]){
//             case 1:
//                 echo "Gereserveerd";
//                 break;
//             case 2:
//                 echo "Gereserveerd";
//                 break;
//             case 3:
//                 echo "Gereserveerd";
//                 break;
//             case 4:
//                 echo "Gereserveerd";
//                 break;
//             case 5:
//                 echo "Gereserveerd";
//                 break;
//             case 6:
//                 echo "Gereserveerd";
//                 break;
//             case 7:
//                 echo "Gereserveerd";
//                 break;
//             default:
//                 echo "Beschikbaar";
//         }
            
//         }
//         if($row["tijd_Begin"] == 1300){
//             if($row["baan_nummer"] == 1){
//                 echo "Baan 1 1300";
//             }
//             if($row["baan_nummer"] == 2){
//                 echo "Baan 2 1300";
//             }
//             if($row["baan_nummer"] == 3){
//                 echo "Baan 3 1300";
//             }
//             if($row["baan_nummer"] == 4){
//                 echo "Baan 4 1300";
//             }
//             if($row["baan_nummer"] == 5){
//                 echo "Baan 5 1300";
//             }
//             if($row["baan_nummer"] == 6){
//                 echo "Baan 6 1300";
//             }
//             if($row["baan_nummer"] == 7){
//                 echo "Baan 7 1200";
//             }
//         }
//     }


$conn->close();

