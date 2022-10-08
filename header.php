<?php
include("Includes/config.php");
include("Includes/Classes/Artist.php");
include("Includes/Classes/Album.php");
include("Includes/Classes/Podcast.php");

    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    }
    else{
        header("Location: login.php");
    }
?>
<html>
<head>
    <title>Welcome to Slopify</title>

    <link rel="stylesheet" type="text/css" href="Assets/Css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="Assets/Js/script.js"></script>
</head>
<body>
    <div id="mainContainer">

        <div id="topContainer">

        <?php include("Includes/navBarContainer.php"); ?>

        <div id="mainViewContainer">
            <div id="mainContent">