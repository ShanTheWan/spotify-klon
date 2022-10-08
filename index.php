<?php include("Includes/header.php"); ?>

    <h1 class="pageHeadingBig">YOU MIGHT ALSO LIKE</h1>

    <div class="gridViewContainer">
        <?php
            $albumQuery = mysqli_query($con, "SELECT * FROM albums Order By RAND() LIMIT 5");

            while($row = mysqli_fetch_array($albumQuery)) {
                echo "<div class='gridViewItem'>
                            <a href='album.php?id=" .$row['id']. "'>
                            <img src='" . $row['artworkPath'] . "'>

                            <div class='gridViewInfo'>"
                                . $row['title'] .
                            "</div>
                        </a>
                    </div>";
            }
        ?>        
    </div>
    
<?php include("Includes/footer.php"); ?>