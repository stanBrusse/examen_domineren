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
    <link rel="stylesheet" href="../css/banen_onderhoud.css">
</head>

<body>
    <?php include('header.php'); ?>
    <section class="section_table">
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
                <?php while ($baan = $result->fetch()) { ?>
                    <tr>
                        <form action="banen_edit.php" method="POST">
                            <td><?php echo $baan['code']; ?></td>
                            <td><?php echo $baan['soort']; ?></td>
                            <td><?php echo $baan['ligging']; ?></td>
                            <td><?php echo $baan['afmeting_lengte']; ?></td>
                            <td><?php echo $baan['afmeting_breedte']; ?></td>
                            <td><?php echo $baan['vloer']; ?></td>
                            <td><?php echo $baan['check_datum']; ?></td>
                            <td><?php echo $baan['service_datum']; ?></td>
                            <td><input type="submit" value="EDIT" name="edit"></td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>


        </table>
    </section>


    <?php include('footer.php'); ?>
</body>

</html>