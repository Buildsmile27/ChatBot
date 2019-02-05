<?php
//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.digitalocean.com/v2/actions/36805022');

// Returns the data/output as a string instead of raw data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Good practice to let people know who's accessing their servers. See https://en.wikipedia.org/wiki/User_agent
curl_setopt($ch, CURLOPT_USERAGENT, 'YourScript/0.1 (contact@email)');

//Set your auth headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $TOKEN
    ));

// get stringified data/output. See CURLOPT_RETURNTRANSFER
$data = curl_exec($ch);
echo $data;
// get info about the request
$info = curl_getinfo($ch);

// close curl resource to free up system resources 
curl_close($ch)
?>
