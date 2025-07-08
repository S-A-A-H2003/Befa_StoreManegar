@extends('layouts.super_admin')
@section('content')

<p class=" mx-14 mt-5 text-lg font-bold">
    <a href="{{route('dashboard')}}" class=" text-blue-600 font-mono ">Home/</a>
    <a href="{{URL::current()}}" class=" text-blue-600 font-mono ">Product</a>
</p>

<x-general.container class="p-6 h-fit">

    {{-- Table Header --}}
    <x-general.table-header :value="$products" name="product" route="{{route('product.create')}}" />

    @if($success)
    <x-success.flash-message success="{{$success}}" />
    @endif

    <br>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            @if($products->count()>0)
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class=" p-4 text-center">Picture</th>
                        <th scope="col" class=" p-4 text-center">Name</th>
                        <th scope="col" class=" p-4 text-center">Inventory</th>
                        <th scope="col" class=" p-4 text-center">Price</th>
                        <th scope="col" class=" p-4 text-center">Price Before</th>
                        <th scope="col" class=" p-4 text-center">Discription</th>
                        <th scope="col" class=" p-4 text-center">Rating</th>
                        <th scope="col" class=" p-4 text-center">Last Update</th>
                        <th scope="col" class="p-4"></th>
                    </tr>
                </thead>
            @endif
            <tbody>

                @forelse ($products as $product)
                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center mr-3">
                                <img src="{{$product->picture}}" alt="{{$product->name}}" class="h-8 w-auto mr-3">
                            </div>
                        </th>
                        <td class="px-4 py-3">
                            <span class=" text-black text-xs font-medium px-2 py-0.5 rounded dark:text-black">
                                {{$product->name}}
                            </span>
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center">
                            @if($product->inventory<10)
                                <div class="h-4 w-4 rounded-full inline-block mr-2 bg-red-500"></div>
                            @endif
                            @if($product->inventory>25 and $product->inventory<50)
                                <div class="h-4 w-4 rounded-full inline-block mr-2 bg-orange-500"></div>
                            @endif
                            @if($product->inventory>50 and $product->inventory<75)
                                <div class="h-4 w-4 rounded-full inline-block mr- bg-yellow-500"></div>
                            @endif
                            @if($product->inventory>100)
                            <div class="h-4 w-4 rounded-full inline-block mr-2 bg-green-700"></div>
                            @endif
                            {{$product->inventory}}
                            </div>
                        </td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$product->price}}
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$product->price_before}}
                    </td>
                    <td class="px-12 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                        {{$product->discription}}
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center">
                            @for($i = 0 ; $i < $product->rating; $i++)
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                @endfor
                                @for($i = $product->rating ; $i < 5; $i++) <svg aria-hidden="true" class="w-5 h-5 text-gray-300"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @endfor

                                    <span class="text-gray-500 dark:text-gray-400 ml-1">{{$product->rating}}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3">{{$product->updated_at->diffForHumans()}}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center space-x-4">
                            <a href="{{route('product.edit' , $product->id)}}">
                                <button type="button" data-drawer-target="drawer-update-product"
                                    data-drawer-show="drawer-update-product" aria-controls="drawer-update-product"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Edit
                                </button>
                            </a>

                            <a href="{{route('product.show' , $product->id)}}">
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

                            <form action="{{route('product.destroy' , $product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                    class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>
                @empty
                    <div class=" w-full h-[50vh] flex items-center justify-center">
                        <div class=" text-center">
                            <p class=" text-gray-500">Not found product yet!</p>
                            <a href="{{route('product.create')}}" class=" underline text-blue-400">Add new product</a>
                        </div>
                    </div>
                @endforelse

            </tbody>
        </table>
    </div>
    <x-general.table-nav :table="$products" />
</x-general.container>
@endsection
