<?php
/** @var array $movies */

require_once "./data/array-movies.php";

function renderTemplate(string $path, array $templateData = []): string
{
	if (!file_exists($path))
	{
		return "";
	}

	extract($templateData, EXTR_OVERWRITE);

	ob_start();

	include $path;

	return ob_get_clean();
};

function renderLayout(string $content, array $templateData = []): void
{
	$data = array_merge($templateData, [
		'content' => $content,
	]);
	$result = renderTemplate("./resources/pages/layout.php", $data);

	echo $result;
};

function getMovieByGenres(array $movies): array
{
	if ($_GET['genres'])
	{
		$sortMovies = [];
		foreach ($movies as $movie)
		{
			if (in_array($_GET['genres'], $movie['genres']))
			{
				array_push($sortMovies, $movie);
			}
			$movies = $sortMovies;
		}
	}
	return $movies;
}
