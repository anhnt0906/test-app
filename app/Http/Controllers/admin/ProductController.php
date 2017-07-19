<?php

namespace App\Http\Controllers\admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.view', ['products' => $products]);
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
        $product = Product::find($id);
        return view('admin.product.edit', ['product' => $product]);
    }

    public function saveEditProduct(Request $request,$id)
    {
        $this->validate($request,
            [
                'name'        => 'required|min:3|max:100',
                'description' => 'required|max:300',
                'price'       => 'required|max:10',
            ]
        );
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->hasFile('photo')) {
            $this->validate($request, ['photo' => 'max:10240',]);
            $photo = $this->validImage($request);
            if ($photo) {
                $product->photo = $photo;
            }
        }
        if($product->save()){
            return redirect()->route('product.view')->with('msg','Edit product successfully');
        }
    }

    public function deleteProduct($id)
    {
        $msg = "Deleted product fail";
        if (Product::where('id', $id)->update(['deleted' => 1])) {
            $msg = "Deleted product successfully";
        }
        return redirect()->back()->with('msg', $msg);
    }
}
