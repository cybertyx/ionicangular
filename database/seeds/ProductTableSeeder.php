<?php

use Illuminate\Database\Seeder;
use DeliveryQuick\Models\Products;
use DeliveryQuick\Models\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 10)->create()->each(function($c){
            for($i=0; $i<=5; $i++){
                $c->products()->save(factory(Products::class)->make());
            }
        });
    }
}
