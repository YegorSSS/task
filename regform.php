<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	

</head>
<body>
	
	<div id="reg" class="modalDialog">
		<div>
			
			
			<form action="register.php" method="post">
				Логин <input name="login" type="text"><br>
				Пароль <input name="pass" type="password"><br>
				<input name="submit" type="submit" value="Зарегистрироваться">
			</form>
			<a href="#log">Войти</a>
		</div>
	</div>
	
	<div id="log" class="modalDialog">
		<div>
			
			
			<form action="login.php" method="post">
				Логин <input name="login" type="text"><br>
				Пароль <input name="pass" type="password"><br>
				<input name="submit" type="submit" value="Войти">
			</form>
			<a href="#reg">Зарегистрироваться</a>
		</div>
	</div>
	
	
</body>
<html>