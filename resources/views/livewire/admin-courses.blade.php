<div>

    <style>
        .scroll-hidden::-webkit-scrollbar {
            height: 0;
            background: transparent; /* make scrollbar transparent */
        }
    </style>
    <div x-data="{addCourse: false}" x-on:add-course-open.window="addCourse = true"
         x-on:add-course-close.window="addCourse = false">
        <x-Modals.modal-1 title="Add Course" :errors="$errors->all()" alphName="addCourse">

            <x-slot name="body">

                <form wire:submit.prevent="addCourse" class="space-y-4 md:p-16 ">


                    <x-Form.input wire:model="course.course_nm" placeholder="Course Name"/>

                    <x-Form.select wire:model="course.days">
                        <x-select-options title="Select Course Days"/>
                        <x-select-options title="Monday-Friday"/>
                        <x-select-options title="Monday"/>
                        <x-select-options title="Tuesday"/>
                        <x-select-options title="Wednesday"/>
                        <x-select-options title="Thursday"/>
                        <x-select-options title="Friday"/>
                    </x-Form.select>


                    <x-Form.date type="time" wire:model="course.start" />

                    <x-Form.date type="time" wire:model="course.end"/>
                    <div class="mt-4">
                        <button
                            {{--                            @click.prevent=" {{$alphName}} = false "--}}
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                        >
                            <span class="font-medium"> Add Course </span>

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

    @if ($editMode)
        <div x-data="{editCourse: false}" x-on:edit-course-open.window="editCourse = true"
         x-on:edit-course-close.window="editCourse = false">
        <x-Modals.modal-1 title="Edit Course" :errors="$errors->all()" alphName="editCourse">

            <x-slot name="body">

                <form wire:submit.prevent="updateCourse({{$course}})" class="space-y-4 md:p-16 ">


                    <x-Form.input wire:model="course.course_nm" placeholder="Course Name"/>

                    <x-Form.select wire:model="course.days">
                        <x-select-options selected disabled title="Select Course Days"/>
                        <x-select-options title="Monday-Friday"/>
                        <x-select-options title="Monday"/>
                        <x-select-options title="Tuesday"/>
                        <x-select-options title="Wednesday"/>
                        <x-select-options title="Thursday"/>
                        <x-select-options title="Friday"/>
                    </x-Form.select>


                    <x-Form.date type="time" wire:model="course.start" />

                    <x-Form.date type="time" wire:model="course.end"/>

                    <div class="mt-4">
                        <button
                            {{--                            @click.prevent=" {{$alphName}} = false "--}}
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                        >
                            <span class="font-medium"> Update Course </span>

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
    @endif

    <div x-data="{courseAddedSuccess:false}" x-on:course-added-successfully.window="courseAddedSuccess = true, setTimeout(() => { courseAddedSuccess = false }, 2500)">
        <x-Toasts.toast-1 title="Course Successfully Added" type="success" alphName="courseAddedSuccess"/>
    </div>

    <div x-data="{courseDeleted:false}" x-on:course-deleted-successfully.window="courseDeleted = true, setTimeout(() => { courseDeleted = false }, 2500)">
        <x-Toasts.toast-1 title="Course Successfully Deleted" type="success" alphName="courseDeleted"/>
    </div>

    <div x-data="{courseUpdated:false}" x-on:course-updated-success.window="courseUpdated = true, setTimeout(() => { courseUpdated = false }, 2500)">
        <x-Toasts.toast-1 title="Course Successfully Updated" type="success" alphName="courseUpdated"/>
    </div>


    <x-Table.table title="Courses">

        <x-slot name="button">
            <button wire:click="addCourseViewOpen">Add Course</button>
        </x-slot>

        <x-slot name="thead">
            <x-Table.table-row>
                <x-Table.table-head title="Course Name"/>
                <x-Table.table-head title="Days"/>
                <x-Table.table-head title="Start"/>
                <x-Table.table-head title="End"/>
                <x-Table.table-head title="Action"/>
            </x-Table.table-row>
        </x-slot>

        <x-slot name="tbody">
            @forelse($courses as $course)
                <x-Table.table-row>
                    <x-Table.table-cell :title="$course->course_nm"/>
                    <x-Table.table-cell :title="$course->days"/>
                    <x-Table.table-cell :title="$course->start"/>
                    <x-Table.table-cell :title="$course->end"/>
                    <x-Table.table-cell>
                        <x-slot name="title">
                            <button wire:click="editCoursesView({{$course}})"
                                    class=" bg-blue-400 duration-300 shadow-sm hover:shadow-md px-4 py-2 font-medium text-white rounded-md whitespace-no-wrap">
                                Edit
                            </button>

                            <button wire:click="deleteCourse({{$course}})"
                                    class=" bg-red-600 duration-300 shadow-sm hover:shadow-md px-4 py-2 font-medium text-white rounded-md whitespace-no-wrap">
                                Delete
                            </button>
                        </x-slot>
                    </x-Table.table-cell>
                </x-Table.table-row>
            @empty
                <x-Table.table-row>
                    <x-Table.table-cell colspan="5" class="text-lg" title="No Data Available"/>
                </x-Table.table-row>
            @endforelse
        </x-slot>
    </x-Table.table>
</div>

