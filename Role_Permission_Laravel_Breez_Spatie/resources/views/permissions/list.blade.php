<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- The @session directive may be used to determine if a session value exists (Laravel 10.x) (Laravel Blade Snippets) --}}
            @if(Session::has('success'))
                <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
                    {{Session::get('success')}}
                </div>          
            @endif

            @if(Session::has('error'))
                <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
                    {{Session::get('success')}}
                </div>          
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
