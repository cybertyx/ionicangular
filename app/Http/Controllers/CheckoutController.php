<?php

namespace DeliveryQuick\Http\Controllers;

use Illuminate\Http\Request;
use DeliveryQuick\Models\Order;
use DeliveryQuick\User;
use DeliveryQuick\Models\Products;
use DeliveryQuick\Services\OrderService;
use Auth;

class CheckoutController extends Controller {

    private $service;
    private $products;
    private $user;
    private $order;
    
    public function __construct(Order $order, User $user, Products $products, OrderService $service) {
        $this->order = $order;
        $this->user = $user;
        $this->products = $products;
        $this->service = $service;
    }

    public function index() {
        if (Auth::check()) {
            $clientId = $this->user->find(Auth::user()->id)->client->id;
//            $clientId = $this->user->find(Auth::user()->id);
            $orders = $this->order->where('client_id', $clientId)->paginate(5);
            return view('costumer.order.index', compact('orders'));
        }
    }

    public function create() {
        $products = $this->products->select('id', 'name', 'price')->get();

        return view('costumer.order.create', compact('products'));
    }

    public function store(Request $request) {
        $dataForm = $request->all();
        
        if (Auth::check()) {
            $clientId = $this->user->find(Auth::user()->id)->client->id;
//            $clientId = $this->user->find(Auth::user()->id);
            $dataForm['client_id'] = $clientId;
        }
        
        $this->service->create($dataForm);
        return redirect()->route('ordersindex');
    }

}
