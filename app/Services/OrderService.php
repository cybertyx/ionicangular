<?php

namespace DeliveryQuick\Services;

use DeliveryQuick\User;
use DeliveryQuick\Models\Client;
use DeliveryQuick\Models\Products;
use DeliveryQuick\Models\Order;
use DeliveryQuick\Models\Cupom;

class OrderService {

    private $cupom;
    private $order;
    private $products;

    public function __construct(Order $order, Cupom $cupom, Products $products) {
        $this->order = $order;
        $this->cupom = $cupom;
        $this->products = $products;
    }

    public function create(array $dataForm) {

        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $dataForm['status'] = 0;

            if (isset($dataForm['cupom_code'])) {
                $cupom = $this->cupom->findByField('code', $dataForm['cupom_code'])->first();
                $dataForm['cupom'] = $cupom->id;
                $cupom->used = 1;
                $cupom->save();
                unset($dataForm['cupom_code']);
            }

            $items = $dataForm['items'];
            unset($dataForm['items']);

            $order = $this->order->create($dataForm);
            $total = 0;

            foreach ($items as $item) {
                $item['price'] = $this->products->find($item['product_id'])->price;
                $order->items()->create($item);
                $total += $item['price'] * $item['qtd'];
            }

            $order->total = $total;

            if (isset($cupom)) {
                $order->total = $total - $cupom->value;
            }
            
            $order->save();
            
            \Illuminate\Support\Facades\DB::commit();
            return $order;
        } catch (Exception $ex) {
            \Illuminate\Support\Facades\DB::rollback();
            throw $ex;
        }
    }

}
