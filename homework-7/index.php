<?php
declare(strict_types = 1);
/** @var array $config */
require_once "./data/config.php";
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
require_once "./lib/filtering-functions.php";
require_once "./lib/db-connector.php";
error_reporting(-1);

$db_connect = dbConnect($config);
$genres = getGenresFromDB($db_connect);

$requestUrl = $_SERVER['REQUEST_URI'];
if (isset($_GET['genre']))
{
	$getGenres = $_GET['genre'];
	$movies = getMovieFromDB($db_connect, $genres, $getGenres);
}
else
{
	$getGenres = '';
	$movies = getMovieFromDB($db_connect, $genres, $getGenres);
}
if (isset($_GET['search']))
{
	if (strlen($_GET['search']) > 0)
	{
		$movies = getMovieBySearch($movies, $_GET['search']);
	}
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
