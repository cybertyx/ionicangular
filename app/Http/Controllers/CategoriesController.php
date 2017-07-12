<?php

namespace DeliveryQuick\Http\Controllers;

use Illuminate\Http\Request;
use DeliveryQuick\Models\Category;
use DeliveryQuick\Http\Requests\AdminCategoryRequest;

class CategoriesController extends Controller
{
    private $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }
    
    public function index() {
        $categories = $this->category->paginate(5);
        
        return view('admin.categories.index', compact('categories'));
    }
    
    public function create() {
        return view('admin.categories.create');
    }
    
    public function store(AdminCategoryRequest $request) {
        $dataForm = $request->all();
        $this->category->create($dataForm);
        
        return redirect()->route('categoriesIndex');
    }
    
    public function edit($id) {
        $cat = $this->category->find($id);
        
        return view('admin.categories.edit', compact('cat'));
    }
    
    public function upgrade(Request $request, $id) {
        $dataForm = $request->all();
        
        $this->category->find($id)->update($dataForm);
        
        return redirect()->route('categoriesIndex');
    }
    
    public function destroy($id) {
        $this->category->destroy($id);
        
        return redirect()->route('categoriesIndex');
    }
}
