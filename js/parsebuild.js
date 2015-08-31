
//get build as json to parse it
var parameter = 'id=' + $_GET['id'];
var championId;
var json;
$.ajax({
    type: 'post',
    url: 'getBuild.php',
    data: parameter,
    success: function (response) {
         var splited= response.split("||");
         json=splited[0];
         championId=splited[1];
        var parsedjson = JSON.parse(json);
        $('#input_title').prop('disabled', true);
        $('#input_title').prop('placeholder', parsedjson['title']);
        parsedjson['blocks'].forEach(function (value)
        {
            var grouptitle = value['type'];

            var minlevel = "";
            var maxlevel = "";
                        var required = '<div id="dropzonesinfo" class="maincontent dropzone hero-spacer">\n\n\
                             <div class="input-group stretched">\n\n\
                           <span class="input-group-addon" id="textinfo" >Group Title</span>\n\n\
                            <input id="grouptitle"type="text" class="form-control" disabled placeholder="' + grouptitle + '" aria-describedby="sizing-addon2"></input>\n\n\
                        </div> ';
            if (value['minSummonerLevel'] != -1)
            {
                minlevel = value['minSummonerLevel'];
                minlevel = '<div class="input-group stretched">\n\n\
                            <span class="input-group-addon" id="textinfo">Minmal Level</span>\n\n\
                            <input id="minSummonerLevel"type="text" class="form-control" disabled placeholder="' + minlevel + '" aria-describedby="sizing-addon2">\n\n\
                       </div>\n\n\ ';

            }
            if (value['minSummonerLevel'] != -1)
            {
                maxlevel = value['maxSummonerLevel'];
                maxlevel = '<div class="input-group stretched">\n\n\
                            <span class="input-group-addon" id="textinfo">Max Level</span>\n\n\
                            <input id="maxSummonerLevel"type="text" class="form-control" disabled placeholder="' + maxlevel + '" aria-describedby="sizing-addon2">\n\n\
                        </div>\n\n\ ';

            }
            var showif = "";
            if (value['showIfSummonerSpell'] != null)
            {
                var summonere = value['showIfSummonerSpell'];
                showif = '<div class = "input-group stretched"> \n \n\
                <span class = "input-group-addon costume-blockleft"  id = "textinfo" > Show if summoner spell </span>\n  \n\
                <input id = "showIfSummonerSpell" disabled type = "text" class = "form-control" placeholder = "' + summonere + '" aria - describedby = "sizing-addon2"> \n\n\
                </div>\n\n\ ';

            }
            var required2 = '<div id = "dropzone" class = "maincontent dropzone hero-spacer" disabled> ';

var li="";
var json;
var json=$.ajax({
                       async:false,
                       url:'json/items.json',
                       type:'get',
                       data:{'GetConfig':'YES'},
                       dataType:"JSON"
                       }).responseJSON;
            
            value['items'].forEach(function (items)
            {
                var data=items['id'];
          li+="<li  draggable=\"true\" class=\"libuild\"id="+data+"><img class= \"img-rounded\"src=http://ddragon.leagueoflegends.com/cdn/5.16.1/img/item/"+json['data'][data]['image']['full']+"><p class=\"text-center\" id=\"name\">"+json['data'][data]['name']+" </p></li>\n";

            });
           var concated=required+minlevel+maxlevel+showif+required2+li+'</div></div>';
               $("#dropzones ").append(concated);

        });
    }
});

$('#downloadbuild').click(function ()
{
    var zip = new JSZip();
zip.folder(championId).folder("Recommended").file("itemsetbuilder"+ $_GET['id'], json);
zip.file("Readme.txt", "Copy the folder "+championId+ " to your LoL folder \nexample: C:\\Riot Games\\League of Legends\\Config\\Champions ");
var content = zip.generate({type:"blob"});
// see FileSaver.js
saveAs(content, "Build.zip");
});