@extends('layouts.super_admin')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">Home /<a href="{{route('category.index')}}"
        class=" text-blue-300 text-lg font-bold"> Category / <a href="{{URL::current()}}"
            class=" text-blue-300 text-lg font-bold"> Show /</a></a>
</p>
<x-general.container class=" p-10  pl-3 h-fit">

    <div class=" w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 m-3">

        <img class="rounded-t-lg w-full h-[50vh]" src="{{$category->picture}}" alt="" />

        <div class=" p-5">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$category->name}}
            </h5>
            <p class=" text-gray-500">Products</p>
            <div class=" rounded-md shadow-md p-3 w-full h-[20vh] overflow-hidden">
                @forelse ($category->products as $product)
                <div class=" flex items-center">
                    <img src="{{$product->picture}}" class="w-9 h-9 rounded-full mx-2" alt="">
                    <p class=" text-gray-500">{{$product->name}} <a href="{{route('product.show' , $product->id)}}"
                            class="text-blue-600 hover:underline dark:text-blue-500">view Product</a>.</p>
                </div>
                @empty
                <div class=" text-center">
                    <p class="text-gray-500">Not found product yet!</p>
                    <a href="{{route('category.edit' , $category->id)}}" class="underline text-blue-400">Add products</a>
                </div>
                @endforelse
            </div>
            <br>
            <div class=" flex">
                <a href="{{route('category.edit' , $category->id)}}"
                    class="px-3 py-2  mr-3 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-700">
                    EDIT
                </a>
                <form action="{{route('category.destroy' , $category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        DELETE
                    </button>
                </form>
            </div>
        </div>
    </div>



</x-general.container>

@endsection
