<?php

use Illuminate\Database\Seeder;
use DeliveryQuick\Models\Category;
use DeliveryQuick\Models\Products;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 10)->create();
    }
}
