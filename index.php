<!DOCTYPE html>
<html>


    <?php
    require_once 'head.php'
    ?>   


    <body>
        <?php require_once 'navbarindex.php'; ?>
        !-- /.container -->
    </nav>

    <?php
    $json = file_get_contents("json/Champion.json");
    $parsed = json_decode($json, true);
    $list = "";
    echo("<br>");
    echo("<br>");
    echo("<br>");
    echo("<div class='container'>");
    echo("<ul class='row'>");
    echo("<ul style='list-style-type:none'>");
    echo("<form action = 'builder.php' method='get'>");
    foreach ($parsed['data'] as $value) {
        //path to image / champion id
        $png = $value['id'] . ".png";
        $id = $value['id'];
        echo("<li class= 'nopadding col-lg-2 col-md-2 col-sm-3 col-xs-4 mainborder'><img class=\"img-responsive center-block\" src = http://ddragon.leagueoflegends.com/cdn/5.16.1/img/champion/" . $png . "><p align='center'>$id</p><div class=\"btn-group buttoncentered\" role=\"group\"><button class='btn btn-default btn-s' type='submit'  value=" . $id . " name='Champion' > Create </button> <button type='button' id=$id  class='modalbutton btn btn-primary' data-toggle='modal' data-target='#myModal$id'>Show Builds</button></div></li>");
        echo("<div id='myModal$id' class='modal fade' role='dialog'><div class='modal-dialog'>");
        echo("<div class='modal-content'>
                <div class='modal-header'>
                <button type='button'  class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>$id Builds</h4>
                </div>
                <div class='modal-body'>
                <p>These are the Builds availiable for $id: 
                <div class='Output'>
                </div>
                </p>
                <br>
               </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                </div>
                </div>
                 </div>
                </div>");
    }
    ?>



</ul>

</form
</ul>
</div>
<?php require_once 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
<script src="js/jszip.min.js"></script>
<script src="js/FileSaver.min.js"></script>
<script src="js/index.js"></script>


</body>
</html>
