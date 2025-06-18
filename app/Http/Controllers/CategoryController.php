<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $success = Session::get('success');
        $categorys = Category::search($request , ['name'])->paginate('4');
        $count = Category::count();
        return view('crud.category.index' , compact('success' , 'categorys' , 'count'));
    }

    public function show(Category $category)
    {
        $product = $category->products();
        return view('crud.category.show' , compact('category' , 'product'));
    }

    public function create()
    {
        $products = Product::all();
        return view('crud.category.create' , compact('products'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $validation = $request->validated();

        if($request->hasFile('picture'))
        {
            $path = $request->file('picture')->store('/category/pictures' ,'public');
        }
        $validation['picture'] = $path;
        try {
            DB::beginTransaction();
            $category = Category::create($validation);
            $category->products()->attach($request->input('checkboxes') , ["create_at" => now()]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return redirect()->route('category.index')->with('success' , 'The Category '.$category->name ?? ' '.' is created 👍');
    }

    public function edit(Category $category)
    {
        $products = Product::all();
        $productsInCategory = [];
        foreach ($category->products as $product) {
            $productsInCategory[] = $product->id;
        }
        return view('crud.category.edit' , compact('category' , 'products' , 'productsInCategory'));
    }

    public function update(UpdateCategoryRequest $request , Category $category)
    {
        $validation = $request->validated();

        $old = $category->picture;

        if($request->hasFile('picture'))
        {
            $path = $request->file('picture')->store('/category/pictures' , 'public');
            $validation['picture'] = $path;
        }



        try {
            DB::beginTransaction();
            $category->update($validation);
            $data = [];
            if ($request->input('checkboxes')) {
                foreach ($request->input('checkboxes') as $id) {
                   $data[$id] = ['create_at' => now()];
                }
            }
            $category->products()->sync($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        if ($old && $old != $category->picture) {
            Storage::disk('public')->delete($old);
        }

        return redirect()->route('category.index')->with('success' , 'The Category '.$category->name.'is updated 👍');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success' , 'The Category '.$category->name.'is deleted 👍');
    }


    public function trash()
    {

        $success = Session::get('success');

        $categoryTrash = Category::onlyTrash()->all();

        return view('crud.category.trash' , compact('categoryTrash' , 'success'));

    }


    public function restore($id)
    {
        $categoryTrash = Category::onlyTrash()->findOrFail($id);

        $categoryTrash->restore();

        return redirect()->route('category.trash')->with('success' , 'The Category '.$categoryTrash->name.'is restore 👍');

    }


    public function forcDelete($id)
    {
        $categoryTrash = Category::withTrash()->findOrFail($id);

        $categoryTrash->forcDelete();

        Storage::disk('public')->delete($categoryTrash->picture);

        return redirect()->route('category.trash')->with('success' , 'The Category '.$categoryTrash->name.'is deleted 👍');
    }
}
