<?php
// класс ApiClient для взаимодействия с API
class ApiClient {
    private $URL;
    private $authToken;
    private $headers;

    public function __construct($baseUrl, $authToken = null) {
        $this->URL = $baseUrl;
        $this->authToken = $authToken;
        $this->headers = ['Content-Type: application/json'];
    }

    private function sendRequest($method, $endpoint, $data = null) {
        $url = $this->URL . $endpoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Аутентификация 
        if ($this->authToken) {
            $this->headers[] = "Authorization: Bearer {$this->authToken}";
        }

        // Настройка под используемый метод
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        // Передача данных, если таковые имеются
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        }


        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);


        // немного другая обработка ошибок для бесперебойной работы программы
        $error_message = "";
        if ($error) {
            $error_message = $error_message . "cURL Error: $error";
        }

        if ($httpCode >= 400) {
            $error_message = $error_message . "API Error: HTTP $httpCode";
        }
        
        $error_message = $error_message . PHP_EOL;
        // Логгирование
        $logDir = 'logs';
        $logFile = $logDir. '/log.txt';

        // Создаём директорию для логгирования, если её еще нет
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $logMessage = PHP_EOL . PHP_EOL . "Request: $method $url - Code: $httpCode" . PHP_EOL;

        file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
        if($error_message){
            file_put_contents($logFile, $error_message, FILE_APPEND | LOCK_EX);
        }
        // конец логгирования

        return json_decode($response, true);
    }

    public function get($endpoint) { // базовый GET запрос
        echo "GET запрос";
        return $this->sendRequest('GET', $endpoint);
    }

    public function post($endpoint, $data) { // базовый POST запрос
        echo "post запрос";
        return $this->sendRequest('POST', $endpoint, $data);
    }

    public function put($endpoint, $data) { // базовый PUT запрос
        echo "put запрос";
        return $this->sendRequest('PUT', $endpoint, $data);
    }

    public function delete($endpoint) { // базовый DELETE запрос
        echo "delete запрос";
        return $this->sendRequest('DELETE', $endpoint);
    }
}