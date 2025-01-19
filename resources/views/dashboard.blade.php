<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-cyan-500 leading-tight">
                {{ __('BEM VINDO') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-cyan-500 dark:bg-cyan-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-white">
                    {{ __("Você foi logado!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
