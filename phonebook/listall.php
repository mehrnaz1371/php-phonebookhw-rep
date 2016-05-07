<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$db=new mysqli("localhost","root","","phonebook_db");

$result=$db->query("SELECT * FROM people");
$rowcontacts=$result->fetch_all(MYSQLI_ASSOC);

$q2="SELECT * FROM list";
$r=$db->query($q2);
$rowgroups=$r->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <table>
            <tr>
            <th>
                firstname</th>
            <th>lastname</th>
            <th>phonenum</th>
            <th>groupid</th>
            </tr>
      
        <?php
    
        echo "<tr>";
        
        foreach ($rowcontacts as $r){
            
            echo "<td>$r[firstname]</td>";
            echo "<td>$r[lastname]</td>";
            echo "<td>$r[phonenum]</td>";
            echo "<td>$r[groupid]</td>";
            
//            echo "<td><a href=delete.php?id=$r[id]>delete</a></td>";
//            echo "<td><a href=edit.php?id=$r[id]>edit</a></td>";
            echo"</tr>";
        }
        
        echo "<th>id";
        echo "</th>";
        
        echo "<th>title";
        echo "</th>";
        
           echo "<tr>";
         
         
           
           foreach ($rowgroups as $g){
       
            echo "<td>$g[id]</td>";
            echo "<td>$g[title]</td>";
            
         
           echo "</tr>";
         
             echo "<tr>";
        if($g['id']==$r['groupid']){
            echo "<td>$r[firstname]</td>";
            echo "</tr>";
        }
           
        }
      
      
       

          
          
        ?>
            
          
                  
            </form>
         
           
        </table>
        
    </body>
</html>

