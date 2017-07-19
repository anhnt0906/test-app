<?php

namespace App\Http\Controllers\admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $data = Array();
        $data['products'] = Product::all();
        return view('admin.product.view', $data);
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
                'photo'       => 'required|max:10240',
            ]
        );
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $photo = $this->validImage($request);
        if ($photo) {
            $product->photo = $photo;
            if ($product->save()) {
                return redirect()->route('product.view');
            }
        }
        return redirect()->route('product.create')->with('msg', 'Image is not valid');
    }

    private function validImage(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $type = $file->getClientOriginalExtension();
            $extension = Array('jpg', 'png', 'gif');
            if (!in_array($type, $extension)) {
                return false;
            }
            return base64_encode(file_get_contents($file));
        }
        return false;
    }

    public function editProduct($id)
    {
        return view('admin.product.edit');
    }

    public function saveEditProduct(Request $request)
    {
    }
}
