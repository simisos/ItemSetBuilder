<?php
$json= file_get_contents("./json/items.json");
$parsed=json_decode($json, true);
$list="";
$ignore=array(2009,3043,3240,3241,3242,3243,3244,3245);//ids to ignore
foreach ($parsed['data'] as $value) {
    //getting idea
    $png=$value['image']['full'];
    $name=$value['name'];
    if(!in_array($name, $ignore))
    {
       
    $tags="";
    foreach ($value['tags'] as $tag) {
        $tags=$tags.$tag.";";
    }

    $id=substr($value['image']['full'],0,4);
   $list="<li  draggable=\"true\" class=\"libuild\"id=$id><img class= \"img-rounded\"src=http://ddragon.leagueoflegends.com/cdn/5.16.1/img/item/$png><p class=\"text-center\" id=\"name\">$name </p><p id=\"group\" class=\"hidden\">$tags</p></li>\n";
    echo $list;
    }
}

?>