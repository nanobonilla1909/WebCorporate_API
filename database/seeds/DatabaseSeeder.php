<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
        

    	DB::statement('SET FOREIGN_KEY_CHECKS=0');


    	/* Carga product_types */
		
		DB::table('product_types')->delete();
		DB::statement('ALTER TABLE product_types AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/product_types.csv',';');
		DB::table('product_types')->insert($seedData);


		/* Carga product_categories */
		
		DB::table('product_categories')->delete();
		DB::statement('ALTER TABLE product_categories AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/product_categories.csv',';');
		DB::table('product_categories')->insert($seedData);


		/* Carga products */
		
		DB::table('products')->delete();
		DB::statement('ALTER TABLE products AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/products.csv',';');
		DB::table('products')->insert($seedData);



    	/* Carga product_type_characteristis */
		
		DB::table('product_type_characteristics')->delete();
		DB::statement('ALTER TABLE product_type_characteristics AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/product_type_characteristics.csv',';');
		DB::table('product_type_characteristics')->insert($seedData);



    	/* Carga product_type_characteristis */
		
		DB::table('product_characteristic_options')->delete();
		DB::statement('ALTER TABLE product_characteristic_options AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/product_characteristic_options.csv',';');
		DB::table('product_characteristic_options')->insert($seedData);



		/* Carga characterized_products */

		DB::table('characterized_products')->delete();
		DB::statement('ALTER TABLE characterized_products AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/characterized_products.csv',';');
		DB::table('characterized_products')->insert($seedData);


        /* Carga home_page_category_orders */

        DB::table('home_page_category_orders')->delete();
        DB::statement('ALTER TABLE home_page_category_orders AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/home_page_category_orders.csv',';');
        DB::table('home_page_category_orders')->insert($seedData);


        /* Carga featured_products */

        DB::table('featured_products')->delete();
        DB::statement('ALTER TABLE featured_products AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/featured_products.csv',';');
        DB::table('featured_products')->insert($seedData);
        

        /* Carga highlighted_items */

        DB::table('highlighted_items')->delete();
        DB::statement('ALTER TABLE highlighted_items AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/highlighted_items.csv',';');
        DB::table('highlighted_items')->insert($seedData);


        /* Carga Carro de Compras Temporario */

        DB::table('carts')->delete();
        DB::statement('ALTER TABLE carts AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/carts.csv',';');
        DB::table('carts')->insert($seedData);

        DB::table('cart_items')->delete();
        DB::statement('ALTER TABLE cart_items AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/cart_items.csv',';');
        DB::table('cart_items')->insert($seedData);
        
        DB::table('companies')->delete();
        DB::statement('ALTER TABLE companies AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/companies.csv',';');
        DB::table('companies')->insert($seedData);
        
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/users.csv',';');
        DB::table('users')->insert($seedData);


		
        DB::table('delivery_types')->delete();
        DB::statement('ALTER TABLE delivery_types AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/delivery_types.csv',';');
        DB::table('delivery_types')->insert($seedData);

        DB::table('company_deliveries')->delete();
        DB::statement('ALTER TABLE company_deliveries AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/company_deliveries.csv',';');
        DB::table('company_deliveries')->insert($seedData);

        DB::table('delivery_locations')->delete();
        DB::statement('ALTER TABLE delivery_locations AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/delivery_locations.csv',';');
        DB::table('delivery_locations')->insert($seedData);

        DB::table('deliveries')->delete();
        DB::statement('ALTER TABLE deliveries AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/deliveries.csv',';');
        DB::table('deliveries')->insert($seedData);



        DB::table('banks')->delete();
        DB::statement('ALTER TABLE banks AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/banks.csv',';');
        DB::table('banks')->insert($seedData);

        DB::table('payment_methods')->delete();
        DB::statement('ALTER TABLE payment_methods AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/payment_methods.csv',';');
        DB::table('payment_methods')->insert($seedData);

        DB::table('bank_benefits')->delete();
        DB::statement('ALTER TABLE bank_benefits AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/bank_benefits.csv',';');
        DB::table('bank_benefits')->insert($seedData);


        DB::table('order_types')->delete();
        DB::statement('ALTER TABLE order_types AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/order_types.csv',';');
        DB::table('order_types')->insert($seedData);

        DB::table('order_statuses')->delete();
        DB::statement('ALTER TABLE order_statuses AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/order_statuses.csv',';');
        DB::table('order_statuses')->insert($seedData);

        DB::table('orders')->delete();
        DB::statement('ALTER TABLE orders AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/orders.csv',';');
        DB::table('orders')->insert($seedData);

        DB::table('order_items')->delete();
        DB::statement('ALTER TABLE order_items AUTO_INCREMENT = 1;');
        $seedData = $this->seedFromCSV(app_path().'/DatosSeedDatabase/order_items.csv',';');
        DB::table('order_items')->insert($seedData);


		
		DB::statement('SET FOREIGN_KEY_CHECKS=0');


    }

    private function seedFromCSV ($filename, $delimitator = ',')
    {

    	var_dump($filename);
    	if (!file_exists($filename) || !is_readable($filename)) {
    		// return FALSE;
    		var_dump("exists");
    		var_dump(file_exists($filename));
    		var_dump("is readable");
    		var_dump(is_readable($filename));
    		return array();
    		
    	}

    	$header = NULL;
    	$data = array();

    	if(($handle = fopen($filename, 'r')) !== FALSE)
    	{

    		while (($row = fgetcsv($handle, 1000, $delimitator)) != FALSE)
    		{
    			if (!$header) {
    				$header = $row;
    			} else {
    				$data[] = array_combine($header, $row);
    			}
    		}
    		fclose($handle);
    	}

		// var_dump($data);
    	return $data;
    }
}
