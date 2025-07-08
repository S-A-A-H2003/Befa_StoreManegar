@extends('layouts.super_admin')
@section('title' , 'Category')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">
    <a href="{{route('dashboard')}}" class=" text-blue-600 font-mono ">Home/</a>
    <a href="{{route('category.index')}}" class=" text-blue-600 font-mono ">Category/</a>
    <a href="{{URL::current()}}" class=" text-blue-600 font-mono ">Edit</a>
</p>

<x-general.container class=" h-screen">
    <form action="{{route('category.update' , $category->id)}}" method="POST" enctype="multipart/form-data" class=" p-10 w-full h-[23vh]">
        @csrf
        @method('put')
        <x-form.form-input type="text" name="name" value="{{$category->name}}" lable="Name" placeholder="Category name" />
        <x-form.form-input type="file" name="picture" lable="picture" placeholder="Category picture"/>
        <img src="{{$category->picture}}" class=" w-[100px] h-[100px]" alt="">

        <p class=" text-gray-500 text-sm font-medium mb-4">Add product to category</p>
        <div class="h-60 overflow-y-scroll overflow-hidden mb-4 shadow-md rounded-md p-5">
            @foreach ($category->products as $product)
                <div class="flex items-center mb-4">
                    <input type="checkbox" name="checkboxes[]" value="{{$product->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                    <label for="checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$product->name}} <a href="{{route('product.show' , $product->id)}}" class="text-blue-600 hover:underline dark:text-blue-500">view Product</a>.</label>
                </div>
            @endforeach
            {{-- need some edit --}}
            @foreach($products as $product)
                @if (!in_array($product->id , $productsInCategory))
                    <div class="flex items-center mb-4">
                        <input type="checkbox" name="checkboxes[]" value="{{$product->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$product->name}} <a href="{{route('product.show' , $product->id)}}" class="text-blue-600 hover:underline dark:text-blue-500">view Product</a>.</label>
                    </div>
                @endif
            @endforeach
            {{-- to here --}}
        </div>
       <button type="submit" class="px-3 py-2  mr-3 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-700">EDIT</button>

    </form>
</x-general.container>
@endsection
