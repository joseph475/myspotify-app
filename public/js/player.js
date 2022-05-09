var device_id = false;
var position = 0;
var track = [];
var duration = 0;
var partial_player = $('#player-partial');
var playbtn = partial_player.find('.play-btn');

// // Set up the Web Playback SDK
window.onSpotifyPlayerAPIReady = () => {
    const player = new Spotify.Player({
        name: 'Web Playback SDK Template',
        getOAuthToken: cb => { cb(_token); }
    });

    player.on('player_state_changed', state => {
        console.log(state);
        position = state.position;
        track = state.track_window.current_track;
        duration = state.duration;
        $('.album-img  img').attr("src", track.album.images[1].url);
        $('.album-img  p#player-track-title').html(`${track.name}<br><span style='font-size:10px'>${track.artists[0].name}</span>`);
        $("#progress-end").html(millisToMinutesAndSeconds(parseInt(duration)));
    });

    // Ready
    player.on('ready', data => {
        console.log('Ready with Device ID', data.device_id);
        device_id = data.device_id;

        $(".play-song, .play-playlist").css("visibility", "visible");
    });

    // Connect to the player!
    player.connect();
}

function play(type = false, offset = 0) {

    position = 0;

    partial_player.addClass('active');

    // $('#player-partial').find('.play-btn').attr('data-offset', offset);
    playbtn.attr('data-offset', offset);
    playbtn.addClass('fa-circle-pause');
    playbtn.removeClass('fa-circle-play');

    $('main').addClass('pbottom');

    if (type) {
        switch (type) {
            case "playlist":
                play_playlist(device_id, offset, true);
                break;

            default:
                play_song(device_id, track_id);
        }
    }
}

$(document).on('click', '.play-btn', function() {
    playbtn.toggleClass("fa-circle-play fa-circle-pause");
    offset = playbtn.attr('data-offset');
    pause = playbtn.hasClass('fa-circle-pause') ? true : false;
    play_playlist(device_id, offset, pause);
});


// // Play a specified track on the Web Playback SDK's device ID
function play_song(device_id, track_id = []) {
    console.log(_token);
    // console.log(playlist_id);

    $.ajax({
        url: "https://api.spotify.com/v1/me/player/play?device_id=" + device_id,
        type: "PUT",
        data: `{"uris": ["spotify:track:${track_id}"]}`,
        // data: `{ "uris": ["spotify:playlist:${playlist_id}"] }`,
        beforeSend: function(xhr) { xhr.setRequestHeader('Authorization', 'Bearer ' + _token); },
        success: function(data) {
            console.log(data)
        }
    });
}

function play_playlist(device_id, offset, pause) {

    // window.scrollTo(0, 0);
    console.log(device_id);
    console.log(_token);

    if (pause) {
        $.ajax({
            url: "https://api.spotify.com/v1/me/player/play?device_id=" + device_id,
            type: "PUT",
            data: `{"context_uri": "spotify:playlist:${playlist_id}", "offset": {"position": ${offset}}, "position_ms":${position}}`,
            beforeSend: function(xhr) { xhr.setRequestHeader('Authorization', 'Bearer ' + _token); },
            success: function(data) {
                // console.log(data)
            }
        });
    } else {
        $.ajax({
            url: "https://api.spotify.com/v1/me/player/pause?device_id=" + device_id,
            type: "PUT",
            beforeSend: function(xhr) { xhr.setRequestHeader('Authorization', 'Bearer ' + _token); },
            success: function(data) {
                console.log(data)
            }
        });
    }
}

function next_previous(type) {
    offset = $('#player-partial').find('.play-btn').attr('data-offset');
    playbtn.addClass('fa-circle-pause');
    playbtn.removeClass('fa-circle-play');

    if (type == "next") {
        playbtn.attr('data-offset', parseInt(offset) + 1);
    } else {
        if (offset != 0) {
            playbtn.attr('data-offset', parseInt(offset) - 1);
        }
    }
    $.ajax({
        url: `https://api.spotify.com/v1/me/player/${type}?device_id=` + device_id,
        type: "POST",
        beforeSend: function(xhr) { xhr.setRequestHeader('Authorization', 'Bearer ' + _token); },
        success: function(data) {
            console.log(data)
        }
    });
}