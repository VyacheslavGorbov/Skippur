<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <title>Welcome</title>

    <style>
        #siteLocationMap {
            margin: 0 auto;
            height: 500px;
            width: 750px;
        }

        h3 {
            text-align: center;
        }

        nav {
            text-align: center;
        }
        
        #searchInput {
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Customer Landing Page</h1>
    <nav>
        <a href="/customer/profile">Profile</a> |
        <a href="/customer/messages">Messages</a> |
        <a href="/customer/appointments">My Appointments</a>
    </nav>
    </br>
    </br>
    <div id='searchInput'>
        <input id='searchBox' type="textbox" placeholder="Enter your address ..." />
        <button onclick="search()">Search</button>
        <button>Advanced Search</button>
    </div>

    <nav class="crumbs">

        <h3>Sites</h3>

        <div id="siteLocationMap"></div>

        <script>
            var sitesJSON = JSON.parse('<?php echo json_encode($data["sites"]); ?>');
            var sites = jsonToArr(sitesJSON);


            var mymap = L.map('siteLocationMap').setView([0, 0], 1);
            const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
            const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const tiles = L.tileLayer(tileUrl, {
                attribution
            });
            tiles.addTo(mymap);

            function jsonToArr(jsonData) {
                result = [];

                for (var i in jsonData)
                    result.push([i, jsonData[i]]);

                return result;
            }


            function search() {
                var userAddress = document.getElementById("searchBox").value.replace(/\s+/g, '+');

                let requestUrl = 'https://nominatim.openstreetmap.org/search?q=' + userAddress + '&format=json';
                let request = new XMLHttpRequest();
                request.open('GET', requestUrl, false);
                request.onload = function() {
                    const resp = JSON.parse(request.response);
                    mymap.setView([resp[0].lat, resp[0].lon], 13);
                }
                request.send();
                addMarkers();
            }

            function addMarkers() {
                sites.forEach(site => {
                    var marker = L.marker([site[1].site_latitude, site[1].site_longitude]).addTo(mymap);
                    marker.bindPopup(
                        "<b>" + site[1].business_name + "</b>" + 
                        "<br>" + site[1].site_address + 
                        "<br>" + site[1].site_postal_code + 
                        "<br>" + site[1].site_phone_number + 
                        "<br>" + '<a href="/customer/viewHomepage/' + site[1].site_id + '">Visit Page</a>');
                });
            }
        </script>

        <a href='/home/logout'>Logout</a>

</body>

</html>