<?php
declare(strict_types = 1);
/** @var array $genres */
/** @var array $movies */
require_once "./data/array-movies.php";
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";

$layout = renderTemplate("./resources/pages/layout.php",
	[
		"genres" => $genres,
	]
);
echo $layout;
//
// require ('./resources/pages/layout.php');ма