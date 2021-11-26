<?php
include('../php/db.php');

$db = new db;

$stmt = $db->query('SELECT * FROM `banen`');
$stmt->execute();
$result = $stmt;
?>
<!DOCTYPE html>
<html>
</div>

<head>
    <meta charset="utf-8">
    <title>Banen Onderhoud</title>
    <link rel="stylesheet" href="../css/banen_admin.css">
</head>

<body>
    <?php include('header.php'); ?>
    <section>
        <a type="button" href="banen_create.php">Create</a>
        <table>
            <colgroup>
                <col class="a" />
                <col class="b" />
                <col class="a" />
                <col class="b" />
                <col class="a" />
                <col class="b" />
                <col class="a" />
                <col class="b" />
                <col class="a" />
            </colgroup>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Soort</th>
                    <th>Ligging</th>
                    <th>Lengte</th>
                    <th>Breedte</th>
                    <th>Vloer</th>
                    <th>Check</th>
                    <th>Service</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($baan = $result->fetch()) {
                    echo '<tr>
                        <td>' . $baan['code'] . '</td>
                        <td>' . $baan['soort'] . '</td>
                        <td>' . $baan['ligging'] . '</td>
                        <td>' . $baan['afmeting_lengte'] . '</td>
                        <td>' . $baan['afmeting_breedte'] . '</td>
                        <td>' . $baan['vloer'] . '</td>
                        <td>' . $baan['check_datum'] . '</td>
                        <td>' . $baan['service_datum'] . '</td>
                        <td><a href="banen_edit.php?nummer=' . $baan['nummer'] . '"><img class="change" type="button" src="../images/icons/change.svg"></a></td>
                    </tr>';
                } ?>
            </tbody>
        </table>
    </section>


    <?php include('footer.php'); ?>
</body>

</html>