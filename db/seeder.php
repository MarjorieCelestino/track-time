<?php  

	$tasks = array (

            array (
                'name' => 'Task 001',
                'date' => '2018-05-22',
                'time' => '00:00:08',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sodales justo eu mauris tincidunt, id dignissim magna elementum. Sed euismod efficitur tortor eu facilisis.'
            ),

            array (
                'name' => 'Task 002',
                'date' => '2018-05-22',
                'time' => '00:10:08',
                'description' => 'Avocado'
            ),

            array (
                'name' => 'Task 003',
                'date' => '2018-05-22',
                'time' => '01:00:05',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sodales justo eu mauris tincidunt, id dignissim magna elementum. Sed euismod efficitur tortor eu facilisis. Proin augue nunc, luctus hendrerit velit sit amet, iaculis porta velit. In vulputate tristique urna. Praesent tempus ipsum augue, sit amet tristique lacus semper cursus.'
            ),

            array (
                'name' => 'Task 004',
                'date' => '2018-05-22',
                'time' => '00:32:00',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ),

            array (
                'name' => 'Task 005',
                'date' => '2018-05-22',
                'time' => '00:00:08',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sodales justo eu mauris tincidunt, id dignissim magna elementum.'
            ),

             array (
                'name' => 'Task 006',
                'date' => '2018-05-23',
                'time' => '00:00:50',
                'description' => 'Avocado'
            ),

            array (
                'name' => 'Task 007',
                'date' => '2018-05-23',
                'time' => '00:08:08',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sodales justo eu mauris tincidunt, id dignissim magna elementum. Sed euismod efficitur tortor eu facilisis.'
            ),

            array (
                'name' => 'Task 008',
                'date' => '2018-05-24',
                'time' => '00:00:08',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ),

            array (
                'name' => 'Task 009',
                'date' => '2018-05-24',
                'time' => '01:50:03',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sodales justo eu mauris tincidunt, id dignissim magna elementum. Sed euismod efficitur tortor eu facilisis.'
            ),

            array (
                'name' => 'Task 010',
                'date' => '2018-05-25',
                'time' => '00:04:08',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ),

            array (
                'name' => 'Task 011',
                'date' => '2018-05-25',
                'time' => '00:00:08',
                'description' => 'Avocado'
            ),

            array (
                'name' => 'Task 012',
                'date' => '2018-05-26',
                'time' => '00:00:01',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sodales justo eu mauris tincidunt, id dignissim magna elementum. '
            )

        ); 
?>

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

            foreach ($tasks as $task) {
                
                $name = $task['name'];
                $date = $task['date'];
                $time = $task['time'];
                $description = $task['description'];

                $sql = "INSERT IGNORE INTO tasks (name, end_date, end_time, description) VALUES ('$name', '$date', '$time', '$description')";

                if ($db_connect->query($sql)) {
                    
                    echo $name . " inserted successfully " . "<br><br>";
                }else{

                    echo "Unable to insert " . $name . "<br>";
                    echo mysqli_error($db_connect) . "<br><br>";
                }

                echo '<br>';
            }
        }

        $db_connect->close();
?>