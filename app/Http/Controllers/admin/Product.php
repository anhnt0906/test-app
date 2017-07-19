<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Product extends Controller
{
    public function index()
    {
        return view('admin.product.view');
    }

    public function createProduct()
    {
        return view('admin.product.create');
    }

    public function saveProduct(Request $request)
    {
        $this->validate($request,
            [
                'name'        => 'required|min:3|max:100',
                'description' => 'required|max:300',
                'price'       => 'required|max:10',
            ]
        );
    }

    public function editProduct($id)
    {
        return view('admin.product.edit');
    }

    public function saveEditProduct(Request $request)
    {
    }
}
