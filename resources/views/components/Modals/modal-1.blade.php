@props([
    'alphName' => false,
    'errors' => false,
    'title' => false
])

{{--Modal: --}}

{{--Ideal Spacing - space-y-4--}}

{{--Single Input - Left In Open--}}

{{--Double Input - <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">--}}

{{--Triple Input - <div class="text-center grid grid-cols-1 gap-4 sm:grid-cols-3">--}}


{{--End Modal--}}


<section x-show="{{$alphName}}"
         x-transition.enter.duration.300ms.origin.bottom
         x-transition.out.duration.1000ms.origin.top.opacity
         class="bg-gray-100 text-center justify-center  overflow-y-auto flex items-center inset-0 fixed">

        <div role="alert" class="p-4 lg:flex md:flex gap-5  py-3 -mx-3 overflow-y-auto whitespace-nowrap scroll-hidden  w-full sm:flex hidden top-0 z-40 absolute px-4 text-white @if($errors) bg-red-600 @else bg-green-400 @endif ">
            @if ($errors)
                @foreach($errors as $error)
                    <p class="text-base font-bold">{{$error}}</p>
                @endforeach
            @else
                <p class="text-base font-bold">Form Cleared For Submission</p>
            @endif

        </div>


    <div
        {{$attributes->merge(['class' => 'px-4 mx-auto py-5 my-auto  w-full lg:w-7/12 sm:px-6 lg:px-2'])}}>
        <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-3">

            <div @click.away=" {{$alphName}} = false"
                 @keyup.esc.window="{{$alphName}} = false"
                 class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">

                <h1 class="lg:text-4xl lg:text-center md:text-center md:text-3xl text-2xl text-left font-bold -mt-5 mb-5">
                    {{$title}}</h1>

                {{$body}}

                <div role="alert" class="p-4 flex-col flex text-left lg:hidden md:hidden sm:hidden  m-2 text-white @if($errors) bg-red-600 @else bg-green-400 @endif rounded-lg">
                    @if ($errors)
                        @if ($errors)
                            @foreach($errors as $error)
                                <p class="text-base font-bold">{{$error}}</p>
                            @endforeach
                        @else
                            <p class="text-base font-bold">Form Cleared For Submission</p>
                        @endif
                    @else
                        <p class="text-base font-bold text-center truncate">Form Cleared For Submission</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
