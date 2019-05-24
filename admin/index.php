<?php
session_start();
if(!isset($_SESSION['admin'])){
	echo "<script> window.open('login.php','_self') </script>";
}
else{
include("includes/database.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="wrapper">
	<a href="insert.php">Insert Question</a>
	<a href="logout.php">Log out</a>
</div>
</body>
</html>
<?php
}
?>