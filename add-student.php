<?php
	include("plugins/login-check.php");
?>
<?php
    //include("plugins/db-connect.php");
    $message= "";


    if(isset($_POST['submit'])){      
        include("plugins/db-connect.php");
        
        $sid = $_POST['s_id'];
        $name = $_POST['name'];
        $program = $_POST['program'];
        $duration = $_POST['duration'];
        $date = $_POST['date'];
		
        $des="No Photos Available";
        $source= $_FILES["photo"]["tmp_name"];
        
        $file= $_FILES["photo"]["name"];
        $filename = pathinfo($file, PATHINFO_FILENAME);
        
            if($source != ""){
				$source= $_FILES["photo"]["tmp_name"];
                $des="students-photo/".$filename.".jpg";
                copy($source,$des);
            }

		$c_c="No Copy Available";
        $source2= $_FILES["copy"]["tmp_name"];
        
        $file2= $_FILES["copy"]["name"];
        $filename2 = pathinfo($file2, PATHINFO_FILENAME);
        
            if($source2 != ""){
                $c_c="scaned-copy/".$filename2.".jpg";
                copy($source2,$c_c);
            }
        


        $sql = "INSERT INTO certificate_verification(s_id, s_name, p_name, duration, issuing_date, photo, scaned_copy)
        VALUES ('$sid', '$name', '$program', '$duration', '$date', '$des', '$c_c')";

         if (mysqli_query($conn, $sql)) {
            
            $message = "<div class='alert alert-success'> <strong>Success!</strong> <i> <b>($name)</b> </i> Added to list </div>";
             // echo "<script> setTimeout('window.location='new_notice.php'',1500); </script>";
        }

        else {
            $message= "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


        mysqli_close($conn);


    }
?>

<!DOCTYPE html>
<html> 
	<head> 
		<link rel="shortcut icon" href="assets/developer.png" type="image/x-icon"/>
		<title> Certificate Verfication-ITPAL Ltd </title>
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
					<li class="active"> <a href="add-student.php"> Add Students </a> </li>
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
					<h2 style="text-align:center; color:#e74c3c; font-weight:bolder; border-bottom:3px solid #e74c3c;padding:10px 0;">Add New To Certificate Verfication </h2>
					<h3 > <?php echo "$message"; ?>  </h3>

				
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"> 
						<div class="form-group row">
						  <label for="s_id" class="col-md-4 col-sm-12 col-form-label"> Student's ID </label>
						  <div class="col-md-8 col-sm-12">
							<input class="form-control" type="text" name="s_id" id="s_id" placeholder="Type Student's ID" required>
						  </div>
						</div>
						
						<div class="form-group row">
						  <label for="name" class="col-md-4 col-sm-12 col-form-label"> Student's Name </label>
						  <div class="col-md-8 col-sm-12">
							<input class="form-control" type="search" name="name"  id="name" placeholder="Type Student's Name" required>
						  </div>
						</div>
						
						<div class="form-group row">
						  <label for="program" class="col-md-4 col-sm-12 col-form-label"> Program Name </label>
						  <div class="col-md-8 col-sm-12">
							<input class="form-control" type="text" name="program"  id="program" placeholder="Type Program Name" required>
						  </div>
						</div>

						<div class="form-group row">
						  <label for="duration" class="col-md-4 col-sm-12 col-form-label"> Duration <i>(hr)</i> </label>
						  <div class="col-md-8 col-sm-12">
							<input class="form-control" type="number" name="duration" id="duration" placeholder="Course Duration" required>
						  </div>
						</div>

						<div class="form-group row">
						  <label for="date" class="col-md-4 col-sm-12 col-form-label" > Issuing Date</label>
						  <div class="col-md-8 col-sm-12">
							<input class="form-control" type="text" name="date" id="date" value="<?php echo date("d-M-Y"); ?>" required>
						  </div>
						</div>
						
						<div class="form-group row">
						  <label for="photo" class="col-md-4 col-sm-12 col-form-label"> Student's Photo </label>
						  <div class="col-md-8 col-sm-12">
							<input class="form-control" type="file" name="photo"  id="photo" accept="image/x-png,image/gif,image/jpeg">
						  </div>
						</div>
						
						<div class="form-group row">
						  <label for="copy" class="col-md-4 col-sm-12 col-form-label" > Scaned Copy </label>
						  <div class="col-md-8 col-sm-12">
							<input class="form-control" type="file" name="copy"  id="copy" accept="image/x-png,image/gif,image/jpeg">
						  </div>
						</div>	

						<div class="form-group row">
						  <label for="submit" class="col-md-4 col-sm-12 col-form-label">  </label>
						  <div class="col-md-4 col-sm-6">
							<input class="form-control fm-btn" type="reset" value="RESET"  id="fm-btn">
						  </div>
						  <div class="col-md-4 col-sm-6">
							<input class="form-control " type="submit" name="submit" value="SUBMIT" id="fm-btn">
						  </div>
						</div>
					
					</form>
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