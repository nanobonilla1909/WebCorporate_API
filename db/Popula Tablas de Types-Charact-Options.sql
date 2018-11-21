
-- Crea la Tabla Product Types / ProductTypeCharacteristics / ProductCharacteristicOptions

INSERT INTO `web_corporate`.`product_types` (`name`) VALUES ('Bebidas');
INSERT INTO `web_corporate`.`product_types` (`name`) VALUES ('Indumentaria');



INSERT INTO `web_corporate`.`product_type_characteristics` (`name`, `product_type_id`) VALUES ('Volumen', 1);
INSERT INTO `web_corporate`.`product_type_characteristics` (`name`, `product_type_id`) VALUES ('Marca', 1);
INSERT INTO `web_corporate`.`product_type_characteristics` (`name`, `product_type_id`) VALUES ('Alcoholica', 1);



INSERT INTO `web_corporate`.`product_characteristic_options` (`value`, `product_type_characteristic_id`) VALUES ('750ml', 1);
INSERT INTO `web_corporate`.`product_characteristic_options` (`value`, `product_type_characteristic_id`) VALUES ('1 Litro', 1);
INSERT INTO `web_corporate`.`product_characteristic_options` (`value`, `product_type_characteristic_id`) VALUES ('500cc', 1);
INSERT INTO `web_corporate`.`product_characteristic_options` (`value`, `product_type_characteristic_id`) VALUES ('Bombay', 2);

