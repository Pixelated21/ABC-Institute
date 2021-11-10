@props([
    'title' => false,
    'id' => false,
    'options' => false,
    'error' => false,
    'field' => false,
    'even' => false

])

<div>
    @if ($title)
        <label class="sr-only text-black" @if($id) for="{{$id}}" @endif >{{$title}}</label>
    @endif

    @php

        $class = 'block
                              w-full
                              form-select
                              px-5
                              py-3
                              text-base text-neutral-600
                              placeholder-gray-300
                              transition
                              duration-500
                              ease-in-out
                              transform
                              border border-gray-200
                              rounded-lg
                              bg-gray-50';

            if ($error) {
                    $class .= ' focus:border-transparent
                               focus:ring-2
                               border-red-300
                               focus:ring-red-300
                               focus:ring-offset-red-400';
                    }
                else{
                    $class .= ' focus:border-transparent
                               focus:ring-2
                               focus:ring-white
                               focus:ring-offset-2
                               focus:ring-offset-gray-300';
                }
    @endphp


    <select
        {{$attributes->merge(['class' => $class])}}

        @if ($id)
        id="{{$id}}"
        @endif
    >
        @if ($options)

            @forelse ($options as $key => $label)

                @if ($even)
                    @if ($loop->first)

                        <option disabled selected>Selected</option>

                        <option value="{{$label->$field}}">{{$label->$field}}</option>

                    @else

                        <option value="{{$label->$field}}">{{$label->$field}}</option>

                    @endif
                @else
                    @if ($loop->first)

                        <option disabled selected>Selected</option>

                        <option value="{{$key}}">{{$label->$field}}</option>

                    @else

                        <option value="{{$key}}">{{$label->$field}}</option>

                    @endif
                @endif

            @empty
                <option>No data Available</option>
            @endforelse

        @else

            {{$slot}}

        @endif

    </select>
</div>
