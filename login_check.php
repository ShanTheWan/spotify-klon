<?php
session_start();
//check if button submit is pressed
if(isset($_POST['submit'])) {
    
}
else {
    header("location: login.php");
    exit();
}
?>