<?php
/** @var array $genres */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BITFLIX</title>
	<link rel="stylesheet" type="text/css" href="resources/css/reset.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="shortcut icon" href="resources/layout-img/favicon.png" type="image/png">
</head>
<body>
<div class="wrapper">

	<div class="sidebar">

		<div class="logo">
			<img src="resources/layout-img/Group 3.png" alt="logo"/>
		</div>

		<ul class="menu">
			<? foreach ($genres as $genre): ?>
			<li class="menu-item">
				<a href="#"><?echo $genre?></a>
			</li>
			<?php endforeach; ?>
		</ul>

	</div>

	<div class="container">
		<div class="header">
			<form class="search">
				<label>
					<input class="search-input" type="search" placeholder="Поиск по каталогу...">
				</label>
				<input class="search-submit-movie" type="submit" value="Искать">
				<input class="add-submit-movie" type="submit" value="Добавить фильм">
			</form>
		</div>
		<div class="content">
			<!--			Попробовать в динамику перевести "начало"-->
			<div class="card">
				<div class="card-hover">
					<a href="#" class="card-hover--more">Подробне</a>
				</div>
				<div class="movie-img" style="background-image: url(#)"></div>
				<div class="specification">
					<h4>Не время умирать (2021)</h4>
					<p class="sub-title">No Time to Die</p>
					<p class="description">Джеймс Бонд оставил оперативную службу и наслаждается спокойной жизнью на Ямайке. Все меняется, когда на острове появляется его старый друг Феликс Лейтер из ЦРУ с просьбой о помощи.</p>
					<div class="card-footer">
						<div class="movie-time-icon"></div>
						<p class="timing">163 мин. / 02:43</p>
						<p class="genre">боевик, триллер, приключения</p>
					</div>
				</div>
			</div>
			<!--			Попробовать в динамику перевести "Конец"-->

		</div>
	</div>
</body>
</html>