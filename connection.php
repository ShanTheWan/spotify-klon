<?php
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "spotify";

$link = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$link) {
    die("Povezava ni uspela" . mysqli_connect_error());
}