-- Popula la Tabla Products y CharacterizedProducts

ALTER TABLE products AUTO_INCREMENT= 1;
INSERT INTO `web_corporate`.`products` (`name`,`price`,`product_type_id`, `product_category_id`) VALUES ('Whisky Johnnie Walker Black Label 12YO', 890, 1, 2);
INSERT INTO `web_corporate`.`products` (`name`,`price`,`product_type_id`, `product_category_id`) VALUES ('Vino DV Catena Malbec-Malbec x 750 cc', 320, 1, 3);
INSERT INTO `web_corporate`.`products` (`name`,`price`,`product_type_id`, `product_category_id`) VALUES ('Gin Bombay SAPPHIRE 12 x 500cc 47°', 625, 1, 6);
INSERT INTO `web_corporate`.`products` (`name`,`price`,`product_type_id`, `product_category_id`) VALUES ('Whisky White Horse 12X750 - UK', 400, 1, 2);
INSERT INTO `web_corporate`.`products` (`name`,`price`,`product_type_id`, `product_category_id`) VALUES ('Gin Bombay x 750 ml', 552, 1, 6);
INSERT INTO `web_corporate`.`products` (`name`,`price`,`product_type_id`, `product_category_id`) VALUES ('Amarula x 750 ml.', 375, 1, 5);
INSERT INTO `web_corporate`.`products` (`name`,`price`,`product_type_id`, `product_category_id`) VALUES ('Baileys x 500 ml.', 430, 1, 5);


INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (1, 2);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (2, 1);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (3, 3);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (4, 1);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (5, 1);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (6, 1);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (7, 3);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (3, 4);
INSERT INTO `web_corporate`.`characterized_products` (`product_id`, `product_characteristic_option_id`) VALUES (5, 4);


-- Query de Prueba 

select c.product_id,  p.name, ptc.name, pco.value 
from characterized_products c
  inner join product_characteristic_options pco on c.product_characteristic_option_id = pco.id
  inner join products p on (c.product_id = p.id)
  inner join product_type_characteristics ptc on (pco.product_type_characteristic_id = ptc.id)
  order by product_id;