<?php include 'header.php'; ?>

	<div class="main">
		<div class="time">
			<h1 id="clock"><time>00:00:00</time></h1>
		</div>
		<div class="time-actions">
			<a id="start" href="#start" onclick="startClock(); hideFeedback();">
				<img class="icons" src="images/play.png" alt="start">
			</a>
			<a id="pause" href="#pause" onclick="pauseClock(); hideFeedback();">
				<img class="icons" src="images/pause.png" alt="pause">
			</a>
			<a id="stop" href="#resume" onclick="clearClock(); hideFeedback();">
				<img class="icons" src="images/resume.png" alt="resume">
			</a>
			<a href="#new-task" onclick="displayForm(); hideFeedback();">
				<img class="icons" src="images/add.png" alt="new-task" title="Book time">
			</a>	
		</div>

		<div id="add-task-form" class="form-new-task" style="display:none;">
			<?php 

				$today = date("Y-m-d");

			?>
			<form action="#task-created" method="post">
				<input type="text" name="name" placeholder="Name" maxlength="100" required>
				<input type="date" name="date" placeholder="mm/dd/aaaa" value="<?php echo $today; ?>" required>
				<input id="time" type="text" name="time" placeholder="hh:mm:ss" value="" maxlength="8" required>
				<textarea type="text" name="description"  placeholder="..." maxlength="500" required></textarea>
				<input type="submit" name="submit" value="book" onclick="resetTime(); displayFeedback();" />
			</form>
		</div>
		<div id="feedback" class="feedback" style="display:block;">

			<?php  

				function clean_input($input){
	                $input = trim($input);
	                $input = stripslashes($input);
	                $input = htmlspecialchars($input);

	                return $input;
	            }

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$name = $_POST['name'];
					$date = $_POST['date'];
					$time = $_POST['time'];
					$description = $_POST['description'];

					$name = clean_input($name);
					$date = clean_input($date);
					$time = clean_input($time);
					$description = clean_input($description);

					echo $date;

					//Insert data to DB
				    if ($db_connect->connect_error) {
				        echo 'Error: ' . $db_connect->connect_error;
				    } else {

				    	$sql = "INSERT INTO tasks (name, end_date, end_time, description) VALUES ('$name', '$date', '$time', '$description')";

				    	if ($db_connect->query($sql)) {
	                    
		                    echo "<p>Task <span>" . $name . "</span> booked successfully </p>";

		                }else{

		                    echo "<p>Unable to book the task <span>" . $name . "</span></p>";
		                    //echo mysqli_error($db_connect) . "<br><br>";
		                }
				    }

				}
			?>
			
		</div>
	</div>

<?php include 'footer.php'; ?>