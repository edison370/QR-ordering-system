@props(['active', 'isDropdown' => false])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

@if ($isDropdown)
    <div class="{{ $classes }}" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
        <div class="relative">
            {{ $trigger }}

            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95" 
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75" 
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute z-50 mt-4 shadow-lg w-48"
                style="display: none;" @click="open = false">
                    <div class="rounded-b-md  border-t-0 py-1 bg-white">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>
@else
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif