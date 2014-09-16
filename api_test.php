<?php

/*

Test API sending

*/


$url = $_SERVER['REQUEST_URI'] . 'index.php';


function curl_post($url, array $post = NULL, array $options = array())
{
	$to_send = http_build_query($post);

    $defaults = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        //CURLOPT_FOLLOWLOCATION => 1,
        //CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT => 3,
        //CURLOPT_VERBOSE => 1, //sam added
        //CURLOPT_MAXREDIRS => 5, //sam added
        CURLOPT_POSTFIELDS => $to_send
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));

     if(curl_exec($ch) === false)
     {
        $alert = 'Curl error ' . curl_error($ch);
     }
     else
     {
        $alert = 'Operation completed without any errors';
     }
    curl_close($ch);
    return $alert;
}


$post = array(
    'made by' => 'sam havens',
    'use freely' => 'be nice');

curl_post($url, $post);

}
