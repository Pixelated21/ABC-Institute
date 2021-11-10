@props([
    'title' => false
])

<td  {{$attributes->merge(['class' => "px-5 py-5 border-b border-gray-200 bg-white text-center text-sm"])}}>
    <div class="ml-3">
        <p class="text-gray-900 font-medium whitespace-no-wrap">
           {{$title}}
        </p>
    </div>
</td>
