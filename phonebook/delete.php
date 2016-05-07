<?php
$db = new mysqli("localhost", "root", "", "phonebook_db");
$db->query("SET NAMES 'utf8'");

$id = $_REQUEST['id'];

$res = $db->query("SELECT * FROM people WHERE id=$id");
if ($res == false) {
    echo $db->error;
}
$contacts = $res->fetch_assoc();

if (isset($_REQUEST['confirm'])) {

    if ($_REQUEST['confirm'] == "Yes!") {
        $query = "DELETE FROM people WHERE id=$id";
        $res = $db->query($query);
        if ($res == false) {
            echo $db->error;
        }
       
    }
       header("Location: index.php");
        exit();
    } 
  

?><html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <a href="index.php">home</a>
        <a href="add.php">add</a>

        <form action="" method="post">
            Are you really want to delete"<?php echo $contacts['firstname']." ".$contacts['lastname'] ?>"?
            <input type="submit" name="confirm" value="Yes!">
            <input type="submit" name="confirm" value="No">
        </form>
    </body>
</html>
