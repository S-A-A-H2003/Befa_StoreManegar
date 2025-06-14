@props([
'type' => 'text' ,
'name' => 'text' ,
'value' => '' ,
'class_lable' => '' ,
'class' => '' ,
'placeholder' => '' ,
'lable' => '' ,
])

<div class="mb-5">
    <label for="{{$name}}" @class(["{{$class_lable}} block mb-2 text-sm font-medium text-gray-500 dark:text-gray-500"
        , "block mb-2 text-sm font-medium text-red-700 dark:text-red-500"=> $errors->has($name)])>
        {{$lable}}
    </label>
    <input type="{{$type}}" name="{{$name}}" value="{{$value}}" {{$attributes}}
        @class([
            "{{$class}} block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",
            "{{$class}} block w-full p-4 text-red-900 border border-red-300 rounded-lg bg-red-50 text-base focus:ring-red-500 focus:border-red-500 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"=>$errors->has($name),
            ])
    placeholder="{{$placeholder}}">

</div>
<x-error.one-error name="{{$name}}" />
