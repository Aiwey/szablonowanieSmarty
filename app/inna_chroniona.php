<?php
require_once dirname(__FILE__).'/../config.php';
//ochrona widoku
include _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Chroniona strona</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
<body class="subpage">
    <!-- Header -->
			<header id="header">
				<div class="logo"><a href="generic.html">Kalkulator</a></div>
				<a href="#menu" class="toggle"><span>Menu</span></a>
			</header>
                        
                        <nav id="menu">
				<ul class="links">
					<li><a href="index.html">Kalkulator</a></li>
					<li><a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php">Kolejna chroniona strona</a></li>
					<li><a href="<?php print(_APP_ROOT); ?>/app/security/logout.php">Wyloguj</a></li>
				</ul>
			</nav>

<section id="one" class="wrapper style2">
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button">Powrót do kalkulatora</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
</section>
<div style="width:90%; margin: 2em auto;">
	<p>To jest inna chroniona strona aplikacji internetowej</p>
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