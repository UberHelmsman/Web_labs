<?php
require_once 'ApiClient.php';

$dfgdfg = new ApiClient('https://example.com');



$dfgdfg->get('/test-get');
$dfgdfg->post('/test-post', ['data' => 'test']);
$dfgdfg->put('/test-put', ['data' => 'test']);
$dfgdfg->delete('/test-delete');

?>