<?php
/** @var array $config */
require_once "./lib/db-connector.php";
$db_res = dbConnect($config);


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

// тут уже работа с БД
function getGenresFromDB($db_res): array
{
	$query = "SELECT * FROM GENRE;";
	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false)
	{
		trigger_error();
	}
	$result = [];
	while ($row = $mysqli_result->fetch_assoc())
	{
		$result[$row["ID"]] = ["CODE" => $row["CODE"], "NAME" => $row["NAME"]];
	}
	return $result;
}

function getMovieFromDB($db_res, $genres, string $genre = ""): array
{
	$result = [];
	$notFilteredGenre = 'SELECT movie.ID,
       movie.TITLE,
       movie.ORIGINAL_TITLE,
       movie.DESCRIPTION,
       movie.DURATION,
       movie.AGE_RESTRICTION,
       movie.RELEASE_DATE,
       RATING,
       d.NAME,
       (SELECT GROUP_CONCAT(mg.GENRE_ID)
        FROM movie_genre AS mg
        WHERE mg.MOVIE_ID = movie.ID) AS id_genres,
       (SELECT GROUP_CONCAT(ma.ACTOR_ID)
        FROM movie_actor AS ma
        WHERE ma.MOVIE_ID = movie.ID) AS id_actor
FROM movie
	     INNER JOIN director d on movie.DIRECTOR_ID = d.ID';
	$filteredGenre = 'SELECT movie.ID,
       movie.TITLE,
       movie.ORIGINAL_TITLE,
       movie.DESCRIPTION,
       movie.DURATION,
       movie.AGE_RESTRICTION,
       movie.RELEASE_DATE,
       RATING,
       d.NAME,
       (SELECT GROUP_CONCAT(mg.GENRE_ID)
        FROM movie_genre AS mg
        WHERE mg.MOVIE_ID = movie.ID) AS id_genres,
       (SELECT GROUP_CONCAT(ma.ACTOR_ID)
        FROM movie_actor AS ma
        WHERE ma.MOVIE_ID = movie.ID) AS id_actor
FROM movie
	     INNER JOIN director d on movie.DIRECTOR_ID = d.ID
WHERE '.$genre .' IN (SELECT mg.GENRE_ID
           FROM movie_genre AS mg
           WHERE mg.MOVIE_ID = movie.ID)';
	$query = $genre === "" ? $notFilteredGenre  : $filteredGenre;

	$mysqli_result = mysqli_query($db_res, $query);
	if ($mysqli_result === false)
	{
		trigger_error();
	}
	while ($row = $mysqli_result->fetch_assoc())
	{
		$row["id_genres"] = getNames($genres, $row["id_genres"], ",");
		$result[$row["ID"]] = $row;
	}
	return $result;
}

function getNames(array $gen, string $id, string $separator): array
{
	$explodeArray = explode($separator, $id);
	foreach ($explodeArray as &$value)
	{
		$value = $gen[$value]['NAME'];
	}
	return $explodeArray;
}
