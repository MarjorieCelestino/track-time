<!DOCTYPE html>

<html>

	<head>
		<title>Home</title>

		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,400" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/scripts.js"></script>

	</head>

	<body>

		<?php 
			//DB Connection 
			require_once('db/db_connect.php');
		?>

		<div id="navigation" class="navigation">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="tasks.php">Tasks</a></li>
				<li id="menu-icon" class="menu-icon" onclick="openNav()">&#9776;</li>
			</ul>
		</div>