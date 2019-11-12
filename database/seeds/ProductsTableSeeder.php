<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = [
            'name' => 'FIFA 20',
            'image' => 'products/fifa20.jpeg',
            'price' => 23000,
            'description' => 'FIFA 20 is a football simulation video game published by Electronic Arts as part of the FIFA series. It is the 27th installment in the FIFA series, and was released on 27 September 2019 for Microsoft Windows, PlayStation 4, Xbox One, and Nintendo Switch.'
        ];

        $product2 = [
            'name' => 'COD Modern Warefare',
            'image' => 'products/cod.jpeg',
            'price' => 21000,
            'description' => 'Call of Duty: Modern Warfare is a first-person shooter video game developed by Infinity Ward and published by Activision.'
        ];

        Product::create($product1);
        Product::create($product2);
    }
}
