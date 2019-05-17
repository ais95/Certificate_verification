<?php
include 'db-connect.php';		 
$did=$_GET['id'];
$sql = "SELECT * FROM certificate_verification WHERE id='$did' ";
$result = mysqli_query($conn, $sql);		
?> 

    <?php if (mysqli_num_rows($result) > 0) 
    { 
      while($row = mysqli_fetch_assoc($result)) {
          ?>                          
          <?php $p =  $row["photo"]; ?> 
          <?php $c = $row["scaned_copy"]; ?> 


<?php } 

}
?>

<?php 
    $photo_delete = "../$p";
    $certificate_delete = "../$c";
    unlink($photo_delete); 
    unlink($certificate_delete); 
    mysqli_query($conn,"DELETE FROM certificate_verification WHERE id='$did'");
    mysqli_close($conn);
    echo "<script> window.location.href = '../view-student-list.php'; </script>";
?> 
