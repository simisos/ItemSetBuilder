
<?php

require_once 'settings.php';
$finid = $_POST['id'];
$end = [];
$dbmy = mysqli_connect("$dbhost", "$dbusername", "$dbpassword", "$dbname")or die(
        header('HTTP/1.1 500 Internal Server Error'));
$title = mysqli_query($dbmy, "SELECT ItemBuildName, ItemId FROM TItemSets WHERE ItemChampion='$finid'");

while ($zeile = mysqli_fetch_array($title, MYSQL_NUM)) {

    $end[] = $zeile;
}
echo json_encode($end);
?>
