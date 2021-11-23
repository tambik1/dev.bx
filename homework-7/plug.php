<?php
declare(strict_types = 1);
/** @var array $config */
/** @var $getGenres */
require_once "./data/config.php";
require_once "./lib/template-functions.php";
require_once "./lib/filtering-functions.php";
require_once "./lib/db-connector.php";
error_reporting(-1);
$db_connect = dbConnect($config);
$genres = getGenresFromDB($db_connect);
if (isset($_GET['genre']))
{
	$movies = $movies = getMovieFromDB($db_connect, $genres, $getGenres);
	$getGenres = $_GET['genre'];
}
else
{
	$getGenres = '';
}

$requestUrl = $_SERVER["REQUEST_URI"];
$plugPage = renderTemplate("./resources/pages/plug-page.php", [

]);

renderLayout($plugPage, [
	"genres" => $genres,
	"config" => $config,
	"requestUrl" => $requestUrl,
	"getGenres" => $getGenres,
]);