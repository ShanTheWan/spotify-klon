<?php
include("connection.php");
session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form 
    $myusername = mysqli_real_escape_string($link,$_POST['email']);
    $mypassword = mysqli_real_escape_string($link,$_POST['geslo1']); 
    $mypasswordd=sha1($mypassword);
    
    $sql = "SELECT uporabnik_id FROM uporabniki WHERE up_ime = '$myusername' and geslo1 = '$mypasswordd'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row		
    if($count == 1) {
       $_SESSION['login_user'] = $myusername;
       
       header("location: index.php");
    }else {
       $error = "Your Login Name or Password is invalid";
       
       header("location: login.php?1");
    }
 }
?>