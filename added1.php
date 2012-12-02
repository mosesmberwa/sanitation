<html>
    <head>
    
            <title>
              Intervention and Approach Map
            </title>
            <link rel="stylesheet" type="text/css" href="css/sanit.css"/>
             
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://raw.github.com/mapstraction/mxn/master/source/mxn.js?(googlev3,[geocoder])" type="text/javascript"></script>
 

<script type="text/javascript">

	var marker;
    var infowindow;
    var mapstraction;
	var geocoder;

    function initialize() {
      var latlng = new google.maps.LatLng(-5.692516,34.73877);
      var options = {
        zoom: 6,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map_canvas"), options);
      var html = "<table>" +
                 "<tr><td>Approach Name:Mtumba</td> <td> </td> </tr>" +
                 "<tr><td>Name Of Organization:UCCI</td> <td> </td> </tr>" +
                 "<tr><td>Address:Dar Es Salaam</td> <td></td> </tr>" +
                 "<tr><td>Aim:Construct 10 Toilets</td> <td> </td></tr>" +
                 "<tr><td>People Targeted:Children</td> <td> </td> </tr>" +
                 "<tr><td>Period:3 weeks</td> <td> </td> </tr>" +
                 "<tr><td></td><td></td></tr>";
    infowindow = new google.maps.InfoWindow({
     content: html
    });
 
    google.maps.event.addListener(map, "click", function(event) {
        marker = new google.maps.Marker({
          position: event.latLng,
          map: map
        });
        google.maps.event.addListener(marker, "click", function() {
          infowindow.open(map, marker);
        });
    });
    }

    function saveData() {
      var name = escape(document.getElementById("name").value);
      var address = escape(document.getElementById("address").value);
      var type = document.getElementById("type").value;
      var latlng = marker.getPosition();
 
      var url = "phpsqlinfo_addrow.php?name=" + name + "&address=" + address +
                "&type=" + type + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();
      downloadUrl(url, function(data, responseCode) {
        if (responseCode == 200 && data.length <= 1) {
          infowindow.close();
          document.getElementById("message").innerHTML = "Location added.";
        }
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }
    
    function changetohybrid(){
		mapstraction.setMapType(mxn.Mapstraction.HYBRID);	
	}
    
    
    function user_submit() {
		var address = {};
		address = document.getElementById('address').value;
		geocoder.geocode(address);
	}

    

    function doNothing() {}
</script> 

    </head>
    <body style="margin:0px; padding:0px;" onload="initialize()">
        <!--display the top_view---->
        <div id="top">
            <table><tr>
                    
                    <td><div class="header_statement">SANITATION HACKATHON</div></td>
                    
                    <!---<td><div class="logo_chuo"><img  src="tele.png" alt ="telesphory" width="150" height="90"/></td> --->
                    </tr>
                    </table>
                    </div>
               
        
        <!---create the center body view --->
        <table width="970"><tr><td>
                    
                    <!------Display the home part--->
                    <div id="registr">
                            <div class="login">  login </div>                              
                           
                           
                           <?php
// Check if he wants to register:
session_start();
	require_once("connect.php");
	
	
	// Register him.
	$query = mysql_query("INSERT INTO details 
	( region,approach,intervention,period,type_community,size)
	VALUES ('$_POST[region]','$_POST[approach]','$_POST[intervention]','$_POST[period]','$_POST[type_community]','$_POST[size]')")
	or die ("Error - Couldn't enter details.");
	
	echo "<br><br>Details Has been successfully added!<br /><br />";
		exit();
?>

<a href="sanitHomepage.html">LOG OUT</a>
                           
                      </div>
                           
                           
                           
                           
                           
                           
                                    </td>
                                    <td>
                                        <!-----Display the login part------->
                                        <div id="ma_p"><div class="login">map</div>
                                                     <center>
                                             <div id="map_canvas" style="width: 610px; height: 430px"></div>
    <div id="message"></div>
                                             </center>
                	 <div class="search">
                          <form action="details.php" method="post">
                            <p align="right">
                          Search anything<input type="text" name="code_id" value="search here"/>  
                            
                          <input type="submit" name="submit" value="search"/>
                          </p>
                            </form>
                            </div>
                                                       
                                                      </div>
                                                  </td></tr></table>
                                        
                <div id="buttom_show"><div class ="footer">sanitationhackathon &copy 2012</div></div>  
    </body>
</html>

