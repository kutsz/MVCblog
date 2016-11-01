<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>blocks</title>
	<link href="/mvc/template/css/style.css" rel="stylesheet" type="text/css" >
</head>
<body>

	<header >header  <img src="/mvc/template/images/k4.jpg" width="100" height="50" alt="logo"> </header>        <!--<img src="img/black-white-city.jpg" width="690" height="100">-->

	<aside>

<!-- <p class="title1">Навигация</p>
	<div id="coolmenu">
		<a href="index.php">Главная</a>
		<a href="articles.php">Статьи</a>
		<a href="lessons.php">Уроки</a>
		<a href="contacts.php">О нас</a>
	</div>
-->
<nav>
	<p>Навигация</p>
	<ul>
		<li> <a href="index.php">Главная</a> </li>
		<li> <a href="articles.php">Статьи</a>   </li>
		<li> <a href="lessons.php">Уроки</a>     </li>
		<li> <a href="contacts.php">О нас</a>          </li>
	</ul>
</nav>

<p id="p_id">Рассылка</p>
<section>

	<p>
		Подписывайтесь на нашу рассылку и подучайте свежие уроки,статьи и новости
	</p>
	<form name="SR_form" method="post" target="_blank" action="http://smartresponder.ru/subscribe.html">
<!-- 			<input type="hidden" name="version" value="1">
			<input type="hidden" name="tid" value="34769">
			<input type="hidden" name="uid" value="27025">
			<input type="hidden" name=charset value="utf-8">
			<input type="hidden" name="lang" value="1">
			<input type="hidden" name="did[]" value="9267">
		-->
		<p>
			Имя на русском: <br>
			<input type="text" name="field_name_first"  value="" maxlength="30" placeholder="John Doe" ></p>

			<p>
				Email адрес: <br>
				<input type="text" name="field_name_first"  value="" maxlength="30" ></p>

				<p>
					<input type="submit" name="SR_submitButton" value="Подписка" ></p>

				</form>
			</section>
		</aside>

		<main>main 
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</main>

		<footer>footer</footer>
		</html>
