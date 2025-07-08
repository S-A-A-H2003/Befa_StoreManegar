@extends('layouts.super_admin')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">
    <a href="{{route('dashboard')}}" class=" text-blue-600 font-mono ">Home/</a>
    <a href="{{route('customer.index')}}" class=" text-blue-600 font-mono ">Customer/</a>
    <a href="{{URL::current()}}" class=" text-blue-600 font-mono ">Show</a>
</p>

<x-general.container class=" p-10 pl-3 h-fit flex flex-col items-center justify-center">
    <img class="rounded-t-lg w-[50vh] h-[50vh]" src="{{$user->information->photo ?? ''}}" alt="" />
    <div class=" p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$user->name}}</h5>
        <p class="text-gray-400"><span class=" text-gray-900 font-bold">EMAIL : </span> {{$user->email}}</p>
        <p class="text-gray-400"><span class=" text-gray-900 font-bold">CITY : </span>{{$user->information->city ?? ''}}</p>
        <p class="text-gray-400"><span class=" text-gray-900 font-bold">ADDRESS : </span>{{$user->information->address ?? ''}}</p>
        <p class="text-gray-400"><span class=" text-gray-900 font-bold">AGE : </span>{{$user->information->age ?? ''}}</p>
        <p class="text-gray-400"><span class=" text-gray-900 font-bold">GENDER : </span>{{$user->information->gender ?? ''}}</p>
        <p class="text-gray-400"><span class=" text-gray-900 font-bold">DATE BARTH : </span>{{$user->information->date_barth ?? ''}}</p>
    </div>
</x-general.container>

@endsection
