            $(".modalbutton").click(function () {
                $jsid = $(this).attr('id');
                var jqXHR = $.ajax({
                    async: false,
                    method: "POST",
                    url: "getBuildList.php",
                    dataType: 'JSON',
                    data: {id: $jsid}

                }

                );
                var array = JSON.parse(jqXHR.responseText);
                var modal = "";
                var zwischcon = "";
                $.each(array, function (key, value) {
                    zwischcon = "<a href=builder.php?id=" + value[1] + ">" + value[0] + "</a><br>";
                    modal = modal.concat(zwischcon);
                });


                $(".Output").html(modal);

            });


            //dowload all builds
            $("#downloadAll").click(function () {
                $.ajax({
                    type: 'post',
                    url: 'getAllBuilds.php',
                    success: function (response) {
                        console.log(response);
                        var builds = response.split("&&");
                        console.log(builds);
                        var zip = new JSZip();
                        $.each(builds, function (key, value) {
                            if (value == "")
                            {
                                return;
                            }
                            var splited = value.split("||");
                            json = splited[0];
                            championId = splited[1];
                            zip.folder(championId).folder("Recommended").file("itemsetbuilder" + key, json);
                        });
                        zip.file("Readme.txt", "Copy the folders  to your LoL folder \nexample: C:\\Riot Games\\League of Legends\\Config\\Champions ");
                        var content = zip.generate({type: "blob"});
// see FileSaver.js
                        saveAs(content, "Builds.zip");

                    }
                });
            });



