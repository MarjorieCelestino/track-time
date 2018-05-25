<?php 

    //DB connection
    $server = 'localhost';
    $user = 'root';
    $password = 'root';
    $db_name = 'time_tracker';
    $port = '8889';

    $db_connect = new mysqli($server,$user,$password,$db_name,$port);
    mysqli_set_charset($db_connect,"utf8");

    if ($db_connect->connect_error) {
        echo 'Error: ' . $db_connect->connect_error;
    } else {
        echo 'Connected' . '<br><br>';

      $sql = "CREATE TABLE IF NOT EXISTS tasks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR (100) NOT NULL,
                end_date DATE NOT NULL,
                end_time VARCHAR (10) NOT NULL,
                description VARCHAR (500) NOT NULL
                )";
      
      if ($db_connect->query($sql) === true) {
        echo "Table created";
      } else {
          echo "Error creating table: " . $conn->error;
      }
    }
    
    $db_connect->close();
?>