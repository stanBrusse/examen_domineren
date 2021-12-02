<?php
include('header.php');
if (isset($_SESSION['rol']) && $_SESSION['rol'] != "admin" && isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    if (headers_sent()) {
        die("You are not a Admin. Redirect failed. Please click on this link: <a href=../pages/index.php>home Page</a>");
    } else {
        exit(header("location:index.php"));
    }
}



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
    <title>Banen Beheer</title>
    <link rel="stylesheet" href="../css/banen_admin.css">
</head>

<body>
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
                <?php
                setlocale(LC_TIME, 'nl_NL');
                while ($baan = $result->fetch()) {
                    echo '<tr>
                        <td>' . $baan['code'] . '</td>
                        <td>' . $baan['soort'] . '</td>
                        <td>' . $baan['ligging'] . '</td>
                        <td>' . $baan['afmeting_lengte'] . '</td>
                        <td>' . $baan['afmeting_breedte'] . '</td>
                        <td>' . $baan['vloer'] . '</td>
                        <td>' . strftime("%a %d %b %Y", strtotime($baan['check_datum'])) . '</td>
                        <td>' . strftime("%a %d %b %Y", strtotime($baan['service_datum'])) . '</td>
                        <td><a href="banen_edit.php?nummer=' . $baan['nummer'] . '"><img class="change" type="button" src="../images/icons/change.svg"></a></td>
                    </tr>';
                } ?>
            </tbody>
        </table>
    </section>


    <?php include('footer.php'); ?>
</body>

</html>