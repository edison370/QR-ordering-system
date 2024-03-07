@props([''])

<div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <aside x-show="open" 
        x-transition:enter="transition-transform transition ease-out duration-300" 
        x-transition:enter-start="transform -translate-x-full" 
        x-transition:enter-end="transform translate-x-0" 
        x-transition:leave="transition-transform transition ease-in duration-300" 
        x-transition:leave-start="transform translate-x-0" 
        x-transition:leave-end="transform -translate-x-full"
     
        class="fixed top-0 left-0 z-40 m-0 w-80 h-full pt-8 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 px-3 pb-4 overflow-y-auto">

        <!-- Header -->
        @if (isset($header))
            {{ $header }}
        @endif

        <button type="button" @click="open = ! open" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>

        <!-- Content -->
        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                {{ $slot }}
            </ul>
        </div>

    </aside>

</div>