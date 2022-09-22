<?php
   include('connection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($link,"SELECT up_ime from uporabniki where up_ime = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['up_ime'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>