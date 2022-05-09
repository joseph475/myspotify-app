<div id="player-partial">
    <div class="album-img">
        <img src="" alt="">
        <p class="text-start" id="player-track-title"></p>
    </div>
    <div class="icons-container d-flex justify-content-center align-items-center">
        <i class="fa-solid fa-backward-step forward-btns" onclick="next_previous('previous')"></i>
        <i class="fa-solid fa-circle-play play-btn mx-5"></i>
        <i class="fa-solid fa-forward-step forward-btns" onclick="next_previous('next')"></i>
    </div>

    <div class="progress-container">
        <span id="progress-start">0:00</span>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span id="progress-end">0:00</span>
    </div>
</div>
