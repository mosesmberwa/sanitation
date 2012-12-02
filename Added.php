<html>
    <head>
    
            <title>
              
            </title>
            <link rel="stylesheet" type="text/css" href="css/sanit.css"/>
             <title>Mapstraction Examples - Google v3</title>

<style type="text/css">

	#mapdiv {
		height: 400px;
	}

</style> 



    </head>
    <body onload="initialize();">
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
                            <div class="login">  Home </div>                              
                           
                           
                            </div>
                      </div>
                           
                           
                           
                           
                           
                           
                                    </td>
                                    <td>
                                        <!-----Display the login part------->
                                        <div id="ma_p"><div class="login">Report</div>
                                             <center>
		<table  width='100%'>
			<tr>
				<td><div id="mapdiv"><?php
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
?></div></td>
			
			
		</table>
		
		<div id="position"></div>	
	</center>
                                                  </td></tr></table>
                                        </div>
                                    </td>
                                    </tr>
                                    </table>
     <div id="buttom_show"><div class ="footer">sanitationhackathon &copy 2012</div></div>  
    </body>
</html>

