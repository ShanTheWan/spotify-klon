<?php
include("../../config.php");
if(isset($_POST['podcastId'])){
    $podcastId = $_POST['podcastId'];

    $query = mysqli_query($con, "SELECT * FROM podcasts WHERE id='$podcastId'");

    $resultArray = mysqli_fetch_array($query);

    echo json_encode($resultArray);
}
?>