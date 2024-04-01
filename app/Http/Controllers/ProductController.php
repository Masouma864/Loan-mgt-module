<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function sellProduct(Request $request)
    {
        $productId = $request->input('product_id');
        $customerId = $request->input('customer_id');
        $paidAmount = $request->input('paid_amount');
        $product = Product::find($productId);
        $customer = Customer::find($customerId);

    
        if ($paidAmount < $product->price) {
           
            $customer->is_in_debt = true;
            $customer->save();
          }  }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);
   
        $data = $request->except('_token');
    
        Product::create($data);
    
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

   
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);
    
        $data = $request->except(['_token']);
    
        $product->update($data);
    
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }
    

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
