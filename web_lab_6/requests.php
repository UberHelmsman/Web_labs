<?php
// базовый GET запрос
function EchoBasicGetRequest(){
    $ch = curl_init('https://jsonplaceholder.typicode.com/posts/1'); // это там французский что ли или лорем ипсум какой то
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    echo "GET: " . $response . "\n";
}


// базовый POST запрос
function EchoBasicPostRequest(){
    $ch = curl_init('https://jsonplaceholder.typicode.com/posts');
    $stuff = [
        'title' => "dsdfghjdfggdsgdgfh",
        'body' => "e5tydwftvadsfsadrbv",
        'userId' => "weopkcvdcaq"
    ];
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($stuff));
    $response = curl_exec($ch);
    curl_close($ch);
    echo "POST: " . $response . "\n";
}


// базовый PUT запрос
function EchoBasicPutRequest(){
    $ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
    $stuff = [
        'title' => "qwopiertop",
        'body' => "qzcxopiwerkml"
    ];
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($stuff));
    $response = curl_exec($ch);
    curl_close($ch);
    echo "PUT: " . $response . "\n";
}


// базовый DELETE запрос
function EchoBasicDeleteRequest(){
    $ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    $response = curl_exec($ch);
    curl_close($ch);
    echo "DELETE: " . $response . "\n";
}
?>