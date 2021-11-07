<?php
/** @var array $movies */
require_once "./lib/helper-functions.php";

$movieId = (int)$_GET['id'];
$personalDataMovie = $movies[$movieId - 1];

if ($movieId <= 0 or $personalDataMovie == NULL)
{
	echo '404 Страница не найдена';
}
?>

<div class="personal-page">
	<div class="personal-page--header">
		<div class="personal-page--header--title">
			<h2>
				<?= $personalDataMovie['title']?>
			</h2>
			<h5>
				<?= $personalDataMovie['original-title']?> <span class="age-restriction"><?= $personalDataMovie['age-restriction']?>+</span>
			</h5>
		</div>
		<div class="personal-page--header--favorites-icon"style="background-image: url(./resources/layout-img/icon.svg)">
			<div class="like-icon--hover" style="background-image: url(./resources/layout-img/icon-with-like.svg)"></div>
		</div>
	</div>
	<hr class="personal-page--header--hr">
	<div class="personal-page-main">
		<div class="personal-page-main--poster " style="background-image: url(<?="./resources/movie-images/" . $personalDataMovie['id'] . ".jpg"?> )"></div>
		<div class="personal-page-main--about">
			<div class="personal-page-main--rating-block">
				<!--			рейтинг фильма-->
				<div class="rating-area">
					<input type="radio" id="star-10" name="rating" value="10">
					<label for="star-10" title="Оценка «10»"></label>
					<input type="radio" id="star-9" name="rating" value="9">
					<label for="star-9" title="Оценка «9»"></label>
					<input type="radio" id="star-8" name="rating" value="8">
					<label for="star-8" title="Оценка «8»"></label>
					<input type="radio" id="star-7" name="rating" value="7">
					<label for="star-7" title="Оценка «7»"></label>
					<input type="radio" id="star-6" name="rating" value="6">
					<label for="star-6" title="Оценка «6»"></label>
					<input type="radio" id="star-5" name="rating" value="5">
					<label for="star-5" title="Оценка «5»"></label>
					<input type="radio" id="star-4" name="rating" value="4">
					<label for="star-4" title="Оценка «4»"></label>
					<input type="radio" id="star-3" name="rating" value="3">
					<label for="star-3" title="Оценка «3»"></label>
					<input type="radio" id="star-2" name="rating" value="2">
					<label for="star-2" title="Оценка «2»"></label>
					<input type="radio" id="star-1" name="rating" value="1">
					<label for="star-1" title="Оценка «1»"></label>
				</div>
				<!--			рейтинг фильма конец-->
				<div class="movie-rating"><?= $personalDataMovie['rating']?></div>
			</div>
			<h3>О фильме</h3>
			<div class="personal-page-main--about--table">
				<div class="personal-page-main--about--table-left">
					<span>Год производства:</span>
					<span>Режиссер:</span>
					<span>В главных ролях:</span>
				</div>
				<div class="personal-page-main--about--table-right">
					<span><?= $personalDataMovie['release-date']?></span>
					<span><?= $personalDataMovie['director']?></span>
					<span><?=expandArray($personalDataMovie,'cast')?></span>
				</div>
			</div>
			<h3>Описание</h3>
			<div class="personal-page-main--about--description">
				<?= $personalDataMovie['description']?>
			</div>
		</div>
	</div>
</div>