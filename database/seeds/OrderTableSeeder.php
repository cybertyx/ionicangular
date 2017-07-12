<?php

use Illuminate\Database\Seeder;
use DeliveryQuick\Models\Order;
use DeliveryQuick\Models\OrderItem;

class OrderTableSeeder extends Seeder
{
    
    public function run()
    {
        factory(Order::class, 5)->create()->each(function ($o) {
            for ($i=0; $i <= 2; $i++){
                $o->items()->save(factory(OrderItem::class)->make([
                    'product_id' => rand(1, 5),
                    'qtd' => 2,
                    'price' => 50,
                ]));
            }
        });
    }
}
