var _token = "";

jQuery(function() { _token = $('#app').attr('spotify-token') })

// // Set up the Web Playback SDK
window.onSpotifyPlayerAPIReady = () => {
    const player = new Spotify.Player({
        name: 'Web Playback SDK Template',
        getOAuthToken: cb => { cb(_token); }
    });

    player.on('player_state_changed', state => {
        console.log(state)
    });

    // Ready
    player.on('ready', data => {
        console.log('Ready with Device ID', data.device_id);
        device_id = data.device_id;
        // Play a track using our new device ID
        // play(data.device_id);
    });

    $(document).on('click', '.play-song', function() {
        let track_id = $(this).attr('data-id');
        console.log(track_id);
        play(device_id, track_id);
    });

    // Connect to the player!
    player.connect();
}



// // Play a specified track on the Web Playback SDK's device ID
function play(device_id, track_id) {
    $.ajax({
        url: "https://api.spotify.com/v1/me/player/play?device_id=" + device_id,
        type: "PUT",
        data: `{"uris": ["spotify:track:${track_id}"]}`,
        beforeSend: function(xhr) { xhr.setRequestHeader('Authorization', 'Bearer ' + _token); },
        success: function(data) {
            console.log(data)
        }
    });
}


// // window.onSpotifyWebPlaybackSDKReady = () => {
// //     const token = 'BQCSXKHx-ho-x6b9mELc8uEFPQ8ioJAKlGOu2g8ZzJiXlzguAFhuRrJeibCQNcHIj3tbgKACDWlUKU8Sj5tnxIWhof9HXmDF0fjsGA-klZdHEpMz7P6ZPf3xtNGPnIAQbukULMOAfhcZvi-Gf9Ho77LIWreBH6lVZl_ssORZHr8a15rusGQ3WNs';
// //     const player = new Spotify.Player({
// //         name: 'Web Playback SDK Quick Start Player',
// //         getOAuthToken: cb => { cb(token); },
// //         volume: 0.5
// //     });

// //     player.addListener('ready', ({ device_id }) => {
// //         console.log('Ready with Device ID', device_id);
// //     });

// //     // Not Ready
// //     player.addListener('not_ready', ({ device_id }) => {
// //         console.log('Device ID has gone offline', device_id);
// //     });

// //     player.addListener('initialization_error', ({ message }) => {
// //         console.error(message);
// //     });

// //     player.addListener('authentication_error', ({ message }) => {
// //         console.error(message);
// //     });

// //     player.addListener('account_error', ({ message }) => {
// //         console.error(message);
// //     });

// //     document.getElementById('togglePlay').onclick = function() {
// //         player.togglePlay();
// //     };

// //     player.connect();
// // }