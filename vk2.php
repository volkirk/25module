<?php
session_start();
//session_destroy();
$client_id='7875907';

$client_secret='yPqgbkqUziUqP6E86Cz1';
$redirect_uri='http://localhost/25module-master/25module-master/vk2.php';

$code=$_GET['code'];


$params = array(
	'client_id'     => $client_id,
	'client_secret'  => $client_secret,
	'redirect_uri' => $redirect_uri,
	'code'             => $code,
		
);
// echo '<a href="http://oauth.vk.com/access_token?' . http_build_query( $params ) . '">link</a>';
$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params));
$response =json_decode($content);
$token = $response->access_token;
$expiresIn = $response->expires_in; 
$userId = $response->user_id; 
$_SESSION['token']=$token;
$_SESSION['userid']=$userId;
echo $_SESSION['token'];
echo '<br>'.$_SESSION['userid'];
$_SESSION['authvk']=true;
header("Location: index.php"); exit();

// echo '<a href="http://api.vk.com/method/users.get?' . http_build_query( $params ) . '">link</a>';
// https://api.vk.com/method/users.get?user_ids=210700286&fields=bdate&access_token=533bacf01e11f55b536a565b57531ac114461ae8736d6506a3&v=5.131


// $params = array(
//     'client_id'     => $clientId,
//     'client_secret' => $clientSecret,
//     'code'          => $_GET['code'],
//     'redirect_uri'  => $redirectUri,
//     '
// );

// if (!$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params))) {
//     $error = error_get_last();
//     throw new Exception('HTTP request failed. Error: ' . $error['message']);
// }

// $response = json_decode($content);

// // ���� ��� ��������� ������ ��������� ������
// if (isset($response->error)) {
//     throw new Exception('��� ��������� ������ ��������� ������. Error: ' . $response->error . '. Error description: ' . $response->error_description);
// }
// //� ��� ����� ��������� ���, ���� ��� ������ ������
// $token = $response->access_token; // �����
// $expiresIn = $response->expires_in; // ����� ����� ������
// $userId = $response->user_id; // ID ����������������� ������������

// // ��������� ����� � ������
// $_SESSION['token'] = $token;
// echo 'token-'.$_SESSION['token'];


?>