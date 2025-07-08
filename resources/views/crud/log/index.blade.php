@extends('layouts.super_admin')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">
    <a href="{{route('dashboard')}}" class=" text-blue-600 font-mono ">Home/</a>
    <a href="{{URL::current()}}" class=" text-blue-600 font-mono ">Log</a>
</p>

<x-general.container class="p-5 h-fit">

    {{-- Table Header --}}
    <x-general.table-header :value="$logs" />

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                @if($logs->count()==0)
                @else
                <tr>
                    <th scope="col" class=" p-4 text-center">User Id</th>
                    <th scope="col" class=" p-4 text-center">Table</th>
                    <th scope="col" class=" p-4 text-center">Proccess Name</th>
                    <th scope="col" class=" p-4 text-center">Proccess</th>
                    <th scope="col" class=" p-4 text-center">In</th>
                </tr>
                @endif
            </thead>
            <tbody>

                @forelse($logs as $log)

                        <td class="px-4 py-3 text-center">
                            <span class=" text-blue-400 underline text-xs font-medium px-2 py-0.5 rounded cursor-default">
                                <a href="{{route('customer.show' , $log->user_id)}}">{{$log->user_id}}</a>
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class=" text-black text-xs font-medium px-2 py-0.5 rounded uppercase">
                                {{json_decode($log->information)->table_name}}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class=" text-black text-xs font-medium px-2 py-0.5 rounded uppercase">
                                {{json_decode($log->information)->proccess_name}}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class=" text-blue-400 underline text-xs font-medium px-2 py-0.5 rounded cursor-default">
                               <a href="{{route(json_decode($log->information)->table_name . '.show' , json_decode($log->information)->proccess->id)}}">
                                {{json_decode($log->information)->proccess->id}}
                               </a>
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center uppercase">{{$log->created_at}}</td>
                    </tr>
                @empty
                    <div class=" w-full h-[50vh] flex items-center justify-center">
                        <div class=" text-center">
                            <p class=" text-gray-500">Not found any action yet!</p>
                        </div>
                    </div>
                @endforelse


            </tbody>
        </table>
    </div>
    <x-general.table-nav :table="$logs" />
</x-general.container>
@endsection
