
var filtergroups = [];
clearfilter();
filter();
var resizewidth = 500;
$('#sidebarcollaps').on('shown.bs.offcanvas', function (e) {
//$('#sidebarcollaps').offcanvas({autohide: false});
    resizewidth = 700;
    adjustBuilderWidth();
});

$('#sidebarcollaps').on('hidden.bs.offcanvas', function (e) {
//$('#sidebarcollaps').offcanvas({autohide: false});
    resizewidth = 500;
    adjustBuilderWidth();
});
var el = document.getElementById('buildbar');
var sortable = new Sortable(el, {
    group: {
        name: 'items',
        pull: 'clone',
        put: false,
    }, // or { name: "...", pull: [true, false, clone], put: [true, false, array] }

    sort: false, // sorting inside list
    delay: 0, // time in milliseconds to define when the sorting should start
    animation: 150, // ms, animation speed moving items when sorting, `0` — without animation
    filter: "#bin", // Selectors that do not lead to dragging (String or Function)
    dataIdAttr: 'data-id',
    scroll: true, // or HTMLElement
    scrollSensitivity: 30, // px, how near the mouse must be to an edge to start scrolling.
    scrollSpeed: 10, // px



});
var el2 = document.getElementById('dropzone');
var sortable2 = new Sortable(el2, {
    group: {
        name: 'items',
        pull: true,
        put: true,
    }
});
var el3 = document.getElementById('bin');
var sortable3 = new Sortable(el3, {
    group: {
        name: 'items',
        pull: false,
        put: true,
    },
    onAdd: function (/**Event*/evt) {
        evt.item.remove();  // dragged HTMLElement
        // + indexes from onEnd
    }

});





function filter()
{
    $("#srch-term").val();
    var inputValue = document.getElementById('srch-term').value.toLowerCase();
    $('#buildbar li').each(function () {
        var show = false;
        var group = jQuery("p", this);
        var name = group[0].innerHTML.toLowerCase();
        var groupstr = group[1].innerHTML;
        var groups = groupstr.split(";");
        if (inputValue === "")
        {
            show = true;
        }
        if (name.indexOf(inputValue) > -1)
        {
            show = true;
        }

        var showfilter = filtergroups.every(function (val) {
            return groups.indexOf(val) >= 0;
        });



        if (show && showfilter)
            this.style.display = "block"
        else {
            this.style.display = "none";
        }
    });
}

$("#closesidebar").click(function () {
    $(".offcanvas").offcanvas('toggle');
});
$("#clearfilters").click(function ()
{
    clearfilter();
});
function clearfilter()
{
    $('input[type=checkbox]').each(function () {
        if (this.id === "filter")
        {
            this.checked = false;
        }
    });
    filtergroups.length = 0
    filter();
}


$('input[type=checkbox]').click(function () {
    filtergroups.length = 0;
    $('input[type=checkbox]').each(function () {
        if (this.id === "filter")
        {
            if (this.checked) {
                filtergroups.push(this.value);
            }
        }
    })
    filter();
    ;
});
$("#srch-term").keyup(function () {//searching for groups and stuff
    filter();
});

