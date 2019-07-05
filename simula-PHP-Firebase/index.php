<?php

function sendPushNotification($to = '', $data = array()) {
    // $apiKey = 'AAAAFoVu8pk:APA91bGPwcLNJ_H7fv4itqRD3sm-OnK3MGVw0pzd2zVoC6VXdCe6nNmkpNYx8OrvGSjRJ93n2B9O17HyyzktDCD8YlZ-bEvzNPaxRq3zuEiZCdY5vkyTIXqnN5UNquY33Sc30jLmPI2V'; // pessoal
    $apiKey = 'AAAAQbCtNqQ:APA91bHbw8uM-XwWiwQXnm9q3sGR0nsM-obVh-pUT_dJ-5XUBGIWejaMiIG9tX3siEnwZ7fJnWP5tLeVMwzAjLvAzi1IZ8D3O0VZVVfXqV2wNssRf6wxIl0UhjwgUKrl57XkmA41cNSH';  // Green
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

$to = 'cWxHpgJ92bI:APA91bEVcR2QpC602E4ayXAyMFH3WUyu_HTG5kmH7gQxQoqZXgcKEPVXHfnw0IpMSeK-Ylom4IGWTRhRTIZAYTUMQxgxe0CW4nIW9RgwVKu5fSb8lofUKYObezUrDlpX1CUSoJTss9l4';
$data = array(
    'title' => 'Instituído através da Lei nº. 6.321, de 14 de abril de', // 54 caracteres MotoG5S
    'body' => 'Instituído através da Lei nº. 6.321, de 14 de abril de 1976, o PAT beneficia, prioritariamente, ao atendimento dos trabalhadores de baixa renda, isto é, aqueles que ganham até cinco salários mínimos mensais. A alimentação adequada inserida nos propósitos da segurança alimentar e nutricional é objetivo que se faz presente no PAT As empresas que fornecem o benefício da alimentação aos seus funcionários podem optar por esse sistema, obtendo, inclusive, benefícios fiscais. Conheça mais sobre o Programa no endereço www.mte.gov.br. Instituído através da Lei nº. 6.321, de 14 de abril de123456789', // 595 caracteres MotoG5S
    'icon' => 'myicon'
);

echo sendPushNotification($to, $data);