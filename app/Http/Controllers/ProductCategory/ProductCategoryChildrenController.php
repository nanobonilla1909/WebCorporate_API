<?php

namespace App\Http\Controllers\ProductCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\Http\Controllers\ApiController;

class ProductCategoryChildrenController extends ApiController
{
    


    public function inmediate_children($id)
    {
       
  

        $myselect = "SELECT node_left, node_id as category_id, node_name as category_name FROM
                (SELECT  node.left as node_left,
                        node.id as node_id, 
                        node.name as node_name
                    FROM product_categories AS node,product_categories AS parent, product_categories AS sub_parent,
                    (SELECT node.left as st_node_left, node.name as st_node_name, (COUNT(parent.name) - 1) AS st_depth
                        FROM product_categories AS node,
                             product_categories AS parent
                        WHERE node.left BETWEEN parent.left AND parent.right AND node.id = " . $id . "
                        GROUP BY st_node_left, st_node_name
                        ORDER BY st_node_left) AS sub_tree
                    WHERE node.left BETWEEN parent.left AND parent.right
                    AND node.left BETWEEN sub_parent.left AND sub_parent.right
                    AND sub_parent.name = st_node_name
                    ) AS query ORDER BY node_left";



         $myselect = "SELECT node_left, node_id as category_id, node_name as category_name FROM
                (SELECT  node.left as node_left,
                        node.id as node_id, 
                        node.name as node_name,
                        (COUNT(parent.name) - (sub_tree.st_depth + 1)) AS depth
                    FROM product_categories AS node,product_categories AS parent, product_categories AS sub_parent,
                    (SELECT node.left as st_node_left, node.name as st_node_name, (COUNT(parent.name) - 1) AS st_depth
                        FROM product_categories AS node,
                             product_categories AS parent
                        WHERE node.left BETWEEN parent.left AND parent.right AND node.id = " . $id . "
                        GROUP BY st_node_left, st_node_name
                        ORDER BY st_node_left) AS sub_tree
                    WHERE node.left BETWEEN parent.left AND parent.right
                    AND node.left BETWEEN sub_parent.left AND sub_parent.right
                    AND sub_parent.name = st_node_name
                    GROUP BY node_left, node_id, node_name, sub_tree.st_depth
                    ORDER BY node_left) AS query
                WHERE depth = 1 ORDER BY node_left";




        $product_categories = DB::select(DB::raw($myselect));
        // dd($product_categories);

        return response()->json(['data' => $product_categories], 200);
        // return $this->showAll($product_categories);
    }


    /*
        Dada una Categoria trae todas las Categorias Hojas de dicha categoria.
    */

    public function last_children($id) {


      $myselect = "SELECT node.name, node.left, node.right
            FROM product_categories AS node,product_categories AS parent
            WHERE node.left BETWEEN parent.left AND parent.right AND node.right = node.left + 1
            AND parent.id = " . $id . "
            ORDER BY node.left";


        $product_categories = DB::select(DB::raw($myselect));

        return response()->json(['data' => $product_categories], 200);

    }


    /*
        Dada una Categoria trae todos los Productos pertenecientes a algun nodo terminal del arbol de dicha categoria.
    */

    public function last_products_children($id) {


        $myselect = "SELECT * from products where product_category_id in 
                    (SELECT query1.categoria_hoja FROM 
                        (SELECT node.left, node.id AS categoria_hoja
                            FROM product_categories AS node,product_categories AS parent
                            WHERE node.left BETWEEN parent.left AND parent.right AND node.right = node.left + 1 AND parent.id = " . $id . "
                            ORDER BY node.left) AS query1)";



        $product_categories = DB::select(DB::raw($myselect));

        return response()->json(['data' => $product_categories], 200);

    }


    /*
        Dada una Categoria trae todos los Productos pertenecientes a algun nodo terminal del arbol de dicha categoria, pero con sus atributos.
    */

    public function last_products_children_characterized($id) {


        $myselect = "SELECT characterized_products.product_id,  
                            product_type_characteristics.id as type_id, 
                            product_type_characteristics.name,
                            product_characteristic_options.id as options_id,
                            product_characteristic_options.value                           
                    FROM products 
                    JOIN characterized_products on products.id = characterized_products.product_id
                    JOIN product_characteristic_options on characterized_products.product_characteristic_option_id = product_characteristic_options.id
                    JOIN product_type_characteristics on product_characteristic_options.product_type_characteristic_id=product_type_characteristics.id
                    WHERE product_category_id in 
                    (SELECT query1.categoria_hoja FROM 
                        (SELECT node.left, node.id AS categoria_hoja
                            FROM product_categories AS node,product_categories AS parent
                            WHERE node.left BETWEEN parent.left AND parent.right AND node.right = node.left + 1 AND parent.id = " . $id . "
                            ORDER BY node.left) AS query1) ORDER BY products.id" ;



        $product_categories = DB::select(DB::raw($myselect));

        return response()->json(['data' => $product_categories], 200);

    }

   
}
