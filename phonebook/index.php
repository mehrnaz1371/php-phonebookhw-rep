<?php
$db=new mysqli("localhost","root","","phonebook_db");
$db->query("SET NAMES 'UTF8'");



$res=$db->query("SELECT * FROM `people`");
if($res===false){
    $db->error;
}
$contacts=$res->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      
        <a href="addgroup.php"><strong>Add Group</strong></a>
        <a href="listgroup.php"><strong>Group List</strong></a>
     
        <table >
            
            <caption><strong>PhoneBook</strong></caption>
            <tr>
            <th>contacts</th>
            <th>actions</th>
            
            </tr>
            
        <?php
        echo "<tr>";
        foreach ($contacts as$c){
             echo "<td><a href='list.php?id=$c[id]'>$c[firstname]    $c[lastname]</a></td>";
             echo "<td><a href='delete.php?id=$c[id]'>delete</a></td>";
             echo "<td><a href='edit.php?id=$c[id]'>edit</a></td>";
      
             
             echo "</tr>";
        }
       

        ?>
        </table>
        <a href="add.php"><strong> add new contact </strong></a>
      
     
    </body>
</html>
