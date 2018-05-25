<?php  
	//DB connection
	$server = 'localhost';
    $user = 'root';
    $password = 'root';
    $db_name = 'time_tracker';
    $port = '8889';

    $db_connect = new mysqli($server,$user,$password,$db_name,$port);
    mysqli_set_charset($db_connect,"utf8");

?>