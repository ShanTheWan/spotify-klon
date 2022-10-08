<?php
$podcastQuery = mysqli_query($con, "SELECT id FROM podcasts ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($podcastQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);
?>

<script>

$(document).ready(function() {
    currentPlaylist = <?php echo $jsonArray; ?>;
    audioElement = new Audio();
    setTrack(currentPlaylist[0], currentPlaylist, false);
});

function setTrack(trackId, newPlaylist, play) {

    $.post("Includes/Handlers/Ajax/getPodcastJson.php", { podcastId: trackId }, function(data) {

        var track = JSON.parse(data);

        $(".trackName span").text(track.title);

        $.post("Includes/Handlers/Ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
            var artist = JSON.parse(data);
            $(".artistName span").text(artist.name);
        });

        $.post("Includes/Handlers/Ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
            var album = JSON.parse(data);
            $(".albumLink img").attr("src", album.artworkPath);
        });

        audioElement.setTrack(track);
        playPodcast();
    });

    if(play == true) {
        audioElement.play();
    }

}

function playPodcast(){
    if(audioElement.audio.currentTime == 0){
        $.post("Includes/Handlers/Ajax/updatePlays.php", { podcastId: audioElement.currentlyPlaying});
    }
    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
}

function pausePodcast(){
    $(".controlButton.play").show();
    $(".controlButton.pause").hide();
    audioElement.pause();
}

</script>

<div id="nowPlayingBarContainer">

    <div id="nowPlayingBar">

        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img src="" class="albumArtwork">
                </span>

        <div class="trackInfo">

            <span class="trackName">
                <span></span>
            </span>
            <span class="artistName">
                <span></span>
            </span>

        </div>

     </div>
</div>

    <div id="nowPlayingCenter">

        <div class="content playerControls">

            <div class="buttons">   
                                
                <button class="controlButton shuffle" title="Shuffle">
                    <img src="Assets/Images/Icons/shuffle.png" alt="Shuffle">
                </button>

                <button class="controlButton previous" title="Previous">
                    <img src="Assets/Images/Icons/previous.png" alt="Previous">
                </button>

                <button class="controlButton play" title="Play" onclick="playPodcast()">
                    <img src="Assets/Images/Icons/play.png" alt="Play">
                </button>

                <button class="controlButton pause" title="Pause" style=" display: none;" onclick="pausePodcast()">
                    <img src="Assets/Images/Icons/pause.png" alt="Pause">
                </button>

                <button class="controlButton next" title="Next">
                    <img src="Assets/Images/Icons/next.png" alt="Next">
                </button>

                <button class="controlButton repeat" title="Repeat">
                    <img src="Assets/Images/Icons/repeat.png" alt="Repeat">
                </button>

            </div>

                <div class="playbackBar">

                     <span class="progressTime current">0.00</span>
                     <div class="progressBar">
                         <div class="progressBarBg">
                             <div class="progress"></div>
                         </div>
                     </div>
                     <span class="progressTime remaining">0.00</span>

                    </div>

                </div>

            </div>

            <div id="nowPlayingRight">
                <div class="volumeBar">
                            
                    <button class="controlButton volume" title="Volume">
                        <img src="Assets/Images/Icons/volume.png" alt="Volume">
                    </button>

                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>