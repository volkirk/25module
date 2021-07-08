<?php
session_start(); // Токен храним в сессии

// Параметры приложения
$clientId     = '7875907'; // ID приложения
$clientSecret = 'mysecret'; // Защищённый ключ
$redirectUri  = 'http://localhost/25module-master/25module-master/vk2.php'; // Адрес, на который будет переадресован пользователь после прохождения авторизации
 

// $params = array(
//     'client_id'     => $clientId,
//     'client_secret' => $clientSecret,
//     'code'          => $_GET['code'],
//     'redirect_uri'  => $redirectUri
// );

// Формируем ссылку для авторизации
$params = array(
	'client_id'     => $clientId,
	'redirect_uri'  => $redirectUri,
	'response_type' => 'code',
	'v'             => '5.131', // (обязательный параметр) версиb API https://vk.com/dev/versions //v-5.126
 
	// Права доступа приложения https://vk.com/dev/permissions
	// Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
	// Если не указать "offline", то полученный токен будет жить 12 часов.
	'scope'         => 'friends,offline',
	'revoke'=>1
	
);
 
// Выводим на экран ссылку для открытия окна диалога авторизации
if (!$_SESSION['authvk'])
echo '<a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '">Авторизация через ВКонтакте</a>';
//рабочая ссылка сверху
// echo '<a href="http://oauth.vk.com/authorize?' . $params['client_id'].'&'. $params['redirect_uri'].'&'.$params['response_type'].'&'.$params['v'].'&'.$params['scope']. '">Авторизация через ВК</a>';