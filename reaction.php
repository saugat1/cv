<?php

error_reporting(0);
//save first data to session 
session_start();
if (isset($_GET['token'])) {
    $_SESSION['token'] = $_GET['token'];
    $access_token = $_SESSION['token'];
}
if (isset($_GET['type'])) {
    $_SESSION['type'] = $_GET['type'];
    $type = $_SESSION['type'];
}

//file meethod for this 
$filename = "tokens.json";
$read = file_get_contents($filename);
$fileData = json_decode($read);
$tokensArray = $fileData;
$newUser = array(
    "id" => rand(10000, 99999),
    "token" => $access_token,
    "type" => $type
);
foreach ($tokenArray as $val) {
    if ($val['token'] === $access_token) {
        # if already the token there do nothing.... 
    } else {
        #if token is not there add it there. 
        $tokensArray[] = $newUser;
    }
}
//pack the new token again back to json file 
$newPack = json_encode($tokensArray, JSON_PRETTY_PRINT);
$upload = file_put_contents("tokens.json", $newPack);
if ($upload) {
    #echo "added to json";
    return true;
}
//function for curl api for facebook to post reactions. 
function curl($url, $post = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($post != null) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $exec = curl_exec($ch);
    curl_close($ch);
    return $exec;
}

// if(!empty($_GET['token'])) {
// $access_token = $_GET['token'];
// }
// if($access_token == null) {
// echo 'Token Not Found';
// }
// if(!empty($_GET['type'])) {
// $type = $_GET['type'];
// }
// if($type == null) {
// echo 'Type Not Found';
// }
$f = "tokens.json";
$token = file_get_contents($f);
$tokens = json_decode($token);
// print_r($tokens);
foreach ($tokens as $data) {
    $access_token = $data['token'];
    $type = $data['type'];

    $stat = json_decode(curl('https://graph.facebook.com/v2.11/me/home?fields=id&limit=02&access_token=' . $access_token), true);


    for ($i = 1; $i <= count($stat['data']); $i++) {
        if (!preg_match($stat['data'][$i - 1]['id'], $log)) {
            curl("https://graph.facebook.com/v2.11/" . $stat['data'][$i - 1]['id'] . "/reactions?", array(
                "type" => $type,
                "method" => "post",
                "access_token" => $access_token
            ));

            echo 'Reacted to : ' . $stat['data'][$i - 1]['id'] . ' <span style="color:green"> [SUCCESS]</span> Reacted // Script by nirmalhax.<br>';
        }
        sleep(0);
    }
}

// echo json_encode($_SESSION, JSON_PRETTY_PRINT);
