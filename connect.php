
<?php

	// MySQL connect information.
	$c_username = "root";
	$c_password = "";
	$c_host = "localhost";
	$c_database = "sanitation";

	// Connect.
	$connection = mysql_connect($c_host,$c_username,$c_password)
	or die ("It seems this site's database isn't responding.");

	mysql_select_db($c_database)
	or die ("It seems this site's database isn't responding.");

?>