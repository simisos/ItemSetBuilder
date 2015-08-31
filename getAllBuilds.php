<?php

require_once 'settings.php';
$db = mysqli_connect("$dbhost", "$dbusername", "$dbpassword","$dbname")or die(header('HTTP/1.1 500 Internal Server Error'));
$select="SELECT `ItemBuild`, `ItemChampion` FROM `TItemSets`";
$result=mysqli_query($db,$select);
 while($row=mysqli_fetch_assoc($result))
 {
echo $row['ItemBuild']."||".$row['ItemChampion']."&&";
 }