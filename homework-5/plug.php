<?php
declare(strict_types = 1);
/** @var array $genres */
/** @var array $movies */
require_once "./data/array-movies.php";
require_once "./lib/template-functions.php";

$plugPage = renderTemplate("./resources/pages/plug-page.php", [
	"movies" => $movies,
]);

renderLayout($plugPage, [
	"genres" => $genres,
]);
?>
