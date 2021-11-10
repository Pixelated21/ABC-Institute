<div>

    <style>
        .scroll-hidden::-webkit-scrollbar {
            height: 0;
            background: transparent; /* make scrollbar transparent */
        }
    </style>
    <div x-data="{addTeacher: false}" x-on:add-teacher-open.window="addTeacher = true" x-on:add-teacher-close.window="addTeacher = false">
        <x-Modals.modal-1 :errors="$errors->all()" alphName="addTeacher">

            <x-slot name="body">

                <form wire:submit.prevent="addTeacher" class="space-y-4 ">


                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <x-Form.input wire:model="teacher.fname" placeholder="First Name"/>
                        <x-Form.input wire:model="teacher.lname" placeholder="Last Name"/>
                    </div>


                    <x-Form.input wire:model="user.email" placeholder="Email"/>


                        <x-Form.password wire:model="password" placeholder="Password"
                                         title="Password"/>

                    <div class="mt-4">
                        <button
                            {{--                            @click.prevent=" {{$alphName}} = false "--}}
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                        >
                            <span class="font-medium"> Add Teacher </span>

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

    <x-Table.table title="Teachers">

        <x-slot name="button">
            <button wire:click="addTeacherViewOpen">Add Teacher</button>
        </x-slot>

        <x-slot name="thead">
            <x-Table.table-row>
                <x-Table.table-head title="First Name"/>
                <x-Table.table-head title="Last Name"/>
                <x-Table.table-head title="Email"/>
                <x-Table.table-head title="Action"/>

            </x-Table.table-row>
        </x-slot>

        <x-slot name="tbody">
            @forelse($teachers as $teacher)
                <x-Table.table-row>
                    <x-Table.table-cell :title="$teacher->fname"/>
                    <x-Table.table-cell :title="$teacher->lname"/>
                    <x-Table.table-cell :title="$teacher->user->email"/>
                    <x-Table.table-cell>
                        <x-slot name="title">
                            <button wire:click="editTeachersView({{$teacher}})"
                                    class=" bg-blue-400 duration-300 shadow-sm hover:shadow-md px-4 py-2 font-medium text-white rounded-md whitespace-no-wrap">
                                Edit
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
    </x-Table.table>
</div>
