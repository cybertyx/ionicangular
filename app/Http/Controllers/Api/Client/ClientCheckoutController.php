<?php

namespace DeliveryQuick\Http\Controllers\Api\Client;

use Illuminate\Http\Request;
use \DeliveryQuick\Http\Controllers\Controller;
use \DeliveryQuick\User;
use DeliveryQuick\Services\OrderService;
use DeliveryQuick\Models\Order;
use Auth;

class ClientCheckoutController extends Controller
{

    /**
     * @var OrderService
     */
    private $service;
    private $user;
    private $order;
    
    public function __construct(User $user, Order $order, OrderService $service) {
        
        $this->user = $user;
        $this->order = $order;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //verificar bruno como fazer pra pegar o Id do usuario autenticado pelo Passport
        $clientId = $this->user->find(Auth::user()->id)->client->id;
        $orders = $this->order->with('items')->where('client_id', $clientId)->paginate(5);
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
        
        $clientId = $this->user->find(Auth::user()->id)->client->id;
        $dataForm['client_id'] = $clientId;
        $o = $this->service->create($dataForm);
        $o = $this->order->with('items')->find($o->id);    
        return $o;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $o = $this->order->with(['client', 'items', 'cupom'])->find($id);
        $o->items->each(function($item){
            $item->product;
        });
        return $o;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
