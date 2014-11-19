<?php

/*

Test API sending

*/

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//$url = $_SERVER['REQUEST_URI'] . 'post_node.php'; // may need to set this manually if you are using locally
$url = 'http://192.168.1.104/post_test/post_node.php'; // or wherever this is hosted

function curl_post($url, array $post = NULL, &$status, array $options = array())
{
    // this is to the JAC specifications from the email

    $to_send = http_build_query($post);

    $defaults = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_POSTFIELDS => $to_send
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, ($options + $defaults));

     if(curl_exec($ch) === false)
     {
        $alert = 'cURL error: ' . curl_error($ch);
        $status = 'cURL error: ' . curl_error($ch);
     }
     else
     {
        $alert = 'Operation completed without any errors';
        $status = curl_getinfo($ch);
     }
    curl_close($ch);
    return $alert;
}

//set the response code:

$response = 'accept';
// $response = 'reject';

$url .= '?response=' . $response;


$post = array(
    'made by' => 'sam havens',
    'use freely' => 'be nice',
    'this is' => 'a test post');

$curl_status = '';

curl_post($url, $post, $curl_status);

echo 'Response code: ' . $curl_status['http_code'] . "\n";


