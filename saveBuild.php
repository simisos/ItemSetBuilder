<?php
require_once 'settings.php';

$db = mysqli_connect("$dbhost", "$dbusername", "$dbpassword","$dbname")or die(header('HTTP/1.1 500 Internal Server Error'));
$json_string = mysqli_real_escape_string($db,$_POST['json']);
$champion= $_POST['champion'];
$BuildName= $_POST['BuildName'];
$insert="INSERT INTO `TItemSets` (`ItemBuildName`,`ItemChampion`, `ItemBuild`) VALUES ('$BuildName','$champion', '$json_string')";
mysqli_query($db,$insert);
//getID to return to exicute function
$select="SELECT `ItemId` FROM `TItemSets` WHERE ItemBuild='$json_string'";
$result=mysqli_query($db,$select);

 $row=mysqli_fetch_assoc($result);
 
 echo $row['ItemId'];