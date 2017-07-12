<?php

namespace DeliveryQuick\Services;
use DeliveryQuick\User;
use DeliveryQuick\Models\Client;

class ClientService{
    
    private $client, $user;
    
    public function __construct(Client $client, User $user) {
        $this->client = $client;
        $this->user = $user;
    }
    
    public function update(array $dataForm, $id) {
        $this->client->find($id)->update($dataForm);
        $this->user->find($id)->update($dataForm['user']);
    }
    
    public function create(array $dataForm) {
        $dataForm['user']['password'] = bcrypt(123456);
        
        $user = $this->user->create($dataForm['user']);
        
        $dataForm['user_id'] = $user->id;
        
        $this->client->create($dataForm);
        
    }
}