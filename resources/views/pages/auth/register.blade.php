<x-layouts.guest>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mt-3 mb-3 text-center text-3xl">
            <h1>Register</h1>
        </div>

        <!-- Name -->
        <div>
            <x-elements.input-label for="name" :value="__('Name')" />
            <x-elements.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-elements.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-elements.input-label for="email" :value="__('Email')" />
            <x-elements.text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-elements.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-elements.input-label for="password" :value="__('Password')" />

            <x-elements.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-elements.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-elements.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-elements.text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-elements.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-elements.primary-button class="ms-4">
                {{ __('Register') }}
            </x-elements.primary-button>
        </div>
    </form>
</x-layouts.guest>
