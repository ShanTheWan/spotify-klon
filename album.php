<?php include("Includes/header.php"); 

if(isset($_GET['id'])) {
    $albumid = $_GET['id'];
}
else {
    header ("Location: index.php");
}
$album = new Album($con, $albumid);
$artist = $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>">
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p>By <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> podcasts uploaded</p>
    </div>
</div>

<div class="tracklistContainer">
    <ul class="tracklist">
        
        <?php
        $podcastIdArray = $album->getPodcastIds();

        $i = 1;
        foreach($podcastIdArray as $podcastId){
            
            $albumPodcast = new Podcast($con, $podcastId);
            $albumArtist = $albumPodcast->getArtist();

            echo "<li class='tracklistRow'>
                    <div class='trackCount'>
                        <img class='play' src='Assets/Images/Icons/play-white.png'>
                        <span class='trackNumber'>$i</span>
                    </div>

                    <div class='trackInfo'>
                        <span class='trackName'>" . $albumPodcast->getTitle() . "</span>
                        <span class='artistName'>" . $albumArtist->getName() . "</span>
                    </div>

                    <div class='trackOptions'>
                        <img class='optionsButton' src='Assets/Images/Icons/more.png'>
                    </div>

                    <div class='trackDuration'>
                        <span class='duration'>" . $albumPodcast->getDuration() . "</span>
                    </div>
                </li>";
            $i++;
        }
        ?>
    </ul>
</div>

<?php include("Includes/footer.php"); ?>