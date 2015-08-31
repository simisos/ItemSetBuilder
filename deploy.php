<?php
require_once 'settings.php';
$sql="CREATE TABLE IF NOT EXISTS `TItemSets` (
  `ItemId` double PRIMARY KEY AUTO_INCREMENT,
  `ItemBuildName` varchar(30) NOT NULL,
  `ItemChampion` varchar(30) NOT NULL,
  `ItemBuild` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `titemsets` ADD INDEX(`ItemId`);
";

$db = mysqli_connect("$dbhost", "$dbusername", "$dbpassword")or die("Error " . mysqli_error($db));

if(mysqli_query($db,"

CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET = utf8 COLLATE = utf8_general_ci;
"))
  $db = mysqli_connect("$dbhost", "$dbusername", "$dbpassword","$dbname")or die("Error " . mysqli_error($db));      

if(mysqli_multi_query($db,$sql  
))
        {
            echo "DB set up ";
             echo "<br>You should delete this file for security reasons ";

        }
       else
           
       {
                   printf("Error: %s\n", mysqli_error($db));
       }
       
       mysqli_close($db);

?>
