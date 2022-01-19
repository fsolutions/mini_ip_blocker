<?php

$options = array(
    'http' => array(
        'method' => 'GET',
        'header' => array(
            // 'Content-Type: application/x-yametrika+json',
            "Authorization: OAuth AgAAAAA3e3nSAAYf7E7qXaYal0gen_kSOvjs1M8"
        )
    )
);

$context = stream_context_create($options);

$url = 'https://api.webmaster.yandex.net/v4/user';



exit;

$parameters = [
    "ids"               => "",                            // номер счётчика метрики 
    'metrics'           => 'ym:pv:pageviews,ym:pv:users', // данные по: страницам и количеству просмотров 
    'dimensions'        => 'ym:pv:URLHash',               // группировка по URLHash 
    "date1"             => "2018-09-01",                  // с какой даты получить отчёт 
    'accuracy'          => 'full',                        // точная статистика (без округления) 
    'limit'             => '100000',                      // максимальный лимит данных 
    'proposed_accuracy' => 'false'                        // без округления данных 
];

array_walk($parameters, create_function('&$key, $value', '$key="$value=$key";'));
$parameters = implode($parameters, '&');

$url = $url . '?&' . $parameters;

$metrikaRequest = file_get_contents($url, false, $context);

if (!empty($metrikaRequest)) {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/metrics.json", $metrikaRequest);
};
