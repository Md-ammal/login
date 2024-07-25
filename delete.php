<?php
require_once('connection.php');
 $query = "DELETE FROM register WHERE `register`.`id` =".$_GET['id']; 
 mysqli_query($connection, $query);
//  die;
header("location:http://localhost/01phpClasses/mine/listing.php");

 ?>
 <!-- <script>
    location.assign("http://localhost/01phpClasses/mine/listing.php");
</script> -->