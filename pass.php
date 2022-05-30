<?php


# Подключаем конфиг 
include 'config.php'; 
session_start();

if(!isset($_SESSION["session_username"])):
    header("location:login.php");
else:

if(isset($_POST['submit'])):
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $mi->query("UPDATE users SET pass='".$password."' WHERE login='".$_SESSION["session_username"]."'");
    $err = "Пароль успешно изменен";
endif	

?>

<form method="POST">
	<input name="password" type="password" placeholder="Новый Пароль"><br>
	
	<input name="submit" type="submit" value="Сменить">
	
	</form>
<?php 
echo $err; 
endif; 
?>