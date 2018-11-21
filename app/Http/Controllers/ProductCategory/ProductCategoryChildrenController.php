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
       
        // el select grande sin el GROUP BY

        $myselect ="SELECT  node.left as node_left, 
                        node.name as node_name, 
                        node.right as node_right, 
                        parent.left as parent_left, 
                        parent.name as parent_name, 
                        parent.right as parent_right, 
                        sub_parent.left as sub_parent_left, 
                        sub_parent.name as sub_parent_name, 
                        sub_parent.right as sub_parent_right,
                        st_depth + 1
                    FROM product_categories AS node,product_categories AS parent, product_categories AS sub_parent,
                    (SELECT node.left as st_node_left, node.name as st_node_name, (COUNT(parent.name) - 1) AS st_depth
                        FROM product_categories AS node,
                             product_categories AS parent
                        WHERE node.left BETWEEN parent.left AND parent.right AND node.id = 4
                        GROUP BY st_node_left, st_node_name
                        ORDER BY st_node_left) AS sub_tree
                    WHERE node.left BETWEEN parent.left AND parent.right
                    AND node.left BETWEEN sub_parent.left AND sub_parent.right
                    AND sub_parent.name = st_node_name
                    GROUP BY node_name";



         $myselect ="SELECT  node.left as node_left, 
                        node.name as node_name,
                        (COUNT(parent.name) - (sub_tree.st_depth + 1)) AS depth2
                    FROM product_categories AS node,product_categories AS parent, product_categories AS sub_parent,
                    (SELECT node.left as st_node_left, node.name as st_node_name, (COUNT(parent.name) - 1) AS st_depth
                        FROM product_categories AS node,
                             product_categories AS parent
                        WHERE node.left BETWEEN parent.left AND parent.right AND node.id = 1
                        GROUP BY st_node_left, st_node_name
                        ORDER BY st_node_left) AS sub_tree
                    WHERE node.left BETWEEN parent.left AND parent.right
                    AND node.left BETWEEN sub_parent.left AND sub_parent.right
                    AND sub_parent.name = st_node_name
                    GROUP BY node_left, node_name, sub_tree.st_depth";


            // el toque final del HAVNG Depth = 1 y el parametro externo


         $myselect = "SELECT node_name as category_id FROM
                (SELECT  node.left as node_left, 
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
                    GROUP BY node_left, node_name, sub_tree.st_depth
                    ORDER BY node_left) AS query
                WHERE depth = 1";


        $product_categories = DB::select(DB::raw($myselect));

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

   
}
