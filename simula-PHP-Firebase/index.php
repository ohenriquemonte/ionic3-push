<?php

function sendPushNotification($to = '', $data = array()) {
    $apiKey = 'AAAAFoVu8pk:APA91bGPwcLNJ_H7fv4itqRD3sm-OnK3MGVw0pzd2zVoC6VXdCe6nNmkpNYx8OrvGSjRJ93n2B9O17HyyzktDCD8YlZ-bEvzNPaxRq3zuEiZCdY5vkyTIXqnN5UNquY33Sc30jLmPI2V';
    $fields = array('to' => $to, 'notification' => $data);
    $headers = array('Authorization: key='.$apiKey, 'Content-Type: application/json');

    $url = 'https://fcm.googleapis.com/fcm/send';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);

    var_dump($result);

    curl_close($ch);
    return json_decode($result, true);
}

$to = 'd9kWxtIXjtw:APA91bFqzFVAwSkGCQAcycd9td-MuI3zPRsp4JtTs1-pI1kUWTbYT-oDQJMKJqKEuklnrj2Vbv4Wg_WMAS01uCtoJWeiB49mvJwdyUop6TgBy3vJy7bvJaZdO3t1l0NAolz8Pu3vKsvY';
$data = array(
    'body' => 'Nova Mensagem'
);

echo sendPushNotification($to, $data);