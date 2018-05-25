<?php include 'header.php'; ?>

	<div class="main">

		<div id="search" class="search">
			<form action="">
				<input type="search" placeholder="Search.." name="search">
				<button type="submit">Go</button>
			</form>
		</div>

		<?php  

			//get search value and clean input
			$search = $_GET['search'];
			$search = strtolower($search);
			$search = trim($search);
	        $search = stripslashes($search);
	        $search = htmlspecialchars($search);

	        //pagination variables
	      	$total_itens = 1;
	      	$limit = 5;

	      	if (isset($_GET["page"])) { 
	      		$page  = $_GET["page"]; 
	      	} else { 
	      		$page=1; 
	      	} 

			$start_from = ($page-1) * $limit;

			//fetches the data and displays it on the page
			if ($db_connect->connect_error) {
                echo 'Error: ' . $db_connect->connect_error;
            } else {

            	if($search !== null && $search !== ""){
            		$sql = "SELECT * FROM tasks ORDER BY `id` DESC";

            	}else{
            		$sql = "SELECT * FROM tasks ORDER BY `id` DESC LIMIT $start_from, $limit";

            		//finds out total number of itens
					$result = $db_connect->query("SELECT * FROM tasks");
					$total_itens = $result->num_rows;
            	}

            	$result = $db_connect->query($sql);

            	$total_rows = $result->num_rows;

            	if ($total_rows > 0) {

            		while ($row = $result->fetch_assoc()) { 

            			//searches description
            			if($search !== null && $search !== ""){
							if(strpos(strtolower($row['description']), $search) === false){
								continue;
							}
						}
        ?>

						<div class="row">
						  <div class="column left">
						    <img src="images/task.png">
						  </div>
						  <div class="column middle">
						    <h2><?php echo $row['name'] ?></h2>
						    <p><?php echo $row['description'] ?></p>
						  </div>
						  <div class="column right">
						    <h3>Finished at</h3>
						    <p><?php echo $row['end_date'] ?></p>
						    <p><?php echo $row['end_time'] ?></p>
						  </div>
						</div>

        <?php	
            		}

            	}else{ 
        ?>
            		<div class="feedback">
            			<p><?php echo "There are no tasks booked" ?></p>
            		</div>
        <?php	
        		}
        ?>
        			<div id="pages" class="pagination">
		  				<a class="page" href="tasks.php">&laquo;</a>

        <?php
        		//define number of pages and create page icons
        		$total_pages = ceil($total_itens / $limit);

        		for ($i=1; $i<=$total_pages; $i++) {
        ?>

        				<a class="page" id="<?php echo $i; ?>" href="tasks.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

        <?php
        		}

            }
		?>
					  	<a class="page" href="tasks.php?page=<?php echo $total_pages; ?>">&raquo;</a>
					</div>
	
	</div>
	
<?php include 'footer.php'; ?>