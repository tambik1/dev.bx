<?php
declare(strict_types = 1);
// /** @var array $genres */
/** @var array $movies */
/** @var array $config */
/** @var $requestUrl */
require_once "./lib/db-connector.php";
require_once "./data/array-movies.php";
require_once "./data/config.php";
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
require_once "./lib/filtering-functions.php";
error_reporting(-1);
$db_connect = dbConnect($config);
$movieId = (int)$_GET['id'];
$personalDataMovie = getMovieFromDbById($db_connect, $movieId);
$rating = floor($personalDataMovie['ID']['RATING']);
$genres = getGenresFromDB($db_connect);

if (!$personalDataMovie)
{
	echo '404 страница не найдена';
	exit();
}

if (isset($_GET['id']))
{
	$movieId = $_GET['id'];
	$personalDataMovie = getMovieFromDbById($db_connect, $movieId);
	$rating = floor($personalDataMovie['ID']['RATING']);
}
else
{
	$movieId ='1';
	exit();
}

$personalPageMovie = renderTemplate("./resources/pages/movies-content.php", [
	"movies" => $movies,
	"movieId" => $movieId,
	"personalDataMovie" => $personalDataMovie,
	"rating" => $rating,
]);

renderLayout($personalPageMovie, [
	"genres" => $genres,
	"config" => $config,
]);




dbConnect($config);