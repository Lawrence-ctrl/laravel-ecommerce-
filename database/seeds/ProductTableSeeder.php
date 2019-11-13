<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Fresh Bananas (1Kg)',
            'product_images' => '29.png',
            'product_price' => '1500',
            'product_previous_price' => '2000',
            'product_quantity' => '2',
            'likes' => '1',
            'category_id' => '2',
            'product_description' => 'so fresh banana!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('products')->insert([
            'product_name' => 'Fresh Cauliflower (2Kg)',
            'product_images' => '30.png',
            'product_price' => '1000',
            'product_previous_price' => '1300',
            'product_quantity' => '1',
            'likes' => '2',
            'category_id' => '1',
            'product_description' => 'so fresh cauli!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'product_name' => 'Fresh Mangos (1Kg)',
            'product_images' => '29.png',
            'product_price' => '300',
            'product_previous_price' => '200',
            'product_quantity' => '2',
            'likes' => '3',
            'category_id' => '2',
            'product_description' => 'so fresh mango!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'product_name' => 'Fresh Onions (1Kg)',
            'product_images' => '29.png',
            'product_price' => '100',
            'product_previous_price' => '200',
            'product_quantity' => '2',
            'likes' => '4',
            'category_id' => '2',
            'product_description' => 'so fresh onion!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
