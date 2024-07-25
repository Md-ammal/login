<?php

if(isset($_POST['username']) && isset($_POST['password'])) {
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        require_once('connection.php');
        $query = "select * from register where email="."'".$_POST['username']."' and password ="."'".$_POST['password']."'";
        $response = mysqli_query($connection, $query);
        if(mysqli_num_rows($response) > 0) {
            $result = mysqli_fetch_assoc($response);   
            session_start();
            $_SESSION['userdata'] = $result;
            header('location:listing.php');
            exit;
        } else {
            session_start();
            unset($_SESSION['userdata']);
            header('location:login.php?error=true');   
            exit;                     
        }
        
    }
}
session_start();
unset($_SESSION['userdata']);
session_destroy();
header('location:login.php');


?>