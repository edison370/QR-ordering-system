<nav x-data="{ open: false }" class="bg-white border-b-2 border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-6 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('client.home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('client.home')" :active="request()->routeIs('client.home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
            </div>

        </div>
    </div>

   
</nav>
