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


                    <x-Form.select wire:model="days">
                        <x-select-options disabled selected title="Select Date"/>

                        <x-select-options title="Monday - Friday"/>
                        <x-select-options title="Monday"/>
                        <x-select-options title="Tuesday"/>
                        <x-select-options title="Wednesday"/>
                        <x-select-options title="Thursday"/>
                        <x-select-options title="Friday"/>
                        <x-select-options title="Weekdays"/>


                    </x-Form.select>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <x-Form.select wire:model="teacher_id">
                            @forelse($teachers as $teacher)
                                @if ($loop->first)
                                    <x-select-options disabled selected title="Select A Teacher"/>
                                    <x-select-options :value="$teacher->id" :title="$teacher->fname.' '.$teacher->lname"/>
                                @else
                                <x-select-options :value="$teacher->id" :title="$teacher->fname.' '.$teacher->lname"/>
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

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <x-Form.date wire:model="start" type="time"/>

                        <x-Form.date wire:model="end" type="time"/>
                    </div>


                    <div class="mt-4">
                        <button
                            {{--                            @click.prevent=" {{$alphName}} = false "--}}
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                        >
                            <span class="font-medium"> Add Schedule </span>

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


    <x-Table.table title="Schedule">

        <x-slot name="button">
            <button wire:click.prevent="assignCourseView">Add Schedule</button>
        </x-slot>

        <x-slot name="thead">
            <x-Table.table-row>
                <x-Table.table-head title="First Name"/>
                <x-Table.table-head title="Last Name"/>
                <x-Table.table-head title="Course Name"/>
                <x-Table.table-head title="Days"/>
                <x-Table.table-head title="Start Time"/>
                <x-Table.table-head title="End Time"/>
            </x-Table.table-row>
        </x-slot>

        <x-slot name="tbody">
            @forelse($teacher_assignments as $teacher_assignment)
                <x-Table.table-row>
                    <x-Table.table-cell :title="$teacher_assignment->teacher->fname"/>
                    <x-Table.table-cell :title="$teacher_assignment->teacher->lname"/>
                    <x-Table.table-cell :title="$teacher_assignment->course->course_nm"/>
                    <x-Table.table-cell :title="$teacher_assignment->days"/>
                    <x-Table.table-cell :title="$teacher_assignment->start"/>
                    <x-Table.table-cell :title="$teacher_assignment->end"/>
                </x-Table.table-row>
            @empty
                <x-Table.table-row>
                    <x-Table.table-cell colspan="6" class="text-lg" title="No Data Available"/>
                </x-Table.table-row>
            @endforelse
        </x-slot>

        <x-slot name="pagination">
            {{$teacher_assignments->links()}}
        </x-slot>
    </x-Table.table>
</div>
