<?php
session_start();
?>
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
                    
                    <td><div class="header_statement">SAN-IA MAPPER</div></td>
                    
                    <!---<td><div class="logo_chuo"><img  src="tele.png" alt ="telesphory" width="150" height="90"/></td> --->
                    </tr>
                    </table>
                    </div>
               
        
        <!---create the center body view --->
        <table width="970"><tr><td>
                    
                    <!------Display the home part--->
                    <div id="registr">
                            <?php
//if (!empty($_POST[sid]) && !empty($_POST[class3])){
    require_once("connect.php");


$getDetails = mysql_query("SELECT * FROM details WHERE region LIKE '$_POST[region]'")

 or die("Could not get details from Datababe");
 
     echo "<table style=\"width:100%;\"><tr>";
	 
	 echo "<td style=\"width: 13%; \">region: </td>
             <td style=\"width: 5%; \">Approach: </td>
             <td style=\"width: 5%; \">Intervention: </td>
             <td style=\"width: 5%; \">Period:</td>
             <td style=\"width: 5%; \">Type of Community:</td>
             <td style=\"width: 5%; \">Size:</td>"."<br/>";
	 
	 echo "</tr></table>";

     while($row=mysql_fetch_array($getDetails)){
	 
	 echo "<table style=\"width:100%;\"><tr>";
	 
	 echo "<td style=\"width: 13%; \">$row[region] </td>
         <td style=\"width: 5%; \">$row[approach]</td>
         <td style=\"width: 5%; \">$row[intervention]</td>
         <td style=\"width: 5%; \">$row[period]</td>
         <td style=\"width: 5%; \">$row[type_community]</td>
         <td style=\"width: 5%; \">$row[size]</td>"."<br/>";
	 
	 echo "</tr></table>";
	 
	 }
//}
 ?>

                           
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
                          <form action="detail.php" method="post">
                            <p align="right">
                          Search anything<input type="text" name="region" value="search here"/>  
                            
                          <input type="submit" name="submit" value="search"/>
                          </p>
                            </form>
                            </div>
                                                       
                                                      </div>
                                                  </td></tr></table>
                                        
                <div id="buttom_show"><div class ="footer">sanitationhackathon &copy 2012</div></div>  
    </body>
</html>









    