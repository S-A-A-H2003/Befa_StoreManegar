@extends('layouts.super_admin')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">
    <a href="{{route('dashboard')}}" class=" text-blue-600 font-mono ">Home/</a>
    <a href="{{URL::current()}}" class=" text-blue-600 font-mono ">Category</a>
</p>

<x-general.container class=" p-5 h-fit">

    <x-general.table-header :value="$categorys" name="category" route="{{route('category.create')}}"/>


    <div class="overflow-x-auto">
        @if($success)
        <x-success.flash-message success="{{$success}}" />
        @endif

        <br>

        <div class=" flex flex-wrap ml-24">
            @forelse ($categorys as $category)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 m-3">
                <a href="{{route('category.show' , $category->id)}}">
                    <img class="rounded-t-lg w-[600px] h-[300px]" src="{{$category->picture}}" alt="" />
                </a>
                <div class=" p-5">
                    <a href="{{route('category.show' , $category->id)}}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$category->name}}
                        </h5>
                    </a>
                    <a href="{{route('category.show' , $category->id)}}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        VIEW
                    </a>
                </div>
            </div>
            @empty
            <div class=" w-full h-[50vh] flex items-center justify-center">
                <div class=" text-center">
                    <p class=" text-gray-500">Not found category yet!</p>
                    <a href="{{route('category.create')}}" class=" underline text-blue-400">Add new Category</a>
                </div>
            </div>
            @endforelse
        </div>

    </div>

    <x-general.table-nav :table="$categorys"/>


</x-general.container>

@endsection
