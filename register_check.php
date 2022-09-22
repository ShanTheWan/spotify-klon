<?php
include 'connection.php';

$ime=$_POST['ime'];
$email=$_POST['email'];
$pass=$_POST['geslo1'];
$pass2=$_POST['geslo2'];

if(isset($_POST['submit'])){
    if($pass===$pass2){
        $pass=sha1($pass);
        if(empty($ime)||empty($email)||empty($pass)||empty($pass2)){
            
            header("Location: register.php?1");
        }
        else{
            $sql = "INSERT INTO uporabniki (up_ime,email,geslo1) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($link);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../register?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "sss", $ime, $email, $pass);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: login.php");
        }
    }
    else{
        header("Location: register.php?2");
        die();
    }
}
else{
    header("Location: register.php?3");
}

?>