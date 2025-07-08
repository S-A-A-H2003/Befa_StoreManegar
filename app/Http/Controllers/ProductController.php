<?php

namespace App\Http\Controllers;

use App\Events\SendMailToNewProductEvent;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('viewAny' , [Product::class]);
        $success = session('success');
        $products = Product::search($request ,['name'])->paginate("15");
        return view('crud.product.index' , compact('success' , 'products'));

    }

    public function show(Product $product)
    {
        Gate::authorize('view' , [Product::class]);
        return view('crud.product.show' , compact('product'));
    }

    public function create()
    {
        Gate::authorize('create' , [Product::class]);
        $categorys = Category::all();
        return view('crud.product.create' , compact('categorys'));
    }

    public function store(StoreProductRequest $request)
    {
        Gate::authorize('create' , [Product::class]);
        $validated = $request->validated();
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('/product' , 'public');
            $validated['picture'] = $path;
        }
        $validated['rating'] = rand(0 , 5);
        $product = Product::create($validated);
        event(new SendMailToNewProductEvent($product));
        return redirect()->route('product.index')->with('success' , __('created'));
    }

    public function edit(Product $product)
    {
        Gate::authorize('update' , [Product::class]);
        return view('crud.product.edit' , compact('product'));
    }

    public function update(UpdateProductRequest $request , Product $product)
    {
        Gate::authorize('update' , [Product::class]);
        $old = $product->picture;
        $validated = $request->validated();
        if ($request->hasFile('picture')) {
             $path = $request->file('picture')->store('/product' , 'public');
             $validated['picture'] = $path;
        }
        $validated['rating'] = rand(0 , 5);
        $product->update($validated);

        if ($old != null && $old != $product->picture) {
            Storage::disk('public')->delete($old);
        }

        return redirect()->route('product.index')->with('success' , __("updated {$product->name}"));
    }

    public function destroy(Product $product)
    {
        Gate::authorize('delete' , [Product::class]);
        Product::destroy($product->id);
        Storage::disk('public')->delete($product->picture);
        return redirect()->route('product.index')->with('success' , __('Deleted ' . $product->name));
    }

}
