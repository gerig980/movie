//Show video
let playButton = document.querySelector('.play-movie');
// let video = document.querySelector('.video-container');
let myvideo = document.querySelector('#myvideo');
let closeButton = document.querySelector('.close-video');

playButton.onclick = () => {
    video.classList.add('show-video');

    //Auto Play Wher Click On Button
    myvideo.play();
};
closeButton.onclick = () => {
    video.classList.remove('show-video');

    //Pause on close Video
    myvideo.pause();
};