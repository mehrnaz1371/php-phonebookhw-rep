<?php
$db=new mysqli("localhost","root","","phonebook_db");
$db->query("SET NAMES 'UTF8'");
$query2 = "SELECT * FROM list";
$res2 = $db->query($query2);
$groups = $res2->fetch_all(MYSQLI_ASSOC);
if($_SERVER['REQUEST_METHOD']=="POST"){
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$phonenum=$_REQUEST['phonenum'];
$mobilenum=$_REQUEST['mobilenum'];
$group=$_REQUEST['groups'];
$res=$db->query("INSERT INTO `people` SET firstname='$firstname',lastname='$lastname',phonenum='$phonenum',mobilenum='$mobilenum',groupid='$group'");
if($res===false){
    echo $db->error;
}
else{
    header("Location:index.php");
    exit();
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
            <table>
                <tr>
                    <td>
                        First Name:<input type="text" name="firstname" ></td></tr>
                <tr><td>
                        Last Name:<input type="text" name="lastname"></td></tr>
                <tr><td>
                        Phone Number:<input type="text" name="phonenum"></td></tr>
                <tr><td>
                        Mobile Number:<input type="text" name="mobilenum"></td></tr>
                <tr><td>
                        Groups:<select name="groups">
                            <?php
                            foreach ($groups as $g){
                                echo "<option value='$g[id]'>$g[title]</option>";
                            
                            }
                            
                                    ?>
                        </select>
                    </td></tr>    
                <tr><td>
                    <input type="submit" value="add">
                    </td></tr>
                    
        </form>
</table>
    </body>
</html>

