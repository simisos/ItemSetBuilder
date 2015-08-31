<?php
require_once 'head.php';

$edit = true;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $edit = false;
}
?>  

<body>
    <?php    require_once 'navbar.php'; ?>
    <div <?php
    if ($edit) {
        echo 'id="wrapper"';
    }
    ?>>
            <?php
            require_once 'sidebar.php';
            ?>



        <!-- Page Content -->
        <div <?php
        if ($edit) {
            echo 'id="builder"';
        } else {
            echo 'id="buildernoedit"';
        }
        ?> class="container own-content page-content mainborder hero-spacer">
            <div id="settings" class="maincontent">


                <?php
                if (!$edit) {
                    echo '<button class="btn btn-default" type="submit" id="downloadbuild"> Download </button>';
                    echo '<script src="js/jszip.min.js"></script>';
                    echo '<script src="js/FileSaver.min.js"></script>';
                }
                echo'            <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2">Title*</span>
                    <input id="input_title" type="text" class="form-control" placeholder="Title" aria-describedby="sizing-addon2">
                </div>   ';

                if ($edit) {
                    echo '
                <div class="radio">
                    <label><input type="radio" name="map" value="any"> Any</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="map" value="SR"> 5vs5 (Summoners Rift)</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="map" value="TT"> 3vs3 (Twisted Treeline)</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="map" value="HA"> ARAM (Howling Abyss)</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="map" value="CS"> Dominion (Crystal Scare)</label>
                </div>';
                } else {
                    
                }
                echo "</div><div id=\"dropzones\">";
                if ($edit) {
                    echo '

                <div id="dropzonesinfo" class="maincontent dropzone hero-spacer">
                    <div class="input-group stretched">
                        <span class="input-group-addon" id="textinfo" >Group Title*</span>
                        <input id="grouptitle"type="text" class="form-control" placeholder="Group Title*" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group stretched">
                        <span class="input-group-addon" id="textinfo">Minmal Level</span>
                        <input id="minSummonerLevel"type="text" class="form-control" placeholder="Minimal Level" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group stretched">
                        <span class="input-group-addon" id="textinfo">Max Level</span>
                        <input id="maxSummonerLevel"type="text" class="form-control" placeholder="Maximal Level" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group stretched">
                        <span class="input-group-addon costume-blockleft" id="textinfo">Show if summoner spell</span>
                        <select id=summonerselect" class="form-control">
                            <option value=""> </option>
                            <option value="SummonerFlash">Flash</option>
                            <option value="SummonerDot">Ignite</option>
                            <option value="SummonerHeal">Heal</option>
                            <option value="SummonerSmite">Smite</option>
                            <option value="SummonerExhaust">Exhaust</option>
                            <option value="SummonerTeleport">Teleport</option>
                            <option value="SummonerHaste">Ghost</option>
                            <option value="SummonerBarrier">Barrier</option>
                            <option value="SummonerBoost">Cleanse</option>
                            <option value="SummonerMana">Clarity</option>
                            <option value="SummonerClairvoyance">Clairvoyance</option>
                            <option value="SummonerSnowball">Mark</option>
                            <option value="SummonerOdinGarrison">Garrison</option>
                        </select>   </div>
                    <div class="checkbox">
                        <label>
                            <input  id="RecMath" value="RecMath" type="checkbox"> RecMath
                        </label>
                    </div>
                    <div id="dropzone" class="maincontent dropzone hero-spacer">
                    </div>
                </div>
           ';
                }
                ?>
            </div>        

            <?php
            if ($edit) {
                echo '
                <button id="addropzone" type="button" class="btn btn-default  btn-xs">Add a new group</button>
                <button id="save" type="button" class="btn btn-default  btn-xs">Save</button>';
            }
            ?>

        </div>
    </div>
    <?php
    if ($edit) {
        echo '
                        <div id="bin" class="mainborder"> 
            <i class="glyphicon glyphicon-trash"></i>
        </div>   ';
    }
    require_once 'footer.php';
    ?>
  


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/Sortable.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script> 
<script src="js/phpvariable.js"></script> ^
<?php
if ($edit) {
    echo '<script src="js/builder.js"></script>';
} else {
    echo '<script src="js/parsebuild.js"></script>';
}
?>
</body>
</html>