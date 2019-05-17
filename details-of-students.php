<?php
	include("plugins/login-check.php");
?>
						<?php
							include("plugins/db-connect.php");
							$sid=$_GET['id'];
							$sql = "SELECT * FROM certificate_verification WHERE id=$sid;";
                            $result = mysqli_query($conn, $sql);
						?>
						
		                    <?php if (mysqli_num_rows($result) > 0) 
								$i=0;
                              { 
                               while($row = mysqli_fetch_assoc($result)) {
							
							$i++;
							
                             ?>
							 <?php
								$id = $row['s_id'];
								$name = $row['s_name'];
								$program = $row['p_name'];
								$duration = $row['duration'];
								$date = $row['issuing_date'];
								$photo = $row['photo'];
								$c_copy = $row['scaned_copy'];
								//$vrp = "<img src='assets/120.png' class='verfied_wm' alt='Verified By ITPal Ltd' />"
								
							 ?>
							 
							<?php } 

                              }
                                mysqli_close($conn);
                             ?>
							 

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
					<li> <a href="index.php"> Home </a> </li>
					<li> <a href="add-student.php"> Add Students </a> </li>
					<li> <a href="view-student-list.php"> View Students List </a> </li>

				  </ul>
				  <ul class="nav navbar-nav navbar-right"> 
					<li> <a href="plugins/logout.php">LOG OUT</a> </li>
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
				<!--
					<div class="col-md-12"> 
						<form action="#">
							<div class="form-group row">
							<label for="s_id" class="col-md-3 col-sm-12 col-form-label pad"> Type Your ID </label>
							<div class="col-md-6 col-sm-12 pad">
								<input class="form-control" type="text" name="s_id" id="s_id" placeholder="Search By Your ID" required>
							</div>
						  
							<div class="col-md-3 col-sm-12 pad"> 
								<input class="form-control " type="submit" name="submit" value="SEARCH" id="search" >
							</div>
							</div>
						</form>
					</div>
				-->	
					<div class="col-md-12"> 
						
						<table class="table table_d">
							<tr> 
								<th colspan="2" class="pp"> <img src="<?php echo $photo; ?>" width="105" height="120" class="photo" alt="" />  </th>
							</tr>
							<tr> 
								<th> Student's ID </th>
								<th> <?php echo $id; ?>  </th>
							</tr>

							<tr> 
								<th> Student's Name </th>
								<th> <?php echo $name; ?>  </th>
							</tr>

							<tr> 
								<th> Program Name </th>
								<th> <?php echo $program; ?>  </th>
							</tr>	

							<tr> 
								<th> Duration </th>
								<th> <?php echo $duration; ?> </th>
							</tr>

							<tr> 
								<th> Issuing Date </th>
								<th> <?php echo $date; ?>  </th>
							</tr>
																

							<tr> 
								<th colspan="2" class="copy"> <img src="<?php echo $c_copy; ?>" class="img-responsive" alt="" /> </th>
							</tr>
							
						</table>
						
					</div>
				</div>
			<div class="col-md-1"> </div>	
			</div>
			
			<div style="margin-top:80px; padding:0;"> </div>
		</div>
		
		<footer class="footer">
			<div class="container">
				<p> &copy;Copyrights:<?php echo date("Y"); ?> <br />All Rights Reserved By <span> <a href="http://www.itpal.com.bd"> <strong> <i>ITPal Limited</i> </strong> </a> </span> </p>
			</div>
		</footer>
	
<!-- -->	
	<script type="text/javascript" src="assets/jquery-3.1.1.min.js"> </script>
	<script type="text/javascript" src="assets/bootstrap.min.js"> </script>
	</body>
</html>