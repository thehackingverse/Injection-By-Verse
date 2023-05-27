<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn) {
	die("Unable to connect");
}
if($_GET) {
	$uname = $_GET["username"];
	$pass = $_GET["password"];
	$id = $_GET["id"];
    $uname = mysqli_real_escape_string($conn, $uname);//test' or 1=1
	$pass = mysqli_real_escape_string($conn, $pass);
	$sql = "SELECT * FROM users WHERE username = '$uname'  AND password = '$pass'";
	$sql = "SELECT * FROM users WHERE username = '$id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1) {
		header("Location: welcome.php");
	} else {
		echo "Incorrect Username/Password";
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Sqlinjection lab</title>
	<style type="text/css">
		input[type=text],input[type=password] {
			padding: 16px;
			margin: 8px;
			border: 1px solid #f1f1f1;
			letter-spacing: 1px;
			border-radius: 3px;
			width: 240px;
		}
		input[type=submit] {
			margin-left: 8px;
			width: 274px;
			border-radius: 3px;
			border: 1px solid #4285f4;
			background-color: #4285f4;
			padding: 16px;
			color: white;
			font-weight: 600;
			cursor: pointer;
		}
		input[type=button] {
			margin-left: 8px;
			width: 274px;
			border-radius: 3px;
			border: 1px solid #4285f4;
			background-color: #FFD700;
			padding: 16px;
			color: white;
			font-weight: 600;
			cursor: pointer;
		}
		body{
             
			height: 100%;
            
			background-image:url('spaceinjection.gif');
            background-repeat:no-repeat;
            background-size: cover;
			background-position: center;
		}
		h1{

			color:white;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}


		.hide {
  display: none;
}
    
.myDIV:hover + .hide {
  display: block;
  color: white;
}
	</style>
</head>
<body>
    <br><br>
    <br>
	<center><h1>Welcome to  sql injection lab.<h1></center>
    <br>
    <br>
    <br>

    <br>
	<br>
    <br><br>
    <br>
	<br>
    <br>
	<center><h1>Login Panel</h1></center>
	<center><form action method="GET" autocomplete="off">
		<input type="text" name="username" placeholder="Username" /><br />
		<input type="password" name="password" placeholder="password" /><br />
		<input type="submit" name="login" value="LOGIN" />
	</form></center>
	<br>
	<br>
	<center><div class="myDIV"><input type="button" name="hint" value="Hint"></div>
    <div class="hide">Use your power of hacking tool .</div></center>

</body>
</html>