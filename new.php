<?php  
session_start();

require_once("connect.php");
// Check if he wants to login:
$email = "email";
$password = "password";

if (!empty($_POST[$email]))
{
	

	// Check if he has the right info.
	$query = mysql_query("SELECT * FROM users
							WHERE email = '$_POST[email]'
							AND password = '$_POST[password]'")
	or die ("Error.");
	
	$row = mysql_fetch_array($query)
	or die ("Error - Couldn't login user.");
	
	if (!empty($row[email])) // he got it.
	{
		if ($row[level] == 1) {
		$_SESSION[email] = $row[email];
		$_SESSION[id] = $row[id];
		header("Location: member.php");
		}
		if ($row[level] == 2) {
		$_SESSION[email] = $row[email];
		$_SESSION[id] = $row[id];
		header("Location: member.php");
		}
		
	}
	else // bad info.
	{
		
		echo "Error2 - Couldn't login user.<br /><br />";
		echo "Please try again.";
		exit();
	}
}
?> 