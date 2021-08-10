<x-guest-layout>
    <x-slot name="title">Register</x-slot>
    <x-app-layout>
        <x-slot name="title">Register</x-slot>
        <x-slot name="content">
            <x-auth-card>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- First Name -->
                    <div>
                        <x-label for="fname" :value="__('First Name')" />

                        <x-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')"
                            required autofocus />
                    </div>
                    <!-- Last Name -->
                    <div class="mt-4">
                        <x-label for="lname" :value="__('Last Name')" />

                        <x-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')"
                            required autofocus />
                    </div>
                    <!-- username -->
                    <div class="mt-4">
                        <x-label for="name" :value="__('Username')" />

                        <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                            required />
                    </div>
                    <!-- User image -->
                    <div class="mt-4">
                        <x-label for="image" :value="__('Image')" />

                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                            required autofocus />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
        </x-slot>
    </x-app-layout>
</x-guest-layout>