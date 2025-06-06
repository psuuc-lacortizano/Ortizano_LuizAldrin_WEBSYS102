<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-white dark:text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-end mt-4 space-y-2">
    @if (Route::has('password.request'))
        <a
            class="underline text-sm text-white hover:text-white flex justify-end"
            href="{{ route('password.request') }}"
        >
            {{ __('Forgot your password?') }}
        </a>
    @endif
    <br>

    <x-primary-button class="w-full flex justify-center">
    {{ __('Log in') }}
</x-primary-button-button>
        </div>
    </form>
    <!-- Text button below the form -->
        <div class="mt-6 text-center flex justify-center">
            <span class="text-white text-sm">Don't have an account? </span>
            <a
                href="{{ route('register') }}"
                class="underline text-sm text-white hover:text-white"
            >
                <span> Register</span>
            </a>
        </div>
</x-guest-layout>
