<div class="bg-gray-100 dark:bg-gray-900 w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center ">

    <div x-data="{authFailed:false}" x-on:auth-failed.window="authFailed = true,setTimeout(() => { authFailed = false }, 2500)">
        <x-Toasts.toast-1 alphName="authFailed" title="Credentials Invalid" type="error"/>
    </div>

    <div x-data="{authSuccess:false}" x-on:auth-success.window="authSuccess = true,setTimeout(() => { authSuccess = false }, 2500)">
        <x-Toasts.toast-1 alphName="authSuccess" title="You Will Be Logged In Shortly" type="success"/>
    </div>

    <div class="w-full h-full flex flex-col justify-evenly">

        <h1 class="text-2xl  md:text-4xl font-bold leading-tight mt-12 dark:text-gray-200">Log into your account</h1>


        <x-form class="space-y-3" wire:submit.prevent="authenticate">

            <x-slot name="body">

                <x-Form.input placeholder="Email" :error="$errors->first('email')" wire:model="email"/>

                <x-Form.input type="password" placeholder="Password" :error="$errors->first('password')" wire:model="password"/>

                <x-auth-button class="bg-purple-600 font-semibold text-gray-300  hover:bg-purple-700 hover:text-white" title="Login"/>
            </x-slot>
        </x-form>
        <div>
            <hr class=" border-gray-500 w-full">

            <p class="text-center mt-8 dark:text-gray-200">Dont Have an account?<br>
                <a href="{{route('prox-register')}}"
                   class="text-purple-500 dark:text-gray-200 duration-300 dark:hover:text-purple-500 hover:text-purple-700  font-semibold">
                    Create An Account
                </a>
            </p>
        </div>
    </div>
</div>
