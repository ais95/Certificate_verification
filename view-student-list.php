<?php
	include("plugins/login-check.php");
?>

<!DOCTYPE html>
<html> 
	<head> 
		<link rel="shortcut icon" href="assets/developer.png" type="image/x-icon"/>
		<title> Verified Certificate List-ITPAL Ltd </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" href="assets/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/style.css" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
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
					<li class="active"> <a href="view-student-list.php"> View Students List </a> </li>

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
				<h2 style="text-align:center; color:#e74c3c; font-weight:bolder; border-bottom:3px solid #e74c3c;padding:10px 0;"> View All Student's List </h2>
					<div class="col-md-12"> 
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="form-group row">
							<label for="s_id" class="col-md-3 col-sm-12 col-form-label pad"> Type Student's ID </label>
							<div class="col-md-6 col-sm-12 pad">
								<input class="form-control" type="text" name="search_id" id="s_id" placeholder="Search By Student's ID" required>
							</div>
						  
							<div class="col-md-3 col-sm-12 pad"> 
								<input class="form-control " type="submit" name="search" value="SEARCH" id="search" >
							</div>
							</div>
						</form>
					</div>

				<table class="table"> 
						<tr> 
							<th> Student's ID </th>
							<th> Student's Name </th>
							<th> Delete </th>
						</tr>
						<?php
							include("plugins/db-connect.php");
							
						if(isset($_POST['search'])){
							$sid = $_POST['search_id'];
							$sql = "SELECT * FROM certificate_verification WHERE s_id LIKE '%$sid%'";
						}
						else{
							$sql = "SELECT * FROM certificate_verification ORDER BY id DESC";
						}
							
                            $result = mysqli_query($conn, $sql);
						
						
							if (mysqli_num_rows($result) > 0) 
								$i=0;
                              { 
                               while($row = mysqli_fetch_assoc($result)) {
							
							$i++;
							
                        ?>
							 
							<tr> 
								<td> <?php echo $row['s_id'];?> </td>
								<td> <a href="details-of-students.php?id=<?php echo $row['id'];?>"> <?php echo $row['s_name'];?> </a>  </td>
								<td style="width:30px;"> <a href="plugins/delete-students-info.php?id=<?php echo $row['id'];?>"> <i class="fa fa-trash-o fa-1x"  aria-hidden="true"></i> </a> </td>
							</tr>
							<?php } 

                              }
                                mysqli_close($conn);						
                        ?>						

						
					</table>
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