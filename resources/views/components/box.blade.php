<nav x-data="{ open: false }" class="w-full bg-white border border-gray-200 rounded-lg shadow-md p-2 sm:p-4 mb-2">

    <div :class="{ 'border-b': open, 'border-gray-200': open }" class="flex p-2 sm:border-b sm:border-gray-200 justify-between items-center justify-center">
        <div class="text-base font-extrabold">{{ $header }}</div>
        <!-- Angle -->
        <div class="sm:hidden">
        <button @click="open = ! open"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
            </svg>
        </button>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:block">
        {{ $slot }}
    <div>

</nav>

