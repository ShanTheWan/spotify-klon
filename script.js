var currentPlaylist = [];
var audioElement;

function Audio() {

    this.currentyPlaying;
    this.audio = document.createElement('audio');

    this.setTrack = function(track){
        this.currentPlaying = track;
        this.audio.src = track.path;
    }
    
    this.pause = function(){
        this.audio.pause();
    }

    this.play = function(){
        this.audio.play();
    }

}