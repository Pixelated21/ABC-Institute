<div>
    <style>
        .scroll-hidden::-webkit-scrollbar {
            height: 0;
            background: transparent; /* make scrollbar transparent */
        }
    </style>
    <div x-data="{addStudent: false}" x-on:add-student-open.window="addStudent = true" x-on:add-student-close.window="addStudent = false">
        <x-Modals.modal-1 :errors="$errors->all()" alphName="addStudent">

            <x-slot name="body">

                <form wire:submit.prevent="addStudent" class="space-y-4 ">


                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <x-Form.input wire:model="student.fname" placeholder="First Name"/>
                        <x-Form.input wire:model="student.lname" placeholder="Last Name"/>
                    </div>


                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <x-Form.select wire:model="student.gender">
                            <x-select-options selected disabled title="Select Gender"/>
                            <x-select-options value="Male" title="Male"/>
                            <x-select-options value="Female" title="Female"/>
                        </x-Form.select>

                        <x-Form.date wire:model="student.age"/>

                    </div>

                    <x-Form.input wire:model="user.email" placeholder="Email"/>


                    <div class="text-center  grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <x-Form.input wire:model="student.phone_nbr" placeholder="Phone Number"/>

                        <x-Form.password wire:model="password" placeholder="Password"
                                         title="Password"/>
                    </div>


                    <div class="mt-4">
                        <button
                            {{--                            @click.prevent=" {{$alphName}} = false "--}}
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                        >
                            <span class="font-medium"> Add Student </span>

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
        <div x-data="{editStudent: false}" x-on:edit-student-open.window="editStudent = true" x-on:edit-student-close.window="editStudent = false">
            <x-Modals.modal-1 :errors="$errors->all()" alphName="editStudent">

                <x-slot name="body">

                    <form wire:submit.prevent="updateStudent({{$student}})" class="space-y-4 ">


                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-Form.input wire:model="student.fname" placeholder="First Name"/>
                            <x-Form.input wire:model="student.lname" placeholder="Last Name"/>
                        </div>


                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                            <x-Form.select wire:model="student.gender">
                                <x-select-options selected disabled title="Select Gender"/>
                                <x-select-options value="Male" title="Male"/>
                                <x-select-options value="Female" title="Female"/>
                            </x-Form.select>

                            <x-Form.date wire:model="student.age"/>

                        </div>

                            <x-Form.input wire:model="student.phone_nbr" placeholder="Phone Number"/>


                        <div class="mt-4">
                            <button
                                {{--                            @click.prevent=" {{$alphName}} = false "--}}
                                type="submit"
                                class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-green-400 rounded-lg sm:w-auto"
                            >
                                <span class="font-medium"> Update Student </span>

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

    <x-Table.table title="Students">

        <x-slot name="button">
            <button wire:click="addStudentViewOpen">Add Student</button>
        </x-slot>

        <x-slot name="thead">
            <x-Table.table-row>
                <x-Table.table-head title="First Name"/>
                <x-Table.table-head title="Last Name"/>
                <x-Table.table-head title="Phone Number"/>
                <x-Table.table-head title="Email"/>
                <x-Table.table-head title="Age"/>
                <x-Table.table-head title="Gender"/>
                <x-Table.table-head title="Action"/>
            </x-Table.table-row>
        </x-slot>

        <x-slot name="tbody">
            @forelse($students as $student)
                <x-Table.table-row>
                    <x-Table.table-cell :title="$student->fname"/>
                    <x-Table.table-cell :title="$student->lname"/>
                    <x-Table.table-cell :title="$student->phone_nbr"/>
                    <x-Table.table-cell :title="$student->user->email"/>
                    <x-Table.table-cell :title="$student->age"/>
                    <x-Table.table-cell :title="$student->gender"/>
                    <x-Table.table-cell>
                        <x-slot name="title">
                            <button wire:click="editStudentsView({{$student}})"
                                    class=" bg-blue-400 duration-300 shadow-sm hover:shadow-md px-4 py-2 font-medium text-white rounded-md whitespace-no-wrap">
                                Edit
                            </button>

                            <button wire:click="deleteStudent({{$student}})"
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
            {{$students->links()}}
        </x-slot>
    </x-Table.table>
</div>
