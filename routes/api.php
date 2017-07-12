<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

$this->post('register', 'Api\Auth\RegisterController@register');
$this->post('login', 'Api\Auth\LoginController@login');
$this->post('refresh', 'Api\Auth\LoginController@refresh');

$this->middleware('auth:api')->group(function () {

    $this->group(['prefix' => 'client','middleware'=>'oauth.checkrole:client'], function () {
        Route::resource('order', 'Api\Client\ClientCheckoutController', ['except' => ['create', 'update', 'destroy']]);
    });

    $this->group(['prefix' => 'deliveryman','middleware'=>'oauth.checkrole:deliveryman'], function () {
        $this->get('pedidos', function() {
            return [
                'id' => 1,
                'client' => 'Luiz Carlos - Entregador',
                'total' => 10
            ];
        });
    });
    
    $this->post('logout', 'Api\Auth\LoginController@logout');
});
