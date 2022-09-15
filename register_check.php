<?php
include 'connection.php';
session_start();
//check if button submit is pressed
if(isset($_POST['submit'])) {
    $username = $_POST['ime'];
    $email = $_POST['email'];
    $password1 = $_POST['geslo1'];
    $password2 = $_POST['geslo2'];

    if(!empty($username) && !empty($email)
    && !empty($password1) && !empty($password2)
    && ($password1 == $password2)){

        $password = password_hash($password1, PASSWORD_DEFAULT);

        $query = "INSERT INTO uporabniki (up_ime, email, geslo1, geslo2) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username,$email,$password1,$password2]);

        header("Location: login.php");
    }
}
else {
    header("location: register.php");
    exit();
}
?>