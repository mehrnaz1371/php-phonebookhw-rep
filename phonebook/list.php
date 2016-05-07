<?php
$db = new mysqli("localhost", "root", "", "phonebook_db");
$db->query("SET NAMES 'utf8'");
$id=(int)$_GET['id'];
$query="SELECT * FROM `people` WHERE id=$id";
$res=$db->query($query);
if($res==false){
    echo $db->error;
}
$contacts=$res->fetch_assoc();
?><html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
      
        <a href="index.php">home</a>
        <a href="add.php">add</a>
        <a href="edit.php?id=<?php echo $id; ?>">edit</a>
        <a href="delete.php?id=<?php echo $id; ?>">delete</a><br>
       
       
     <?php 
     $group=$contacts['groupid'];
     $q="SELECT * FROM list WHERE id='$group'";
     $res=$db->query($q);
     $g=$res->fetch_assoc();
    echo "<strong>Firstname:</strong>$contacts[firstname]";
    echo "<br>";
    echo "<strong>Lastname:</strong>$contacts[lastname]";
    echo "<br>";
    echo "<strong>PhoneNumber:</strong>$contacts[phonenum]";
    echo "<br>";
    echo" <strong>MobileNum:</strong>$contacts[mobilenum]";
     echo "<br>";
     echo" <strong>Group:</strong>$g[title]";
 
            ?>


    </body>
</html>
