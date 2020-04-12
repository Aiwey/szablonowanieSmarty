<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../assets/css/main.css" />
</head>
<body>

<div style="width:90%; margin: 2em auto;">
<h2>Logowanie</h2>
<form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
<div class = "row uniform">
<div class="6u 12u$(xsmall)">
		<input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" placeholder = "Login" />
</div>
<div class="6u 12u$(xsmall)">
		<input id="id_pass" type="password" name="pass" placeholder = "Hasło" />
</div>
<div class="12u">
<ul class = "actions">
	<li><input type="submit" value="zaloguj" class="pure-button pure-button-primary"/></li>
</ul>
</div>	
</div>
</form>	


<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

</div>
<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>