

<!DOCTYPE html>
<html> 
	<head> 
		<link rel="shortcut icon" href="assets/developer.png" type="image/x-icon"/>
		<title> Verified Certificate Search </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" href="assets/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/style.css" />
		
	</head>
	
	<body> 
				
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="http://www.itpal.com.bd"> <strong>IT Pal Limited</strong> </a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
				  <ul class="nav navbar-nav">
					<li class="active"> <a href="index.php"> Home </a> </li>
					<li> <a href="add-student.php"> Add Students </a> </li>
					<li> <a href="view-student-list.php"> View Students List </a> </li>

				  </ul>
				</div><!--/.nav-collapse -->
			  </div>
			</nav>
		<!-- Fixed navbar -->
		<div class="container container2"> 
			<div style="margin-top:80px; padding:0;"> </div>
			
			<div class="row"> 
				<div class="col-md-1"> </div>
			
				<div class="col-md-10"> 
					<h2 style="text-align:center; color:#e74c3c; font-weight:bolder; border-bottom:3px solid #e74c3c;padding:10px 0;"> View Certificate Verfication </h2>
					
					
					<div class="col-md-12"> 
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="form-group row">
							<label for="s_id" class="col-md-3 col-sm-12 col-form-label pad"> Type Your ID </label>
							<div class="col-md-6 col-sm-12 pad">
								<input class="form-control" type="text" name="search_id" id="s_id" placeholder="Type students ID" required>
							</div>
						  
							<div class="col-md-3 col-sm-12 pad"> 
								<input class="form-control " type="submit" name="search" value="SEARCH" id="search" >
							</div>
							</div>
						</form>
					</div>

						
					<div class="col-md-12"> 
						<?php
						$message = "";
						if(isset($_POST['search'])){
							include("plugins/db-connect.php");
							$sid = $_POST['search_id'];
							
							$sql = "SELECT * FROM certificate_verification WHERE s_id LIKE '%$sid%'";
							$result = mysqli_query($conn, $sql);

						?>

						  <?php if (mysqli_num_rows($result) > 0){
							  
						   while($row = mysqli_fetch_assoc($result)) {
							?>

								<table class="table table_d">
									<tr> 
										<th colspan="2" class="pp"> <img src="<?php echo $row['photo']; ?>" width="105" height="120" class="photo" alt="" />  </th>
									</tr>
									<tr> 
										<th> Student's ID </th>
										<th> <?php echo $row['s_id']; ?>  </th>
									</tr>

									<tr> 
										<th> Student's Name </th>
										<th> <?php echo $row['s_name']; ?>  </th>
									</tr>

									<tr> 
										<th> Program Name </th>
										<th> <?php echo $row['p_name']; ?>  </th>
									</tr>	

									<tr> 
										<th> Duration </th>
										<th> <?php echo $row['duration']; ?> </th>
									</tr>

									<tr> 
										<th> Issuing Date </th>
										<th> <?php echo $row['issuing_date']; ?>  </th>
									</tr>
	

									<tr> 
										<th colspan="2" class="copy"> <img src="<?php echo $row['scaned_copy']; ?>" class="img-responsive" alt="" /> </th>
									</tr>
									
								</table>
												
							   <?php
							 } 

						  }
							else{
								echo  "<div class='alert alert-warning'> <p class='lead'>Oops! Couldn't not found any record for the ID <i> <i> <strong>$sid</strong> </i> </i></p> </div>";
							}
						  
						  ?>
						  
						<?php  mysqli_close($conn);

						}

						?>
						
					</div>
				</div>
				
			<div class="col-md-1"> </div>	
			</div>
			
			<div style="margin-top:80px; padding:0;"> </div>
		</div>
		
		<footer class="footer">
			<div class="container">
				<p class="text-muted"> &copy;Copyrights:<?php echo date("Y"); ?> <br />All Rights Reserved By <span> <a href="http://www.itpal.com.bd"> <strong> <i>ITPal Limited</i> </strong> </a> </span> </p>
			</div>
		</footer>
	
<!-- -->	
	<script type="text/javascript" src="assets/jquery-3.1.1.min.js"> </script>
	<script type="text/javascript" src="assets/bootstrap.min.js"> </script>
	</body>
</html>