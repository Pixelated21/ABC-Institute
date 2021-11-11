<div>

    <style>
        .scroll-hidden::-webkit-scrollbar {
            height: 0;
            background: transparent; /* make scrollbar transparent */
        }
    </style>

    <div x-data="{assignCourse: false}" x-on:assign-course-open.window="assignCourse = true" x-on:assign-course-close.window="assignCourse = false">
        <x-Modals.modal-1 :errors="$errors->all()" alphName="assignCourse">

            <x-slot name="body">

                <form wire:submit.prevent="assignCourse" class="space-y-4 ">


                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <x-Form.select wire:model="student_id">
                            @forelse($students as $student)
                                @if ($loop->first)
                                    <x-select-options disabled selected title="Select A Student"/>
                                    <x-select-options :value="$student->id" :title="$student->fname.' '.$student->lname"/>
                                @else
                                    <x-select-options :value="$student->id" :title="$student->fname.' '.$student->lname"/>
                                @endif
                            @empty
                                <x-select-options title="No Data Available"/>
                            @endforelse
                        </x-Form.select>


                        <x-Form.select wire:model="course_id">
                            @forelse($courses as $course)
                                @if ($loop->first)
                                    <x-select-options disabled selected title="Select A Course"/>
                                    <x-select-options :value="$course->id" :title="$course->course_nm"/>
                                @else
                                    <x-select-options :value="$course->id" :title="$course->course_nm"/>
                                @endif

                            @empty
                                <x-select-options title="No Data Available"/>
                            @endforelse
                        </x-Form.select>

                    </div>



                    <div class="mt-4">
                        <button
                            {{--                            @click.prevent=" {{$alphName}} = false "--}}
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                        >
                            <span class="font-medium"> Assign Course </span>

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 ml-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>

                </form>

            </x-slot>

        </x-Modals.modal-1>
    </div>


    <x-Table.table title="Student Assignment">

        <x-slot name="button">
            <button wire:click.prevent="assignCourseView">Assign Course</button>
        </x-slot>

        <x-slot name="thead">
            <x-Table.table-row>
                <x-Table.table-head title="First Name"/>
                <x-Table.table-head title="Last Name"/>
                <x-Table.table-head title="Course Name"/>
                <x-Table.table-head title="Action"/>
            </x-Table.table-row>
        </x-slot>

        <x-slot name="tbody">
            @forelse($group as $assigned)
                <x-Table.table-row>
                    <x-Table.table-cell :title="$assigned->student->fname"/>
                    <x-Table.table-cell :title="$assigned->student->lname"/>
                    <x-Table.table-cell :title="$assigned->course->course_nm"/>

                    <x-Table.table-cell>
                        <x-slot name="title">

                            <button wire:click="deleteStudent({{$assigned}})"
                                    class=" bg-red-600 duration-300 shadow-sm hover:shadow-md px-4 py-2 font-medium text-white rounded-md whitespace-no-wrap">
                                Delete
                            </button>
                        </x-slot>
                    </x-Table.table-cell>
                </x-Table.table-row>
            @empty
                <x-Table.table-row>
                    <x-Table.table-cell colspan="6" class="text-lg" title="No Data Available"/>
                </x-Table.table-row>
            @endforelse
        </x-slot>

        <x-slot name="pagination">
            {{$group->links()}}
        </x-slot>
    </x-Table.table>
</div>
