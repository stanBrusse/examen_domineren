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

$stmt = $db->query('SELECT * FROM `activiteiten`');
$stmt->execute();
$result = $stmt;
?>
<!DOCTYPE html>
<html>
</div>

<head>
    <meta charset="utf-8">
    <title>Banen Beheer</title>
    <link rel="stylesheet" href="../css/activiteiten_admin.css">
</head>

<body>
    <section>
        <a type="button" href="activiteiten_create.php">Create</a>
        <table>
            <colgroup>
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
                    <th>Activiteit</th>
                    <th>Title</th>
                    <th>Datum Activiteit</th>
                    <th>Datum Inschrijvingen</th>
                    <th>Start Tijd</th>
                    <th>Eind Tijd</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                setlocale(LC_TIME, "Dutch");
                while ($row = $result->fetch()) {
                    echo '<tr>
                        <td>' . $row['activiteit'] . '</td>
                        <td>' . $row['title'] . '</td>
                        <td>' . strftime("%A %d %B %Y", strtotime($row['datum_activiteit'])) . '</td>
                        <td>' . strftime("%A %d %B %Y", strtotime($row['datum_ingeschreven'])) . '</td>
                        <td>' . substr_replace($row['tijd_start'], ':', 2, 0) . '</td>
                        <td>' . substr_replace($row['tijd_eind'], ':', 2, 0) . '</td>
                        <td><a href="activiteiten_edit.php?nummer=' . $row['nummer'] . '"><img class="change" type="button" src="../images/icons/change.svg"></a></td>
                    </tr>';
                } ?>
            </tbody>
        </table>
    </section>


    <?php include('footer.php'); ?>
</body>

</html>