var _token = false;
var device_id = false;
var position = 0;
jQuery(function() { _token = $('#app').attr('spotify-token') })

// // Set up the Web Playback SDK
window.onSpotifyPlayerAPIReady = () => {
    const player = new Spotify.Player({
        name: 'Web Playback SDK Template',
        getOAuthToken: cb => { cb(_token); }
    });

    player.on('player_state_changed', state => {
        position = state.position;
    });

    // Ready
    player.on('ready', data => {
        console.log('Ready with Device ID', data.device_id);
        device_id = data.device_id;

        $(".play-song, .play-playlist").css("visibility", "visible");

        // $(document).on('click', '.play-song', function() {
        //     let track_id = $(this).attr('data-id');
        //     play_song(device_id, track_id);
        // });

        // $(document).on('click', '.play-playlist', function() {
        //     play_playlist(device_id);
        // });

    });

    // Connect to the player!
    player.connect();
}

var partial_player = false;
var playbtn = false;
// var playorpause = false;



function play(type = false, offset = 0) {
    console.log(type);
    position = 0;
    partial_player = $('#player-partial');
    partial_player.addClass('active');
    playbtn = partial_player.find('.play-btn');
    playbtn.attr('data-offset', offset);

    // playbtn.toggleClass("fa-circle-play fa-circle-pause");
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
    partial_player = $('#player-partial');
    playbtn = partial_player.find('.play-btn');
    playbtn.toggleClass("fa-circle-play fa-circle-pause");

    offset = playbtn.attr('data-offset');
    pause = playbtn.hasClass('fa-circle-pause') ? true : false;
    console.log(pause);
    play_playlist(device_id, offset, pause);
});


// // Play a specified track on the Web Playback SDK's device ID
function play_song(device_id, track_id = []) {
    console.log(_token);
    console.log(playlist_id);

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
                console.log(data)
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

    // } else {
    //     $.ajax({
    //         url: "https://api.spotify.com/v1/me/player/pause?device_id=" + device_id,
    //         type: "PUT",
    //         beforeSend: function(xhr) { xhr.setRequestHeader('Authorization', 'Bearer ' + _token); },
    //         success: function(data) {
    //             console.log(data)
    //         }
    //     });

    // }
    // $('.btn-play').not($(element)).removeClass('fa-circle-pause');
    // $('.btn-play').not($(element)).addClass('fa-circle-play');

    // $(element).toggleClass("fa-circle-play fa-circle-pause");

}