<?php
// De URL van de Facebook video die je wilt embedden
$video_url = 'https://www.facebook.com/reel/823380416309928/';

// De oEmbed eindpunt URL
$oembed_url = 'https://www.facebook.com/plugins/video/oembed.json/?url=' . urlencode($video_url);

// Initialize een CURL session
$ch = curl_init();

// Zet de CURL opties
curl_setopt($ch, CURLOPT_URL, $oembed_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Voer de CURL request uit
$response = curl_exec($ch);

// Sluit de CURL session
curl_close($ch);

// Decodeer de JSON response
$data = json_decode($response, true);

// Haal de HTML code op
$html = $data['html'];

// Echo de HTML code
echo $html;
?>
