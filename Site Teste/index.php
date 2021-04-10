<?php
include_once 'bar.php';
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location: login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link href = "index.css" rel = "stylesheet"/>
    <title>Inicial</title>
</head>
<body>
</body>
</html>
