<?php
	if(isset($_POST['search'])){
		$valueToSearch = $_POST['valueToSearch'];
		$query = "SELECT * FROM markers WHERE CONCAT(name, type) LIKE '%".$valueToSearch."%'";
		$search_result = filterTable($query);
	}
	else{
		$query = "SELECT name, info, latitude, longtitude, type FROM `markers`";
		$search_result = filterTable($query);
	}

    function filterTable($query){
		$connect = mysqli_connect("localhost", "root", "root", "guideme");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
?>
    <!DOCTYPE html >

    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Using MySQL and PHP with Google Maps</title>
        <style>
            /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
            
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            
            html,
            body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            table, tr, th, td{
            border: 1px solid black;
        }
        .name{
            color: green
        }
           .sidebar {
                position: absolute;
                width: 33.3333%;
                height: 100%;
                top: 0; left: 0;
                overflow: hidden;
                border-right: 1px solid rgba(0,0,0,0.25);
           }
           .heading {
                background: #fff;
                border-bottom: 1px solid #eee;
                height: 60px;
                line-height: 60px;
                padding: 0 10px;
            }
        </style>
    </head>

    <body>
       
            <form action="test.php" method="post">
            <input type="text" name="valueToSearch" placeholder="value To Search"><br><br>
            <input type="submit" name="search" placeholder="Filter"><br><br>
                <table>
                    <tr>
                        <th class="name">Name Of Place</th>
                        <th>Information</th>
                        <th>Latitude</th>
                        <th>Longtitude</th>
                        <th>Type</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($search_result)) :?>
                        <tr>
                            <td class="name"><?php echo $row['name']; ?></td>
                            <td><?php echo $row['info']; ?></td>
                            <td><?php echo $row['latitude']; ?></td>
                            <td><?php echo $row['longtitude']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                        </tr>
                    <?php endwhile ?>
                </table>
            </form>
        

        <div id="map"></div>

        <script>
            var customLabel = {
                restaurant: {
                    label: 'R'
                },
                bar: {
                    label: 'B'
                }
            };

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: new google.maps.LatLng(35.18021654094279, 128.10770460364094),
                    zoom: 12
                });
                var infoWindow = new google.maps.InfoWindow;

                // Change this depending on the name of your PHP or XML file
                downloadUrl('testing_markers.php', function(data) {
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName('marker');
                    Array.prototype.forEach.call(markers, function(markerElem) {
                        var name = markerElem.getAttribute('name');
                        var address = markerElem.getAttribute('info');
                        var type = markerElem.getAttribute('type');
                    
                        var point = new google.maps.LatLng(
                            parseFloat(markerElem.getAttribute('latitude')),
                            parseFloat(markerElem.getAttribute('longtitude')));
                

                        var infowincontent = document.createElement('div');
                        var strong = document.createElement('strong');
                        strong.textContent = name
                        infowincontent.appendChild(strong);
                        infowincontent.appendChild(document.createElement('br'));

                        var text = document.createElement('text');
                        text.textContent = address
                        infowincontent.appendChild(text);
                        var icon = customLabel[type] || {};
                        var marker = new google.maps.Marker({
                            map: map,
                            position: point,
                            label: icon.label
                        });
                        marker.addListener('click', function() {
                            infoWindow.setContent(infowincontent);
                            infoWindow.open(map, marker);
                        });
                    });
                });
            }



            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                    new ActiveXObject('Microsoft.XMLHTTP') :
                    new XMLHttpRequest;

                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        request.onreadystatechange = doNothing;
                        callback(request, request.status);
                    }
                };

                request.open('GET', url, true);
                request.send(null);
            }

            function doNothing() {}
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQo2Ivyy2OwvCb_HraA65-5mYW0t84rEI&callback=initMap">
        </script>
    </body>

    </html>