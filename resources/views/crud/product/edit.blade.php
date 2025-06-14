@extends('layouts.super_admin')
@section('content')

<x-general.container class="p-5 h-fit">
    <form action="{{route('product.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                    Name</label>
                <input type="text" name="name" id="name" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Type product name"  value="{{$product->name}}">
                    <x-error.one-error name="name"/>
            </div>
            {{--
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select
                        id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select category</option>
                        @forelse ($categorys as $category)
                            <option value="{{$product->$category->id}}" name="categorys[]">{{$product->$category->name}}</option>
                        @empty
                            <p>not category yet</p>
                        @endforelse
                    </select>
            </div> --}}
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="number" name="price" id="price" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="$999"  value="{{$product->price}}">
                    <x-error.one-error name="price"/>

            </div>
            <div>
                <label for="price_before" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price Before</label>
                <input type="number" name="price_before" id="price_before"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="$99"  value="{{$product->price_before}}">
                    <x-error.one-error name="price_before"/>

            </div>
            <div>
                <label for="inventory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">inventory</label>
                <input type="number" name="inventory" id="inventory" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="999"  value="{{$product->inventory}}">
                    <x-error.one-error name="inventory"/>

            </div>
            <div class="sm:col-span-2"><label for="discription"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discription</label>
                    <textarea
                    name="discription"
                    id="discription" rows="4" required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Write product discription here" value="{{$product->discription}}"></textarea>
                    <x-error.one-error name="discription"/>

            </div>
        </div>
        <div class="mb-4">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Images</span>
            <div class="flex justify-center items-center w-full">
                <label for="dropzone-file"
                    class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                            viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                            <span class="font-semibold">Click to upload</span>
                            or drag and drop
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                            800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="picture" class="hidden" required>
                    <x-error.one-error name="picture"/>

                </label>
            </div>
        </div>
        <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <button type="submit"
                class="w-full sm:w-auto justify-center text-gray-900 inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Add product
            </button>
        </div>


    </form>
</x-general.container>

@endsection
