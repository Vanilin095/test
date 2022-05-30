<?php
# Подключаем конфиг 
include 'config.php'; 

$username = strip_tags($_POST['login']);
$username = htmlspecialchars($username);
$username = trim($username);

$password = strip_tags($_POST['password']);
$password = htmlspecialchars($password);
$password = trim($password);


session_start();
if(isset($_SESSION['session_username']) && $_GET['page'] != "logout") {
    header("Location: /index.php"); exit();
} else {
    
    if (isset($_POST['submit'])) {
        $query = $mi->query("SELECT id, pass, login FROM users WHERE login='".$username."' LIMIT 1");
        $data = mysqli_fetch_assoc($query);
        
        // Сравниваем пароли
        if (password_verify($password, $data['pass'])) {
            session_start();
            $_SESSION["session_username"] = $data['login'];
        
            // Переадресовываем браузер на страницу проверки нашего скрипта
            header("Location: /index.php"); exit();
            
        } else {
            $err = "Вы ввели неправильный логин/пароль";
         
        }
    } 
}


if ($_GET['page'] == "logout") {
    session_start();
    session_unset();
    session_destroy();
}


?>
<!DOCTYPE html>

<html >

<head>
  
<meta charset="UTF-8">
  
<title>Авторизация</title>
  
  
   
<meta name="viewport" content="width=device-width, initial-scale=1.0">  



  
</head>

<body>

<div id="range2">

<div class="outer">
  <div class="middle">
    <div class="inner">

        <div class="login-wr">
          <h2>Вход в панель</h2>

 <div class="form">
<form method="POST">
<input name="login" type="text" placeholder="Логин"><br>
<input name="password" type="password" placeholder="Пароль"><br>

<input name="submit" type="submit" value="Войти">

</form>

            
<?php echo $err; ?>

          </div>
        </div>

    </div>
  </div>
</div>

</div>


</body>
</html>
