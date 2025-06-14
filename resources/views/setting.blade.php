@extends('layouts.super_admin')
@section('title' , 'Category')
@section('content')
<x-general.container class=" h-fit p-8">
    @if($success)
    <div>
        <x-success.flash-message success="{{$success}}" />
    </div>
    @endif
    <form action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Select your
            Language</label>
        <select name="settings[local]"
            class="bg-gray-50 border p-4 border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @if($local == 'en')
                <option value="en" selected>English</option>
                <option value="ar">Arabic</option>
            @elseif($local == 'ar')
                <option value="en">English</option>
                <option value="ar" selected>Arabic</option>
            @else
                <option value="en" selected>English</option>
                <option value="ar">Arabic</option>
            @endif
        </select>

        <br>
        <div >
            <x-form.form-input type="file" name="logo" lable="Logo" placeholder="logo app" />
            @if ($logo)
                <img src="{{Storage::url($logo)}}" width="100px" height="100px" class=" rounded-md" alt="Logo">
            @endif

        </div>

        <br>

        <button type="submit" class=" p-3 bg-blue-500 text-white rounded-md hover:scale-110">Save</button>
    </form>
    <form action="{{route('setting.default')}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500 rounded-md mt-3 underline focus:text-green-400 hover:font-bold transition-transform" >Back to default setting</button>
    </form>
</x-general.container>
@endsection

