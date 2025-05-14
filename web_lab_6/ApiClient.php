<?php
// класс ApiClient для взаимодействия с API
class ApiClient {
    private $URL;
    private $authToken;

    public function __construct($baseUrl, $authToken = null) {
        $this->URL = $baseUrl;
        $this->authToken = $authToken;
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

        // Логгирование
        $logDir = 'logs';
        $logFile = $logDir. '/log.txt';

        // Создаём директорию для логгирования, если её еще нет
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $logMessage = "Request: $method $url - Code: $httpCode" . PHP_EOL;

        file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
        // конец логгирования


        if ($error) {
            throw new Exception("cURL Error: $error");
        }

        if ($httpCode >= 400) {
            throw new Exception("API Error: HTTP $httpCode");
        }

        return json_decode($response, true);
    }

    public function get($endpoint) { // базовый GET запрос
        return $this->sendRequest('GET', $endpoint);
    }

    public function post($endpoint, $data) { // базовый POST запрос
        return $this->sendRequest('POST', $endpoint, $data);
    }

    public function put($endpoint, $data) { // базовый PUT запрос
        return $this->sendRequest('PUT', $endpoint, $data);
    }

    public function delete($endpoint) { // базовый DELETE запрос
        return $this->sendRequest('DELETE', $endpoint);
    }
}