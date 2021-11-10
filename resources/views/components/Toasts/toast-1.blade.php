@props([
    'title' => false,
    'type' => 'success',
    'alphName' => false
])

@php
    if ($type === 'success') {
        $class = 'px-5 py-3 font-medium text-gray-50 duration-150 bg-green-600 rounded-lg hover:bg-green-500';
    }
    elseif($type === 'warning'){
        $class = 'px-5 py-3 font-medium text-gray-50 duration-150 bg-yellow-300 rounded-lg hover:bg-yellow-400';
    }
    elseif ($type === 'error'){
        $class = 'px-5 py-3 font-medium text-gray-50 duration-150 bg-red-600 rounded-lg hover:bg-red-500';
    }
@endphp

@if ($title)

    <div class="fixed left-0 right-0  flex justify-center w-full bottom-3">
        <div x-show="{{$alphName}}"
             x-transition.duration.150ms.origin.bottom.opacity.scale.70
             {{$attributes->merge(['class'=> $class])}}
             >
            {{$title}}
        </div>
    </div>
@endif



