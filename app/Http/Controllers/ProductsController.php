<?php

namespace DeliveryQuick\Http\Controllers;

use Illuminate\Http\Request;
use DeliveryQuick\Models\Products;
use DeliveryQuick\Models\Category;

class ProductsController extends Controller
{
    private $product;
    private $category;
    
    public function __construct(Products $product, Category $category) {
        $this->product = $product;
        $this->category = $category;
    }
    
    public function index() {
        $products = $this->product->paginate(5);
        
        return view('admin.products.index', compact('products'));
    }
    
    public function create() {
        $categories = $this->category->pluck('name', 'id');
        return view('admin.products.create', compact('categories'));
    }
    
    public function store(Request $request) {
        $dataForm = $request->all();
        
        $this->product->create($dataForm);
        
        return redirect()->route('productsIndex');
    }
    
    public function edit($id) {
        $product = $this->product->find($id);
        
        $categories = $this->category->pluck('name', 'id');
        
        return view('admin.products.edit', compact('product', 'categories'));
    }
    
    public function update(Request $request, $id) {
        $dataForm = $request->all();
        
        $this->product->find($id)->update($dataForm);
        
        return redirect()->route('productsIndex');
    }
    
    public function destroy($id) {
        $this->product->destroy($id);
        
        return redirect()->route('productsIndex');
    }
}
