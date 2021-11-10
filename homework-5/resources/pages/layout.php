<?php
/** @var array $genres */
/** @var array $movies */
/** @var array $config */
/** @var $getGenres */
/** @var string $content */
/** @var $requestUrl */
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
	<link rel="stylesheet" type="text/css" href="resources/css/personal-page--style.css">
	<link rel="stylesheet" type="text/css" href="resources/css/plug-style.css">
	<link rel="shortcut icon" href="resources/layout-img/favicon.png" type="image/png">
</head>
<body>
<div class="wrapper">

	<div class="sidebar">

		<div class="logo">
			<img src="resources/layout-img/Group3.png" alt="logo"/>
		</div>

		<ul class="menu">

			<?php foreach ($config['menu'] as $key => $name): ?>
				<li class="menu-item">
					<a class="<?= $requestUrl === "/homework-5/" . $key . ".php" ? "a-active" : "a-not-active" ?>" href="/homework-5/<?= $key . ".php" ?>"><?= $name ?></a>
				</li>
			<?php
			endforeach; ?>
			<?
			foreach ($genres as $key => $genre): ?>
				<li class="menu-item">
					<a class="<?= $getGenres === $key ? "a-active"
						: "a-not-active" ?>" href="/homework-5?genre=<?= $key ?>"><?
						echo $genre ?></a>
				</li>
			<?php
			endforeach; ?>
		</ul>

	</div>

	<div class="container">
		<div class="header">
			<form class="search">
				<label>
					<input class="search-input" type="search" placeholder="Поиск по каталогу..." style="background-image: url(./resources/layout-img/search-icon.png)">
				</label>
				<input class="search-submit-movie" type="submit" value="Искать">
				<a href="/homework-5/plug.php" class="add-submit-movie">Добавить фильм</a>

			</form>
		</div>
		<div class="content">
			<!--			Попробовать в динамику перевести "начало"-->
			<?= $content ?>
			<!--			Попробовать в динамику перевести "Конец"-->
		</div>
	</div>
</body>
</html>