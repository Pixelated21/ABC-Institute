@props([
    'title' => false,
    'pagination' => false
])
<div class="container mx-auto px-4 sm:px-8">
    <div class="mt-4">
        @if ($title)
            <div class=" flex items-center justify-between px-5">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">{{$title}}</h2>
                </div>

                <div>
                    <td class="px-5 py-5 border-b  border-gray-200 bg-white text-center text-sm">
                        <p class="text-white font-medium font-semibold bg-gray-300 hover:bg-gray-700 transition duration-300 rounded py-2 px-4 text-center whitespace-no-wrap">
                            {{$button}}
                        </p>
                    </td>
                </div>

            </div>
        @endif

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">

                    <thead>

                    {{$thead}}

                    </thead>

                    <tbody>

                    {{$tbody}}

                    </tbody>
                </table>
            </div>
            @if($pagination)

            {{$pagination}}

                @endif

        </div>
    </div>
</div>
