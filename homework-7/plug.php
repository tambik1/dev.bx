<?php
declare(strict_types = 1);
/** @var array $genres */
/** @var array $movies */
/** @var array $config */
/** @var $getGenres */
require_once "./data/config.php";
require_once "./data/array-movies.php";
require_once "./lib/template-functions.php";
require_once "./lib/filtering-functions.php";
error_reporting(-1);


if (isset($_GET['genre']))
{
	$movies = getMovieByGenres($movies, $_GET['genre'], $genres);
	$getGenres = $_GET['genre'];
}
else
{
	$getGenres = '';
}

$requestUrl = $_SERVER["REQUEST_URI"];
$plugPage = renderTemplate("./resources/pages/plug-page.php", [
	"movies" => $movies,
]);

renderLayout($plugPage, [
	"genres" => $genres,
	"config" => $config,
	"requestUrl" => $requestUrl,
	"getGenres" => $getGenres,
]);