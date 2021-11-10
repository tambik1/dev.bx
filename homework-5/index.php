<?php
// declare(strict_types = 1);
/** @var array $genres */
/** @var array $movies */
/** @var array $config */
require_once "./data/array-movies.php";
require_once "./data/config.php";
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
require_once "./lib/filtering-functions.php";
error_reporting(-1);
$requestUrl = $_SERVER['REQUEST_URI'];
if (isset($_GET['genre']))
{
	$movies = getMovieByGenres($movies, $_GET['genre'],$genres);
	$getGenres = $_GET['genre'];
}
else
{
	$getGenres = '';
}


$contentPage = renderTemplate("./resources/pages/content.php", [
	"movies" => $movies,
]);

renderLayout($contentPage, [
	"genres" => $genres,
	"config" => $config,
	"getGenres" => $getGenres,
	"requestUrl" => $requestUrl,
]);