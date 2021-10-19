<?php
/** @var array $movies */

// Функция проверяющая, является ли введённое значение числом обозначающей возрасти если true обходит массив.
function searchMoviesByAge(array $movies): void
{
	$userAge = readline("=>");  // Возраст пользователя
	(int)$userAge;
	$i = 1; // счётчик для нумерации списка фильмов
	if ((0 > $userAge) || ($userAge > 99) || (!is_numeric($userAge)))
	{
		echo "{$userAge} - Not age =/";
		return;
	}
	foreach ($movies as $filmIndex => $film)
	{
		if ($film["age_restriction"] <= $userAge)
		{
			printMessage($i . ". " . formatMovie($film));
			$i++;
		}
	}
}

// Функция для форматирования массива с фильмами
function formatMovie(array $movie): string
{
	return "{$movie['title']} ({$movie['release_year']}) {$movie['age_restriction']}+  Rating - {$movie['rating']}";
}

// Добавление новой строки
function printMessage(string $message): void
{
	echo $message . "\n";
}
