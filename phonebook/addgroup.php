<?php
$db = new mysqli("localhost", "root", "", "phonebook_db");
$db->query("SET NAMES 'utf8'");

if(isset($_POST['selection'])){
$title=$_REQUEST['title'];
$query="INSERT INTO `list` SET title='$title'";
$res=$db->query($query);
if($res==false){
    echo $db->error;
}
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
        <form action="" method="post">
            Group Name:<input type="text" name="title">
            <input type="submit" name="selection" value="add">
            
            
        </form>
         <a href="index.php">home</a>
    </body>
</html>

