# 1. Вывести список фильмов, в которых снимались одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
#   Формат: ID фильма, Название на русском языке, Имя режиссёра.

SELECT m.ID,
       movtit.TITLE,
       d.NAME
FROM movie AS m
	     LEFT JOIN movie_title AS movtit on m.ID = movtit.MOVIE_ID AND movtit.LANGUAGE_ID = 'ru'
	     INNER JOIN director AS d on m.DIRECTOR_ID = d.ID
	     INNER JOIN movie_actor AS ma on m.ID = ma.MOVIE_ID
WHERE ma.ACTOR_ID IN (1, 3)
GROUP BY m.ID, movtit.TITLE, d.NAME
HAVING COUNT(DISTINCT ma.ACTOR_ID) = 2;

# 2. Вывести список названий фильмов на англйском языке с "откатом" на русский, в случае если название на английском не задано.
#    Формат: ID фильма, Название.

SELECT m.ID,
       IFNULL(mt_language_en.TITLE, mt_language_ru.TITLE)
FROM movie AS m
	     LEFT JOIN movie_title AS mt_language_en on m.ID = mt_language_en.MOVIE_ID AND mt_language_en.LANGUAGE_ID = 'en'
	     LEFT JOIN movie_title AS mt_language_ru on m.ID = mt_language_ru.MOVIE_ID AND mt_language_ru.LANGUAGE_ID = 'ru'
ORDER BY ID;

# 3. Вывести самый длительный фильм Джеймса Кэмерона*.
#  Формат: ID фильма, Название на русском языке, Длительность.

SELECT m.ID,
       mt.TITLE,
       m.LENGTH
FROM movie AS m
	     LEFT JOIN movie_title AS mt on m.ID = mt.MOVIE_ID AND mt.LANGUAGE_ID = 'ru'
WHERE DIRECTOR_ID = 1
ORDER BY LENGTH DESC
LIMIT 1;


# 4. ** Вывести список фильмов с названием, сокращённым до 10 символов. Если название короче 10 символов – оставляем как есть. Если длиннее – сокращаем до 10 символов и добавляем многоточие.
#  Формат: ID фильма, сокращённое название

SELECT ID,
       IF(CHAR_LENGTH(mt.TITLE) < 10, mt.TITLE, CONCAT(LEFT(mt.TITLE, 9), '...')) TITLE_CUT
FROM movie AS m
	     LEFT JOIN movie_title mt on m.ID = mt.MOVIE_ID
ORDER BY ID;

# 5. Вывести количество фильмов, в которых снимался каждый актёр.
#    Формат: Имя актёра, Количество фильмов актёра.

SELECT a.NAME,
       COUNT(ma.MOVIE_ID) COUNT_MOVIE_BY_ACTOR
FROM actor AS a
	     LEFT JOIN movie_actor AS ma on a.ID = ma.ACTOR_ID
GROUP BY a.NAME;

# 6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
#   Формат: ID жанра, название

SELECT g.ID,
       g.NAME
FROM genre AS g
	     INNER JOIN movie_genre AS mg on g.ID = mg.GENRE_ID
	     LEFT JOIN movie_actor AS ma on mg.MOVIE_ID = ma.MOVIE_ID AND ma.ACTOR_ID = 1
GROUP BY g.NAME
HAVING COUNT(ma.MOVIE_ID) = 0;

# 7. Вывести список фильмов, у которых больше 3-х жанров.
#   Формат: ID фильма, название на русском языке

SELECT m.ID,
       mt.TITLE
FROM movie AS m
	     INNER JOIN movie_genre AS mg on m.ID = mg.MOVIE_ID
	     INNER JOIN movie_title AS mt on m.ID = mt.MOVIE_ID AND LANGUAGE_ID = 'ru'
GROUP BY 1
HAVING COUNT(mg.GENRE_ID) > 3;

# 8. Вывести самый популярный жанр для каждого актёра.
#   Формат вывода: Имя актёра, Жанр, в котором у актёра больше всего фильмов.

SELECT a.NAME,
       (SELECT g.NAME
        FROM movie_actor ma
	             INNER JOIN movie_genre mg on ma.MOVIE_ID = mg.MOVIE_ID
	             INNER JOIN genre g on mg.GENRE_ID = g.ID
        WHERE ma.ACTOR_ID = a.ID
        GROUP BY 1
        ORDER BY COUNT(DISTINCT mg.MOVIE_ID) DESC
        LIMIT 1) AS FAVORIT_GENRE
FROM actor a;
