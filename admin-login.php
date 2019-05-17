<?php

session_start();
$message="";
if(count($_POST)>0) {

    include("plugins/db-connect.php");
   
$email=$_POST["email"];
$pass=$_POST["password"];

$sql = "SELECT * FROM admin WHERE user_email = '$email' and user_password = '$pass'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row["id"];
$_SESSION["user_email"] = $row["user_email"];
$_SESSION["user_password"] = $row["user_password"];
}
 else {
    $message = "<h4 class='alert alert-danger'> <strong>WARNING!</strong> <i>Incorrect Email or Password</i> </h4>";
    //echo "<script>setTimeout(\"location.href = 'login.php';\",1000);</script>";
}
}
if(isset($_SESSION["user_email"])) {
   echo "<script>setTimeout(\"location.href = 'add-student.php';\",10);</script>";
}

?>

<!DOCTYPE html>
<html> 
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin-login </title>
    
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
    
    
    <body> 
        <div class="container">
            <div class="row">
                 <div class="col-md-12 ">                        
                    <div class="login_form">
						<h3> IT PAL Limited </h3>
						 <div class="col-md-12"> <?php echo "$message";?>  </div> 

                                <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                                   <span> User Email </span> <input type="text" class="form-control" id="email" name="email">
                                   <span> Password </span> <input type="password" class="form-control" id="password" name="password">
                                   <input type="submit" class="btn form-control" name="submit" id="submit" value="Log in"/>
                                </form>

                        <ul> 
                            <li class="ext-btn"> <a href="index.php" title="Home Page"> Go to Home </a> </li>
                        </ul>		
                    </div>
                 </div>
            </div>
        </div>
        
        <script type="text/javascript" src="assets/jquery.min.js"> </script>
        <script type="text/javascript" src="assets/bootstrap.min.js"> </script>
    </body>
</html>