@props([
    'title' => false,
    'id' => false,
    'error' => false,
    'value' => false

])

<div>
    @if ($title)
        <label class="sr-only text-black" @if($id) for="{{$id}}" @endif >{{$title}}</label>
    @endif

    @php

        $class = 'block
                          w-full
                          px-5
                          py-3
                          text-base text-neutral-600
                          placeholder-gray-400
                          transition
                          duration-500
                          ease-in-out
                          transform
                          border border-gray-200
                          rounded-lg
                          bg-gray-50
                          focus:outline-none
                       ';


        if ($error) {
            $class .=' focus:border-transparent
                          focus:ring-2
                           border-red-300
                            focus:ring-red-300
                             focus:ring-offset-red-400';
            }
        else{
            $class .=' focus:border-transparent
                          focus:ring-2
                          focus:ring-white
                          focus:ring-offset-2
                          focus:ring-offset-gray-300';
        }
    @endphp


    <input
        {{$attributes->merge(['class' => $class])}}

            @if ($value)
                value="{{$value}}"
            @endif

        @if ($id)
        id="{{$id}}"
        @endif
    />
</div>
