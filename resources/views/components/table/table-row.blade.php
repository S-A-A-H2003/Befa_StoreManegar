@props([
    'class' => ''
])

<tr class="{{$class}}">
    {{$slot}}
</tr>
