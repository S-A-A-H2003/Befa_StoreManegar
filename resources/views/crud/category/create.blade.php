@extends('layouts.super_admin')
@section('title' , 'Category')
@section('content')
<x-general.container class=" h-screen" >
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" class=" p-10 w-full h-[23vh]">
        @csrf
        <x-form.form-input type="text" name="name" value="{{old('name')}}" lable="Name" placeholder="Category name" />
        <x-form.form-input type="file" name="picture" lable="picture" placeholder="Category picture"/>

        <p class=" text-gray-500 text-sm font-medium mb-4">Add product to category</p>
        <div class="h-60 overflow-y-scroll overflow-hidden mb-4 shadow-md rounded-md p-5">
            @forelse ($products as $product)
                <div class="flex items-center mb-4">
                    <input type="checkbox" name="checkboxes[]" value="{{$product->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <img src="{{$product->picture}}" class="w-9 h-9 rounded-full mx-1" alt="">
                    <label for="checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$product->name}} <a href="{{route('product.show' , $product->id)}}" class="text-blue-600 hover:underline dark:text-blue-500">view Product</a>.</label>
                </div>
            @empty
            <div class=" mt-12 flex flex-col justify-center items-center">
                <p class="text-gray-500">Create new product</p>
                <a href="{{route('product.create')}}" class="underline text-blue-400">Create now</a>
            </div>
            @endforelse
        </div>
        <button type="submit" class=" text-white bg-blue-500 rounded-md p-3">CREATE</button>

    </form>
</x-general.container>
@endsection
