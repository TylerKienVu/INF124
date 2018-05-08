<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta author="Tyler Vu">
		<title>INF 124</title>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script src="../js/scripts.js"></script>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/animate.css">    
		<link rel="stylesheet" href="../css/hover.css">    	
	    <link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="../index.html">Rock Stop</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
  				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="../index.html">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="productList.php">Product<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="team.html">Team</a>
					</li>
  				</ul>
  			</div>
		</nav>
		<div id="product-landing-image" class="parallax">
			<div id="product-landing-content-container" class="landing-content-container">
			</div>
		</div>
		<table id="product-table" class="table">
			<thead>
			    <tr>
		    		<th scope="col">#</th>
			    	<th scope="col">Image</th>
			    	<th scope="col">Color</th>
			    	<th scope="col">Quantity</th>
					<th scope="col">Price</th>			    	
			    </tr>
		  	</thead>
		  	<tbody>

				<?php

				$servername = "matt-smith-v4.ics.uci.edu";
				$username = "inf124db061";
				$password = "TMcVwhIMAmW^";

				//create connection
				$conn = mysqli_connect($servername, $username, $password);
				mysqli_select_db($conn,"inf124db061");

				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$rocks = "SELECT * FROM Rocks";
				$query = mysqli_query($conn, $rocks);
				if (!$query) {
    				printf("Error: %s\n", mysqli_error($conn));
    				exit();
				}
				
				while ($row = mysqli_fetch_array($query)) {
					echo "<tr>";
					//rock number
					echo "<th scope=\"row\">".($row['rock_id'])."</th>";

					// //image
					echo "<td><a href=\"../html/rockDetails.php?rockNum=".($row['rock_id'])."\">";
					echo "<img class=\"product-image hvr-grow\" src=\"../content/product/rock".($row['rock_id']).".jpg\"></a></td>";

					//color;
					echo "<td>".($row['color'])."</td>";

					//quanity per order
					echo "<td>".($row['quantity_per_order'])."</td>";

					// //price per order
					echo "<td>$".($row['price_per_order'])."</td>";

					echo "</tr>";
				}

				mysqli_close($conn);

				?>   			    			    			    			    			    	
		  </tbody>
		</table>		
	</body>
</html>