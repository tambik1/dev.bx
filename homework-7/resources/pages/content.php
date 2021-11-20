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
			<a href="/homework-7/movie.php?id=<?= $movie['ID'] ?>" class="card-hover--more">Подробнее</a>
		</div>
		<div class="movie-img" style="background-image: url(<?= "./resources/movie-images/"
		. $movie['ID']
		. ".jpg" ?>)"></div>
		<div class="specification">
			<h4><?= $movie['TITLE'] ?> (<?= $movie['RELEASE_DATE'] ?>)</h4>
			<p class="sub-title"><?= $movie['ORIGINAL_TITLE'] ?></p>
			<p class="description"><?= $movie['DESCRIPTION'] ?></p>
			<div class="card-footer">
				<div class="movie-time-icon" style="background-image: url(./resources/layout-img/clock.png)"></div>
				<p class="timing"><?= $movie['DURATION'] ?> мин. / <?= convertToHoursMins($movie['DURATION']) ?>ч.</p>
				<p class="genre"><?=expandArray($movie,'id_genres')?></p>
			</div>
		</div>
	</div>
<?php
endforeach; ?>
