<?php

session_start();
//$_SESSION = array();
//session_destroy();
ini_set('display_errors','Off');


//$_SESSION['auth']=0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>25 module auth</title>
</head>

<body>
    
   <a href="login.php">Войти</a>
    <a href="register.php">Зарегистрироваться</a>
    <br>
    <?php include 'vk.php';
    echo 'token='.$_SESSION['token'];
    echo '<br>userid='.$_SESSION['userid'];
    ?>
  
    
    <?php if ($_SESSION['auth'])
    {echo '<a href="logout.php">Выйти</a>';
    echo '-Авторизированный пользователь';
    ?>
    <h1>текст видят только Авторизированный Пользователь</h1>
    <?php 
    }
    if ($_SESSION['authvk'])
    // {echo '<a href="logout.php">Выйти</a>';
    {echo '-Авторизированный пользователь Вконтакте';
    ?>
    <h1>текст видят только пользователь ВК</h1>
    <h1>Друзья онлайн:</h1>
    <?php 
    $token=$_SESSION['token'];
    $userid=$_SESSION['userid'];
    $params = array(
        'user_ids'     => $_SESSION['userid'],
        'access_token'  => $_SESSION['token'],
        'v'=>5.131,
    );
   $content = @file_get_contents('https://api.vk.com/method/friends.getOnline?' . http_build_query($params));
  
    $response= json_decode($content);
    print_r($response);
    //echo '<a href="http://api.vk.com/method/friends.getOnline?' . http_build_query( $params ) . '">link</a>';
    //echo '<a href="https://api.vk.com/method/friends.getOnline?user_ids=74946206&access_token=705a33cc2fc32268d721d035e6e53b2dcad06517c18d6bb85d38e770e7221044044dc6d60b381fb2e4587&v=5.131">ссылка</a>';
    $online=$response->online ;
    echo $online;
    }?>

   <h1>Страница нашего сайта</h1>
    

    

   
</body>

</html>