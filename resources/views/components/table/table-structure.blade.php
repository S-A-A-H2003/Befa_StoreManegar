@props([
    'class' => ''
])

<table class="{{$class}}">
    <tbody>
        {{$slot}}
    </tbody>
</table>
