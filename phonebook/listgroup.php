<?php
$db=new mysqli("localhost","root","","phonebook_db");
$db->query("SET NAMES 'UTF8'");


$query="SELECT id,title FROM `list`";
$res=$db->query($query);
if($res==false){
    echo($db->error);
}
$groupitems=$res->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
      
        <ul>
        <?php
        echo "<h2>Group List:</h2>";
        foreach ($groupitems as $g){
            
            echo "<li>";
            
            echo "$g[title]";
            
            echo "<a href='editgroup.php?id=$g[id]'>-edit</a>          ";
            echo "<td><a href='shownumgroup.php?id=$g[id]'>    num of this group:</a></td>";
            
          
            echo "</li>";
         
            
           
            
        }
        
        ?>
        </ul>
        <a href="index.php">home</a>
        <a href="addgroup.php">add</a>
        
        
    </body>
</html>
