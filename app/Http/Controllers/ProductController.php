<?php

namespace App\Http\Controllers;

use App\Events\SendMailToNewProductEvent;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //Gate::authorize('viewAny' , [ProductPolicy::class]);
        $success = session('success');
        $products = Product::search($request ,['name'])->paginate("15");
        return view('crud.product.index' , compact('success' , 'products'));

    }

    public function show(Product $product)
    {
        //Gate::authorize('view' , [ProductPolicy::class]);
        return view('crud.product.show' , compact('product'));
    }

    public function create()
    {
        //Gate::authorize('create' , [ProductPolicy::class]);
        $categorys = Category::all();
        return view('crud.product.create' , compact('categorys'));
    }

    public function store(StoreProductRequest $request)
    {
        //Gate::authorize('create' , [ProductPolicy::class]);
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
        //Gate::authorize('update' , [ProductPolicy::class]);
        return view('crud.product.edit' , compact('product'));
    }

    public function update(UpdateProductRequest $request , Product $product)
    {
        //Gate::authorize('update' , [ProductPolicy::class]);
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
        //Gate::authorize('delete' , [ProductPolicy::class]);
        Product::destroy($product->id);
        return redirect()->route('product.index')->with('success' , __('Deleted ' . $product->name));
    }

}