$("#addropzone").click(function () {
    var s = '<div id=\"dropzones\">\r\n\r\n                <div id=\"dropzonesinfo\" class=\"maincontent dropzone hero-spacer\">\r\n                    <div class=\"input-group stretched\">\r\n                        <span class=\"input-group-addon\" id=\"textinfo\" >Group Title*<\/span>\r\n                        <input id=\"grouptitle\"type=\"text\" class=\"form-control\" placeholder=\"Group Title*\" aria-describedby=\"sizing-addon2\">\r\n                    <\/div>\r\n                    <div class=\"input-group stretched\">\r\n                        <span class=\"input-group-addon\" id=\"textinfo\">Minmal Level<\/span>\r\n                        <input id=\"minSummonerLevel\"type=\"text\" class=\"form-control\" placeholder=\"Minimal Level\" aria-describedby=\"sizing-addon2\">\r\n                    <\/div>\r\n                    <div class=\"input-group stretched\">\r\n                        <span class=\"input-group-addon\" id=\"textinfo\">Max Level<\/span>\r\n                        <input id=\"maxSummonerLevel\"type=\"text\" class=\"form-control\" placeholder=\"Maximal Level\" aria-describedby=\"sizing-addon2\">\r\n                    <\/div>\r\n                    <div class=\"input-group stretched\">\r\n                        <span class=\"input-group-addon costume-blockleft\" id=\"textinfo\">Show if summoner spell<\/span>\r\n                        <select id=summonerselect\" class=\"form-control\">\r\n                            <option value=\"\"> <\/option>\r\n                            <option value=\"SummonerFlash\">Flash<\/option>\r\n                            <option value=\"SummonerDot\">Ignite<\/option>\r\n                            <option value=\"SummonerHeal\">Heal<\/option>\r\n                            <option value=\"SummonerSmite\">Smite<\/option>\r\n                            <option value=\"SummonerExhaust\">Exhaust<\/option>\r\n                            <option value=\"SummonerTeleport\">Teleport<\/option>\r\n                            <option value=\"SummonerHaste\">Ghost<\/option>\r\n                            <option value=\"SummonerBarrier\">Barrier<\/option>\r\n                            <option value=\"SummonerBoost\">Cleanse<\/option>\r\n                            <option value=\"SummonerMana\">Clarity<\/option>\r\n                            <option value=\"SummonerClairvoyance\">Clairvoyance<\/option>\r\n                            <option value=\"SummonerSnowball\">Mark<\/option>\r\n                            <option value=\"SummonerOdinGarrison\">Garrison<\/option>\r\n                        <\/select>   <\/div>\r\n                    <div class=\"checkbox\">\r\n                        <label>\r\n                            <input  id=\"RecMath\" value=\"RecMath\" type=\"checkbox\"> RecMath\r\n                        <\/label>\r\n                    <\/div>\r\n                    <div id=\"dropzone\" class=\"maincontent dropzone hero-spacer\">\r\n                    <\/div>\r\n                <\/div>\r\n            <\/div> ';
    $("#dropzones").append(s);
    var lastDropzone = $("#dropzones").children().last().children().last().children().last()[0];
    new Sortable(lastDropzone, {
        group: {
            name: 'items',
            pull: true,
            put: true
        }
    });


});

$('#save').click(function () {
    //getsettings
    var json = {};
    var title = $('#input_title').val();
    var map = "any";
    map = $('input[name=map]:checked', '#settings').val();
    json['title'] = title;
    json['type'] = "custome";
    json['map'] = map;
    json['mode'] = "any";
    json['blocks'] = [];
    var error = false;
    if (title == "")
    {
        alert("Please set a Title");

        return;
    }
    $('#dropzones > #dropzonesinfo').each(function () {
        var blocktemp = {};
        blocktemp['type'] = jQuery(this).find('#grouptitle').val();
        if (blocktemp['type'] == "")
        {
            error = true;
        }
        blocktemp['minSummonerLevel'] = getValue(jQuery(this).find('#minSummonerLevel').val());
        blocktemp['maxSummonerLevel'] = getValue(jQuery(this).find('#maxSummonerLevel').val());
        blocktemp['showIfSummonerSpell'] = $("#summonerselect ").val();
        blocktemp['recMath'] = jQuery(this).find('#RecMath').is(':checked');
        blocktemp['items'] = [];
        jQuery(this).find('#dropzone li ').each(function () {
            var itemtemp = {};
            itemtemp['id'] = $(this)[0].id;
            itemtemp['count'] = 1;
            blocktemp.items.push(itemtemp);
        });
        json.blocks.push(blocktemp);
    });
    var champion = $_GET['Champion'];
    if (champion == null || error == true)
    {
        if (champion == null) {
            alert("Error: Couldnt save Build, illegal ChampionName");
        }
        else {
            alert("You need to set a Group Title");
        }
    }

    else {

        var jsonString = JSON.stringify(json);
        var data = 'json=' + jsonString + '&champion=' + champion + '&BuildName=' + json['title'];
        $.ajax({
            type: 'post',
            url: 'saveBuild.php',
            data: data,
            success: function (response) {
             document.location.href = 'builder.php?id=' + response;
            }
        });
    }
});

function getValue(value) {
    var parsed = -1;
    var parsed = parseInt(value);
    if (isNaN(parsed))
    {
        parsed = -1;

    }
    return parsed;
}


var adjustBuilderWidth = function () {
    var calcWidth = window.innerWidth - resizewidth;
    $('#builder').css('width', calcWidth + 'px');
}

adjustBuilderWidth();
$(window).resize(adjustBuilderWidth);

