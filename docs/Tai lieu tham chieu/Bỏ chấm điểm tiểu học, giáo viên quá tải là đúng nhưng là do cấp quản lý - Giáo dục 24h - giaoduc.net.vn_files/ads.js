/**
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

function loadVideoJs(ctlID, url) {

    var video_width = 500;
    var video_height = 320;

    if ($.cookie('wap') == 1) {
        video_width = 320;
        video_height = 194;
    }
    var player = videojs(ctlID, { width: video_width, height: video_height });

    var adTagUrl = 'http://googleads.g.doubleclick.net/pagead/ads?ad_type=video_text_image_flash&client=ca-video-pub-0712088132312852&description_url=' + url + '&videoad_start_delay=0&hl=vi';
    console.log(adTagUrl);
    var options = {
        id: ctlID,
        adTagUrl: adTagUrl
    };

    player.ima(options);

    // Remove controls from the player on iPad to stop native controls from stealing
    // our click
    var contentPlayer = document.getElementById(ctlID + '_html5_api');
    if (navigator.userAgent.match(/iPad/i) != null &&
        contentPlayer.hasAttribute('controls')) {
        contentPlayer.removeAttribute('controls');

    }

    // Initialize the ad container when the video player is clicked, but only the
    // first time it's clicked.
    var clickedOnce = false;
    player.on('click', function () {
        if (!clickedOnce) {
            player.ima.initializeAdDisplayContainer();
            player.ima.requestAds();
            player.play();
            clickedOnce = true;
        }
    });

}
$($("video").get().reverse()).each(function (index) {
    var video_id = $(this).attr('id');
    var desc_url = $(this).attr('descurl');
    if (desc_url == undefined)
        desc_url = window.location.href;
    loadVideoJs(video_id, desc_url);
});



