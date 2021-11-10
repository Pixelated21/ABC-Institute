    <div class="bg-gray-100 dark:bg-gray-900 w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">




        <div class="w-full flex justify-evenly flex-col h-full">


            <h1 class="text-2xl  md:text-4xl font-bold leading-tight mt-12 dark:text-gray-200 ">Registration </h1>

            <x-form wire:submit.prevent="createStudent" class="space-y-3">

                <x-slot name="body">


                    <div class="flex gap-5">
                        <x-Form.input placeholder="First Name" :error="$errors->first('student.fname')" wire:model="student.fname"/>
                        <x-Form.input placeholder="Last Name" :error="$errors->first('student.lname')" wire:model="student.lname"/>
                    </div>

                    <x-Form.input placeholder="Email" :error="$errors->first('user.email')" wire:model="user.email"/>


                    <x-Form.select wire:model="student.gender" :error="$errors->first('student.gender')">
                            <x-select-options selected   title="Select Gender"/>
                            <x-select-options value="Male" title="Male"/>
                            <x-select-options value="Female" title="Female"/>
                    </x-Form.select>


                    <x-Form.date wire:model="student.age" placeholder="DOB" :error="$errors->first('student.age')"/>


                    <x-Form.input placeholder="Phone Number" :error="$errors->first('student.phone_nbr')" wire:model="student.phone_nbr"/>


                        <x-Form.input type="password" placeholder="Password" :error="$errors->first('password')" wire:model="password"/>


                    <x-auth-button class="bg-purple-600 font-semibold text-gray-300 hover:bg-purple-700 hover:text-white" title="Register"/>
                </x-slot>

            </x-form>

            <div>
                <hr class="my-6 border-gray-500 w-full">

                <p class="text-center mt-8 dark:text-gray-200">Already Have an account?<br>
                    <a href="{{url('/login')}}"
                       class="text-purple-500 dark:text-gray-200 duration-300 dark:hover:text-purple-500 hover:text-purple-700  font-semibold">
                        Login To Your Account
                    </a>
                </p>
            </div>


        </div>
    </div>
