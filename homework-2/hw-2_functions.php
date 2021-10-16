<?php
/** @var array $movies */
$userAge = readline("=>");  // Возраст пользователя
$i = 1; // счётчик для нумерации списка фильмов

// Функция проверяющая, является ли введённое значение числом обозначающей возрасти если true обходит массив.
function searchMoviesByAge(array $movies, $userAge, $i)
{
	if ((0 > $userAge) || ($userAge > 99) || (!is_numeric($userAge)))
	{
		echo "{$userAge} - Not age =/";
	}
	else
	{
		foreach ($movies as $filmIndex => $film)
		{
			if ($film["age_restriction"] <= $userAge)
			{
				$recommendedFilms[] = $film;
				printMessage($i . ". " . formatMovies($film));
				$i++;
			}
		}
	}
}

// Функция для форматирования массива с фильмами
function formatMovies(array $movie): string
{
	return "{$movie['title']} ({$movie['release_year']}) {$movie['age_restriction']}+  Rating - {$movie['rating']}";
}

// Добавление новой строки
function printMessage(string $message): void
{
	echo $message . "\n";
}
