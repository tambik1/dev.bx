INSERT INTO director (ID, NAME)
VALUES (1, '������ �������'),
       (2, '����� �����'),
       (3, '���� ���������'),
       (4, '������ ������');


INSERT INTO actor (ID, NAME)
VALUES (1, '������� ������������'),
       (2, '����� ���'),
       (3, '����� ��������'),
       (4, '������� �����'),
       (5, '��� �������'),
       (6, '��� ����'),
       (7, '���� ������'),
       (8, '��� �����'),
       (9, '������� ������'),
       (10, '���� ��������'),
       (11, '��� ����������'),
       (12, '��� �������'),
       (13, '������ �� ʸ����');

INSERT INTO language(ID, NAME)
VALUES ('ru', '�������'),
       ('en', 'English'),
       ('de', 'Deutsch');

INSERT INTO movie (ID, RELEASE_YEAR, LENGTH, MIN_AGE, RATING, DIRECTOR_ID)
VALUES (1, 1984, 108, 16, 8.0, 1),
       (2, 1979, 116, 16, 8.1, 2),
       (3, 1982, 109, 16, 7.9, 3),
       (4, 1982, 144, 18, 7.8, 4),
       (5, 2009, 162, 12, 7.9, 1),
       (6, 1994, 135, 16, 7.8, 1),
       (7, 1986, 137, 16, 8.0, 1);

INSERT INTO movie_title(LANGUAGE_ID, MOVIE_ID, TITLE)
VALUES ('ru', 1, '����������'),
       ('ru', 2, '�����'),
       ('ru', 3, '�����'),
       ('ru', 4, '������'),
       ('ru', 5, '������'),
       ('ru', 6, '��������� ����'),
       ('ru', 7, '�����'),
       ('en', 1, 'The Terminator'),
       ('en', 2, 'Alien'),
       ('en', 3, 'The Thing'),
       ('en', 6, 'True Lies'),
       ('en', 7, 'Aliens');

INSERT INTO movie_actor (MOVIE_ID, ACTOR_ID)
VALUES (1, 1), (1, 2), (1, 3),
       (2, 4), (2, 5), (2, 6),
       (3, 7), (3, 8), (3, 9),
       (4, 10),
       (5, 11), (5, 12), (5, 4),
       (6, 1), (6, 13),
       (7, 4), (7, 2);

INSERT INTO genre (ID, NAME)
VALUES (1, '����������'),
       (2, '������'),
       (3, '�������'),
       (4, '�����'),
       (5, '��������'),
       (6, '�����'),
       (7, '�����������'),
       (8, '�������');

INSERT INTO movie_genre(MOVIE_ID, GENRE_ID)
VALUES (1, 1), (1, 2), (1, 3),
       (2, 4), (2, 1), (2, 3),
       (3, 4), (3, 1), (3, 5),
       (4, 3), (4, 6), (4, 4), (4, 5),
       (5, 1), (5, 2), (5, 6), (5, 7),
       (6, 2), (6, 3), (6, 7), (6, 8);



#����������� - ����������, ������, �������
#����� -   �����, ����������, �������
#����� - �����, ����������, ��������
#������ -  �������, �����, �����, ��������
#������ -  ����������, ������, �����, �����������