@extends('layouts.super_admin')
@section('content')

<x-general.navbar />
<x-general.container class="p-5 h-fit">

    {{-- Table Header --}}
    <x-general.table-header :value="$users" name="product" route="{{route('product.create')}}" />

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class=" p-4 text-center">Id</th>
                    <th scope="col" class=" p-4 text-center">name</th>
                    <th scope="col" class=" p-4 text-center">email</th>
                    <th scope="col" class=" p-4 text-center">Create At</th>
                    <th scope="col" class=" p-4 text-center">Update At</th>
                    <th scope="col" class=" p-4 text-center"></th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                        <td class="px-4 py-3 text-center">
                            <span class=" text-blue-400 underline text-xs font-medium px-2 py-0.5 rounded cursor-default">
                               {{$user->id}}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class=" text-black text-xs font-medium px-2 py-0.5">
                                <div class=" flex items-center justify-center">
                                    <img src="{{$user->information->photo ?? ''}}" class=" w-8 h-8 rounded-full mr-4" alt="">
                                    {{$user->name}}
                                </div>
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class=" text-center px-2 py-0.5">
                                <a href="mailto:{{$user->email}}" class="text-blue-400 underline">{{$user->email}}</a>
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class="px-4 py-3 text-center uppercase">
                                {{$user->created_at}}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <span class="px-4 py-3 text-center uppercase">
                                {{$user->updated_at}}
                            </span>
                        </td>

                        <td>
                            <a href="{{route('customer.show' , $user->id)}}">
                                <button type="button" data-drawer-target="drawer-read-product-advanced"
                                    data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4 mr-2 -ml-0.5">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                    </svg>
                                    Preview
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <x-general.table-nav :table="$users" />
</x-general.container>
@endsection
