SELECT movie.ID,
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
WHERE 1 = movie.ID;

SELECT * from actor;