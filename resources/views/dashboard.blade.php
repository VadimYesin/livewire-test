<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Units of Analysis") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <button onclick="Livewire.dispatch('openModal', ['unit-of-analysis.create-modal'])"
                                class="px-3 py-2 text-sm border border-gray-200 rounded-md">Create new</button>
                </div>
            </div>
        </div>
        <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:unit-of-analysis.units-table />
        </div>

        <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:survey.modal />
        </div>
    </div>
</x-app-layout>
