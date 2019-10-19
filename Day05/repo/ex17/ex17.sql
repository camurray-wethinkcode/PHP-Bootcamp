SELECT count(id_sub) as nb_susc, FLOOR(AVG(price)) as av_susc, SUM(duration_sub % 42) as ft
FROM subscription;
