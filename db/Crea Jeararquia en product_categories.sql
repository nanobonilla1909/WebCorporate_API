
-- Crea la Jeraquia

INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (1, 'BEB', '0', 'Bebidas', '1', '18');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (2, 'WH', '1', 'Whisky', '2', '3');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (3, 'VI', '1', 'VInos', '4', '5');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (4, 'BB', '1', 'Bebidas Blancas', '6', '15');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (5, 'LI', '1', 'Licores', '16', '17');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (6, 'GI', '2', 'Gin', '7', '8');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (7, 'VO', '2', 'Vodka', '9', '14');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (8, 'VO-N', '3', 'Vodka Neutro', '10', '11');
INSERT INTO `web_corporate`.`product_categories` (`id`,`code`, `depth`, `name`, `left`, `right`) VALUES (9, 'VO-S', '3', 'Vodka Saborizados', '12', '13');


-- Query de prueba - trae el caminito hasta el nodo indicado


SELECT parent.name
FROM product_categories AS node,
        product_categories AS parent
WHERE node.left BETWEEN parent.left AND parent.right
        AND node.code = 'VO-S'
ORDER BY parent.left;


SELECT node.name, (COUNT(parent.name) - (sub_tree.depth + 1)) AS depth
FROM product_categories AS node,
        product_categories AS parent,
        product_categories AS sub_parent,
        (
                SELECT node.name, (COUNT(parent.name) - 1) AS depth
                FROM product_categories AS node,
                        product_categories AS parent
                WHERE node.left BETWEEN parent.left AND parent.right
                        AND node.id = 4
                GROUP BY node.name
                ORDER BY node.left
        )AS sub_tree
WHERE node.left BETWEEN parent.left AND parent.right -- ok
        AND node.left BETWEEN sub_parent.left AND sub_parent.right --ok
        AND sub_parent.name = sub_tree.name
GROUP BY node.name -- ok
HAVING depth = 1
ORDER BY node.left; -- ok




