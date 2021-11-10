<?php
/** @var array $movies */
/** @var array $genres */
/** @var array $filteredMovies */
require_once "./lib/helper-functions.php";
?>

<?
foreach ($movies as $movie): ?>
	<div class="card">
		<div class="card-hover">
			<a href="/homework-5/movie.php?id=<?= $movie['id'] ?>" class="card-hover--more">Подробнее</a>
		</div>
		<div class="movie-img" style="background-image: url(<?= "./resources/movie-images/"
		. $movie['id']
		. ".jpg" ?>)"></div>
		<div class="specification">
			<h4><?= $movie['title'] ?> (<?= $movie['release-date'] ?>)</h4>
			<p class="sub-title"><?= $movie['original-title'] ?></p>
			<p class="description"><?= $movie['description'] ?></p>
			<div class="card-footer">
				<div class="movie-time-icon" style="background-image: url(./resources/layout-img/clock.png)"></div>
				<p class="timing"><?= $movie['duration'] ?> мин. / <?= convertToHoursMins($movie['duration']) ?>ч.</p>
				<p class="genre"><?=expandArray($movie,'genres')?></p>
			</div>
		</div>
	</div>
<?php
endforeach; ?>
