<?php
function getMovieByGenres(array $movies, $genre, array $genres)
{
	$filteredMovies = [];
	foreach ($movies as $key => $item)
	{
		$genre_key = $genres[$genre];
		if (in_array($genre_key, $item['genres']))
		{
			$filteredMovies[] = $item;
		}
		$movies = $filteredMovies;
	}
	return $movies;
}

function getMovieById(array $movies, $id)
{
	foreach ($movies as $movie)
	{
		if ($movie['id'] === $id)
		{
			return $movie;
		}
	}
}