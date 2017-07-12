<?php

namespace DeliveryQuick\Http\Controllers;

use Illuminate\Http\Request;
use DeliveryQuick\Models\Client;
use DeliveryQuick\Services\ClientService;

class ClientsController extends Controller
{
    private $client, $clientService;
    
    public function __construct(Client $client, ClientService $clientService) {
        $this->client = $client;
        $this->clientService = $clientService;
    }
    
    public function index() {
        $clients = $this->client->paginate(5);
        
        return view('admin.clients.index', compact('clients'));
    }
    
    public function create() {
        return view('admin.clients.create');
    }
    
    public function store(Request $request) {
        $dataForm = $request->all();
        
        $this->clientService->create($dataForm);
        
        return redirect()->route('productsIndex');
    }
    
    public function edit($id) {
        $clients = $this->client->find($id);
                
        return view('admin.clients.edit', compact('clients'));
    }
    
    public function update(Request $request, $id) {
        $dataForm = $request->all();
        
        $this->clientService->update($dataForm, $id);
        
        return redirect()->route('clientsIndex');
    }
    
    public function destroy($id) {
        $this->client->destroy($id);
        
        return redirect()->route('clientsIndex');
    }
}
