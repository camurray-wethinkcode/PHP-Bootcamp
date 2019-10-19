SELECT UCASE(db_camurray.user_card.last_name) AS NAME, db_camurray.user_card.first_name, db_camurray.subscription.price
FROM db_camurray.subscription, db_camurray.user_card
WHERE price > 42
ORDER BY subscription.name ASC, user_card.first_name ASC;
