<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <div class="flex flex-wrap gap-10 justify-center">
                <div class="flex-1 min-w-[320px] max-w-xl p-4 sm:p-8 bg-white dark:bg-gray-800 shadow ">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="flex-1 min-w-[320px] max-w-xl p-4 sm:p-8 bg-white dark:bg-gray-800 shadow">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="flex-1 min-w-[320px] max-w-xl p-4 sm:p-8 bg-white dark:bg-gray-800 shadow">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
