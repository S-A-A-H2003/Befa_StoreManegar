@extends('layouts.super_admin')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">
    <a href="{{route('dashboard')}}" class=" text-blue-600 font-mono ">Home/</a>
    <a href="{{route('product.index')}}" class=" text-blue-600 font-mono ">Product/</a>
    <a href="{{URL::current()}}" class=" text-blue-600 font-mono ">Create</a>
</p>

<x-general.container class="p-5 h-fit">
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                    Name</label>
                <input type="text" name="name" id="name" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Type product name"  value="{{old('name')}}">
                    <x-error.one-error name="name"/>
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="number" name="price" id="price" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="$999"  value="{{old('price')}}">
                    <x-error.one-error name="price"/>

            </div>
            <div>
                <label for="price_before" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price Before</label>
                <input type="number" name="price_before" id="price_before"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="$99"  value="{{old('price_before')}}">
                    <x-error.one-error name="price_before"/>

            </div>
            <div>
                <label for="inventory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">inventory</label>
                <input type="number" name="inventory" id="inventory" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="999"  value="{{old('inventory')}}">
                    <x-error.one-error name="inventory"/>

            </div>
            <div class="sm:col-span-2"><label for="discription"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discription</label>
                    <textarea
                    name="discription"
                    id="discription" rows="4" required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Write product discription here" value="{{old('discription')}}"></textarea>
                    <x-error.one-error name="discription"/>

            </div>
        </div>
        <div class="mb-4">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Images</span>
            <div class="w-full">
                <input type="file" name="picture" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                <x-error.one-error name="picture"/>
            </div>
        </div>
        <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <button type="submit" class=" text-white bg-blue-500 rounded-md p-3">CREATE</button>
        </div>


    </form>
</x-general.container>

@endsection
