<?php
$db = new mysqli("localhost", "root", "", "phonebook_db");
$id = $_GET['id'];
$query = "SELECT * FROM people WHERE groupid='$id'";
$res = $db->query($query);
$row = $res->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>
        <title>group</title>
    </head>
    <body>
        <?php

        $num = count($row);
        echo "num : " . $num;
        ?>
        <br>
        <a href="index.php">home</a>
    <a href="listgroup.php">list</a>
    <ul>
            <?php
            foreach ($row as $r) {
                echo "<ul>";
                echo "<li><strong>Firstname:</strong>$r[firstname]</li>";
                echo "<li><strong>Lastname:</strong>$r[lastname]</li>";
                echo "<li><strong>Phonenum:</strong>$r[phonenum]</li>";
                echo "<li><strong>Mobilenum:</strong>$r[mobilenum]</li>";
                echo "</ul>";
            }
            ?>
        </ul>

    </body>
</html>

