@extends('layouts.super_admin')
@section('title', 'Dashboard')

@section('content')
<div class="w-full h-screen p-8 flex justify-center">
    <div class="flex flex-col items-center">
        <div class=" flex justify ">
            <div class=" bg-white shadow-xl rounded-2xl p-8 w-fit mb-6 mr-4">
                <p class="text-gray-700">Product number : <span class=" text-blue-300 font-bold">{{$productNumber}}</span></p>
            </div>
            <div class=" bg-white shadow-xl rounded-2xl p-8 w-fit mb-6 mr-4">
                <p class="text-gray-700">Customer number : <span class=" text-blue-300 font-bold">{{$customerNumber}}</span></p>
            </div>
            <div class=" bg-white shadow-xl rounded-2xl p-8 w-fit mb-6 mr-4">
                <p class="text-gray-700">Category number : <span class=" text-blue-300 font-bold">{{$categoryNumber}}</span></p>
            </div>
        </div>
        <div class=" flex justify ">
            <div class="bg-white shadow-xl rounded-2xl p-6 w-full max-w-md text-center mr-4">
                <h2 class="text-xl font-bold mb-4 text-gray-700">Product Price</h2>
                <canvas id="doughnut" class="w-full h-auto"></canvas>
            </div>
            <div class="bg-white shadow-xl rounded-2xl p-6 w-full max-w-md text-center">
                <h2 class="text-xl font-bold mb-4 text-gray-700">Product Rating</h2>
                <canvas id="pie" class="w-full h-auto"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    const status1 = {{$status1}};
    const status2 = {{$status2}};
    const status3 = {{$status3}};
    const status4 = {{$status4}};
    const lessOfTowRating = {{$lessOfTowRating}};
    const moreOfTowRating = {{$moreOfTowRating}};
</script>
@endpush


