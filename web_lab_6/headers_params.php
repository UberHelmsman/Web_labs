<?php

// GET запрос с кастомными заголовками
function GetRequestsCustomHeaders($url, $headers) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    echo "GET custom headers: " . $response . "\n";
}

// Функция для отправки JSON данных в теле запроса
function PostJsonData($url, $data) { // json данные передаются в функцию
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    echo "json in request body: " . json_decode($response, true) . "\n";
}

// Функция отправки запроса с параметрами URL-запроса
function GetRequestUrlParams($url, $params) {
    $query = http_build_query($params);
    $fullUrl = $url . '?' . $query;
    $ch = curl_init($fullUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    echo "get req with url params: " . json_decode($response, true) . "\n";
}