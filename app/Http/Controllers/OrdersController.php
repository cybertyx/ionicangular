<?php

namespace DeliveryQuick\Http\Controllers;

use Illuminate\Http\Request;
use DeliveryQuick\Models\Order;
use DeliveryQuick\Models\OrderItem;
use DeliveryQuick\User;

class OrdersController extends Controller
{

    private $order;

    public function __construct(Order $order) {
        
        $this->order = $order;
    }
    
    public function index() {
        $orders = $this->order->paginate(5);
        
        return view('admin.orders.index', compact('orders'));
    }
    
    public function edit($id, User $user) {
        $list_status = [0=>'Pendente', 1=>'A Caminho', 2=>'Entregue'];
        $order = $this->order->find($id);
        
        $deliveryman = $user->where('role', 'deliveryman')->pluck('name','id');
        
        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }
    
    public function update(Request $request, $id) {
        $dataForm = $request->all();
        
        $this->order->find($id)->update($dataForm);
        
        return redirect()->route('ordersIndex');
    }
}
