<?php		
             
			 
			require_once("connect.php");
			$type = $_POST['type'];
			
		    $username = $_POST['username'];
			
			$code = $_POST['code'];
			
			$email = $_POST['email'];
			
			$password = $_POST['password'];
			
			//require_once("connect.php");
			//insert into database,....strlen($str)
			
			
			$sql = "INSERT INTO users (type,username,code,email,password) VALUES ('$type','$username','$code','$email','$password')";
            $query=mysql_query($sql);
 
?>