@extends('layouts.super_admin')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">
    <a href="{{route('dashboard')}}" class=" text-blue-600 font-mono ">Home/</a>
    <a href="{{route('product.index')}}" class=" text-blue-600 font-mono ">Product/</a>
    <a href="{{URL::current()}}" class=" text-blue-600 font-mono ">Show</a>
</p>

<x-general.container class=" p-10  pl-3 h-fit">

    <div class=" w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 m-3">

        <img class="rounded-t-lg w-full h-[50vh]" src="{{$product->picture}}" alt="" />

        <div class=" p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
            <p class="text-gray-400"><span class=" text-gray-900 font-bold">price : </span> {{$product->price}}</p>
            <p class="text-gray-400"><span class=" text-gray-900 font-bold">price before : </span>{{$product->price_before}}</p>
            <p class="text-gray-400"><span class=" text-gray-900 font-bold">discription : </span>{{$product->discription}}</p>
            <p class="text-gray-400"><span class=" text-gray-900 font-bold">inventory : </span>{{$product->inventory}}</p>
            <p class="text-gray-400"><span class=" text-gray-900 font-bold">rating : </span>{{$product->rating}}</p>
        </div>
    </div>

</x-general.container>

@endsection
