<?php

namespace DeliveryQuick\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use DeliveryQuick\Http\Controllers\Controller;
use DeliveryQuick\User;
use Laravel\Passport\Client;

class RegisterController extends Controller {

    private $client;
    
    public function __construct() {
        $this->client = Client::find(1);
    }
    
    public function register(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt('password'),
            'role' => request('role')
        ]);

        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('email'),
            'password' => request('password'),
            'scope' => '*',
        ];

        $request->request->add($params);
        
        $proxy = \Illuminate\Support\Facades\Request::create('oauth/token', 'POST');
        
        return \Illuminate\Support\Facades\Route::dispatch($proxy);
    }

}