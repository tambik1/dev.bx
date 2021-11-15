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

function getMovieBySearch(array $movies, string $searcher)
{
	$searchMovies = [];
	foreach ($movies as $film)
	{
		if (mb_stristr($film['title'], $searcher) !== false)
		{
			$searchMovies[] = $film;
		}
		$movies = $searchMovies;
	}
	return $movies;
}