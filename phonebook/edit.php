<?php
$db=new mysqli("localhost","root","","phonebook_db");
$db->query("SET NAMES 'UTF8'");
$query2 = "SELECT * FROM list";
$res2 = $db->query($query2);
$groups = $res2->fetch_all(MYSQLI_ASSOC);
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=(int)$_REQUEST['id'];
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$phonenum=$_REQUEST['phonenum'];
$mobilenum=$_REQUEST['mobilenum'];
$group=$_REQUEST['groups'];
$res=$db->query("UPDATE  `people` SET firstname='$firstname',lastname='$lastname',phonenum='$phonenum',mobilenum='$mobilenum',groupid='$group' WHERE id=$id");
if($res===false){
    echo $db->error;
}
else{
    header("Location:index.php");
    exit();
}
}
 $id=(int)$_REQUEST['id'];
$res=$db->query("SELECT * FROM people WHERE id=$id");
if($res===false){
    echo $db->error;
}
$contacts=$res->fetch_assoc();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        First Name:<input type="text" name="firstname" value="<?php echo $contacts['firstname']?>"></td></tr>
                <tr><td>
                        Last Name:<input type="text" name="lastname" value="<?php echo $contacts['lastname']?>"></td></tr>
                <tr><td>
                        Phone Number:<input type="text" name="phonenum" value="<?php echo $contacts['phonenum']?>"></td></tr>
                <tr><td>
                        Mobile Number:<input type="text" name="mobilenum" value="<?php echo $contacts['mobilenum']?>"></td></tr>
                <tr><td>
                        Groups:<select name="groups">
                            <?php
                            foreach ($groups as $g){
                                if($contacts['groupid']==$g['id']){
                                     $s = "selected";
                                }
                                else{
                                    $s="";
                                }
                                
                                echo "<option $s value='$g[id]'>$g[title]</option>";
                            
                            }
                            
                                    ?>
                        </select>
                    </td></tr>    
                <tr><td>
                    <input type="submit" value="edit">
                    </td></tr>
                    
        </form>
</table>
    </body>
</html>

