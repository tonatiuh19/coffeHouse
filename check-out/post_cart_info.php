<?php
  header('Content-Type: text/plain');
  $test = utf8_encode($_POST['price']); // Don't forget the encoding
  $data = json_decode($test);
  //echo $data;
  print_r($data)
  exit();


  SELECT a.id_products, a.quantity, a.id_order, c.name FROM carts as a
INNER JOIN (SELECT max(id_orders) as 'id_orders' FROM `orders` WHERE email_user='peke@gmail.com') as b on b.id_orders=a.id_order
INNER JOIN products as c on c.id_products=a.id_products

SELECT id_prices, id_products
FROM prices
WHERE date=(
SELECT MAX(date) FROM prices );
 ?>