<?php

namespace DeliveryQuick\Http\Controllers;

use Illuminate\Http\Request;
use DeliveryQuick\Models\Cupom;

class CupomsController extends Controller
{
    private $cupom;
    public function __construct(Cupom $cupom) {
        $this->cupom = $cupom;
    }
    
    public function index() {
        $cupoms = $this->cupom->paginate(5);
        
        return view('admin.cupoms.index', compact('cupoms'));
    }
    
    public function create() {
        return view('admin.cupoms.create');
    }
    
    public function store(Request $request) {
        $dataForm = $request->all();
        $this->cupom->create($dataForm);
        
        return redirect()->route('cupomsIndex');
    }
    
    public function edit($id) {
        $cupom = $this->cupom->find($id);
        
        return view('admin.cupoms.edit', compact('cupom'));
    }
    
    public function update(Request $request, $id) {
        $dataForm = $request->all();
        
        $this->cupom->find($id)->update($dataForm);
        
        return redirect()->route('cupomsIndex');
    }
    
    public function destroy($id) {
        $this->cupom->destroy($id);
        
        return redirect()->route('cupomsIndex');
    }
}
