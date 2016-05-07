<?php
$db = new mysqli("localhost", "root", "", "phonebook_db");
$db->query("SET NAMES 'utf8'");

if(isset($_POST['selection'])){
$title=$_REQUEST['title'];
$id=$_GET['id'];
$query="UPDATE  `list` SET title='$title' WHERE id=$id";
$res=$db->query($query);
if($res==false){
    echo $db->error;
}else{
    header("Location:listgroup.php");
    exit();
}

}





$query="SELECT * FROM `list`";
$res=$db->query($query);
if($res==false){
    echo $db->error;
}

 

$grouprow=$res->fetch_assoc();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
        <form action="" method="post">
            Group Name:<input type="text" name="title" value="<?php echo $grouprow['title']?>">
            <input type="submit" name="selection" value="edit">
            
            
        </form>
     
        
    </body>
</html>

