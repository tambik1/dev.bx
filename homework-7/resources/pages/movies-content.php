<?php
/** @var array $movies */
/** @var array $personalDataMovie */
/** @var $rating  */
/** @var $movieId  */
require_once "./lib/helper-functions.php";
?>

<div class="personal-page">
	<div class="personal-page--header">
		<div class="personal-page--header--title">
			<h2>
				<?= $personalDataMovie['TITLE'] ?>
			</h2>
			<h5>
				<?= $personalDataMovie['ORIGINAL_TITLE'] ?>
				<span class="age-restriction"><?= $personalDataMovie['AGE_RESTRICTION'] ?>+</span>
			</h5>
		</div>
		<div class="personal-page--header--favorites-icon" style="background-image: url(./resources/layout-img/icon.svg)">
			<div class="like-icon--hover" style="background-image: url(./resources/layout-img/icon-with-like.svg)"></div>
		</div>
	</div>
	<hr class="personal-page--header--hr">
	<div class="personal-page-main">
		<div class="personal-page-main--poster " style="background-image: url(<?= "./resources/movie-images/"
		. $personalDataMovie['ID']
		. ".jpg" ?> )"></div>
		<div class="personal-page-main--about">
			<div class="personal-page-main--rating-block">
				<!--			рейтинг фильма-->
				<div class="rating-area">
					<?
					foreach (array_reverse(range(1, 10)) as $scale)
					{
						echo "<input type=\"radio\" id=\"star-"
							. $scale
							. "\" name=\"rating\" value=\""
							. $scale
							. "\" disabled "
							. ($rating == $scale ? "checked>" : ">");
						echo "<label for=\"star-" . $scale . "\" title=\"Оценка «" . $scale . "»\"></label>";
					}
					?>
				</div>
				<!--			рейтинг фильма конец-->
				<div class="movie-rating"><?= $personalDataMovie['RATING'] ?></div>
			</div>
			<h3>О фильме</h3>
			<div class="personal-page-main--about--table">
				<div class="personal-page-main--about--table-left">
					<span>Год производства:</span>
					<span>Режиссер:</span>
					<span>В главных ролях:</span>
				</div>
				<div class="personal-page-main--about--table-right">
					<span><?= $personalDataMovie['RELEASE_DATE'] ?></span>
					<span><?= $personalDataMovie['director'] ?></span>
					<span><?= expandArray($personalDataMovie, 'cast') ?></span>
				</div>
			</div>
			<h3>Описание</h3>
			<div class="personal-page-main--about--description">
				<?= $personalDataMovie['description'] ?>
			</div>
		</div>
	</div>
</div>