<?php

namespace App\Http\Controllers;

use App\Events\SendMailToNewProductEvent;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Product\BasicCrudProcessToProducts;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request , BasicCrudProcessToProducts $index)
    {
        $success = session('success');
        $products = $index->index($request);
        return view('crud.product.index' , compact('success' , 'products'));

    }

    public function show(Product $product)
    {
        return view('crud.product.show' , compact('product'));
    }

    public function create()
    {
        $categorys = Category::all();
        return view('crud.product.create' , compact('categorys'));
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('/product/pictures' , 'public');
            $validated['picture'] = $path;
        }
        $validated['rating'] = rand(0 , 5);
        $product = Product::create($validated);
        event(new SendMailToNewProductEvent($product));
        return redirect()->route('product.index')->with('success' , __('created'));
    }

    public function edit(Product $product)
    {
        return view('crud.product.edit' , compact('product'));
    }

    public function update(UpdateProductRequest $request , Product $product)
    {
        $validated = $request->validated();
        if ($request->hasFile('picture')) {
             $path = $request->file('picture')->store('/product/pictures' , 'public');
             $validated['picture'] = $path;
        }
        $validated['rating'] = rand(0 , 5);
        $product->update($validated);
        return redirect()->route('product.index')->with('success' , __("updated {$product->name}"));
    }

    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('product.index')->with('success' , __('Deleted ' . $product->name));
    }


    public function trash(Product $product)
    {

    }


    public function restore(Product $product)
    {

    }


    public function forcDelete($id)
    {

    }
}
