@extends('layouts.super_admin')
@section('title' , 'Create New Admin')
@section('content')
<x-general.container class=" h-screen" >
    <form action="{{route('createNewAdmin.store')}}" method="POST" class=" p-10 w-full h-[23vh]">
        @csrf
        <x-form.form-input type="text" name="name" value="{{old('name')}}" lable="Name" placeholder="name" />
        <x-form.form-input type="email" name="email" lable="email" value="{{old('email')}}" placeholder="email"/>
        <x-form.form-input type="password" name="password" lable="password" placeholder="password"/>
        <button type="submit" class=" text-white bg-blue-500 rounded-md p-3">CREATE</button>

    </form>
</x-general.container>
@endsection

