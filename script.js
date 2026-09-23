/* =========================================
   PORTFOLIO SANCHA
   DOM + CLOCK + MENU + YOUTUBE MUSIC
========================================= */


/* =========================================
   1. ELEMENT HTML
========================================= */

const clock = document.getElementById("clock");
const navMenu = document.getElementById("navMenu");
const menuButton = document.getElementById("menuButton");

const musicButton = document.getElementById("musicButton");

const welcomeScreen =
    document.getElementById("welcomeScreen");

const enterButton =
    document.getElementById("enterButton");

const year =
    document.getElementById("year");

const progressBars =
    document.querySelectorAll(".progress-bar");

const navLinks =
    document.querySelectorAll(".nav-menu a");

const animatedElements =
    document.querySelectorAll(".section, .stats");


/* =========================================
   2. CLOCK
========================================= */

function updateClock() {

    const now = new Date();

    const hours =
        String(now.getHours()).padStart(2, "0");

    const minutes =
        String(now.getMinutes()).padStart(2, "0");

    const seconds =
        String(now.getSeconds()).padStart(2, "0");

    if (clock) {

        clock.textContent =
            hours + ":" +
            minutes + ":" +
            seconds;

    }
}

updateClock();

setInterval(updateClock, 2000);


/* =========================================
   3. MOBILE MENU
========================================= */

if (menuButton && navMenu) {

    menuButton.addEventListener(
        "click",
        function () {

            navMenu.classList.toggle("active");

            if (
                navMenu.classList.contains("active")
            ) {

                menuButton.textContent = "×";

            } else {

                menuButton.textContent = "☰";

            }

        }
    );

}


navLinks.forEach(function (link) {

    link.addEventListener(
        "click",
        function () {

            navMenu.classList.remove("active");

            menuButton.textContent = "☰";

        }
    );

});


/* =========================================
   4. YOUTUBE MUSIC
========================================= */

let musicPlaying = false;

let youtubePlayer = null;


/*
   ID video YouTube:

   https://youtu.be/mITjaQu1j9w
                    ↑
              VIDEO ID
*/

const youtubeVideoId =
    "mITjaQu1j9w";


/* =========================================
   5. BUAT YOUTUBE PLAYER DENGAN DOM
========================================= */

function createYouTubePlayer() {

    const iframe =
        document.createElement("iframe");

    iframe.id = "youtubeMusic";

    iframe.width = "1";

    iframe.height = "1";

    iframe.frameBorder = "0";

    iframe.allow =
        "autoplay; encrypted-media";

    iframe.style.position = "fixed";

    iframe.style.left = "-100px";

    iframe.style.bottom = "-100px";

    iframe.style.opacity = "0";

    iframe.src =
        "https://www.youtube.com/embed/" +
        youtubeVideoId +
        "?enablejsapi=1" +
        "&autoplay=0" +
        "&loop=1" +
        "&playlist=" +
        youtubeVideoId;

    document.body.appendChild(iframe);

    youtubePlayer = iframe;
}


/* Buat player */

createYouTubePlayer();


/* =========================================
   6. PLAY YOUTUBE
========================================= */

function playMusic() {

    if (!youtubePlayer) {
        return;
    }


    youtubePlayer.contentWindow.postMessage(
        JSON.stringify({
            event: "command",
            func: "playVideo",
            args: []
        }),
        "*"
    );


    musicPlaying = true;


    if (musicButton) {
        musicButton.textContent = "🔊";
    }

}


/* =========================================
   7. PAUSE YOUTUBE
========================================= */

function pauseMusic() {

    if (!youtubePlayer) {
        return;
    }


    youtubePlayer.contentWindow.postMessage(
        JSON.stringify({
            event: "command",
            func: "pauseVideo",
            args: []
        }),
        "*"
    );


    musicPlaying = false;


    if (musicButton) {
        musicButton.textContent = "🎵";
    }

}


/* =========================================
   8. ENTER PORTFOLIO
========================================= */

if (enterButton) {

    enterButton.addEventListener(
        "click",
        function () {

            /*
              Karena user sudah melakukan klik,
              browser lebih memungkinkan audio
              YouTube dimainkan.
            */

            playMusic();

            closeWelcome();

        }
    );

}


/* =========================================
   9. CLOSE WELCOME
========================================= */

function closeWelcome() {

    if (welcomeScreen) {

        welcomeScreen.classList.add("hide");

    }

}


/* =========================================
   10. MUSIC BUTTON
========================================= */

if (musicButton) {

    musicButton.addEventListener(
        "click",
        function () {

            if (musicPlaying) {

                pauseMusic();

            } else {

                playMusic();

            }

        }
    );

}


/* =========================================
   11. LEARNING PROGRESS
========================================= */

function updateProgress() {

    progressBars.forEach(
        function (bar) {

            const value =
                bar.getAttribute(
                    "data-progress"
                );

            if (value) {

                bar.style.width =
                    value + "%";

            }

        }
    );

}

updateProgress();


/* =========================================
   12. SCROLL ANIMATION
========================================= */

function checkScroll() {

    animatedElements.forEach(
        function (element) {

            const position =
                element.getBoundingClientRect().top;

            const screenHeight =
                window.innerHeight;


            if (
                position <
                screenHeight - 70
            ) {

                element.classList.add("show");

            }

        }
    );

}

checkScroll();

window.addEventListener(
    "scroll",
    checkScroll
);


/* =========================================
   13. FOOTER YEAR
========================================= */

if (year) {

    year.textContent =
        "© " +
        new Date().getFullYear() +
        " Portfolio";

}
