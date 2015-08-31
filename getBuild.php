<?php
require_once 'settings.php';
$db = mysqli_connect("$dbhost", "$dbusername", "$dbpassword","$dbname")or die(header('HTTP/1.1 500 Internal Server Error'));
$id=$_POST['id'];
$select="SELECT `ItemBuild`, `ItemChampion` FROM `TItemSets` WHERE `ItemId`=$id";
$result=mysqli_query($db,$select);
 $row=mysqli_fetch_assoc($result);
echo $row['ItemBuild']."||".$row['ItemChampion'];