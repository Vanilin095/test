<?php
# Подключаем конфиг 
include 'config.php'; 

function safeData ($data){
    global $mi;
    $data= htmlspecialchars($data);
    $data = trim($data);
    $data = $mi->real_escape_string($data);
    
    return $data;
}

if(isset($_POST['login'])) {
    //хешируем пароль, чтобы не хранить его в открытом виде
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $query = $mi->query("SELECT id FROM users WHERE login='".safeData($_POST['login'])."'");
    if(mysqli_num_rows($query) > 0) {
        $err = "Пользователь с таким логином уже есть";
    } else {
        $mi->query("INSERT INTO users SET login='".safeData($_POST['login'])."', pass='".$password."', fio='".safeData($_POST['fio'])."', email='".safeData($_POST['email'])."'");
    }
}



?>

<!DOCTYPE html>

<html >

<head>
  
<meta charset="UTF-8">
  
<title>Регистрация аккаунта</title>
  
  
 <meta name="viewport" content="width=device-width, initial-scale=1.0">    




  
</head>

<body>

<div id="range2">

<div class="outer">
  <div class="middle">
    <div class="inner">

        <div class="login-wr">




<h2>Регистрация аккаунта</h2>
 <div class='form'>
<form method='POST'>
<input name='email' type='email' placeholder='Email' required><br>
<input name='login' type='text' placeholder='Логин' required><br>
<input name='fio' type='text' placeholder='Фио' required><br>
<input name='password' type='password' placeholder='Пароль' required><br>

<input name='submit' type='submit' value='Зарегистрироваться'>
</form>



          </div>
        </div>
<?php echo $err; ?>
    </div>
  </div>
</div>

</div>


</body>
</html>
