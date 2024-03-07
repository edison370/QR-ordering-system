<nav x-data="{ open: false }" class="bg-white border-b-2 border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-6 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex space-x-4 items-center">

                    <x-sidebar-menu>
                        <x-slot name="trigger">
                            <div 
                            class="block sm:hidden">
                               <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                       d="M9 8h10M9 12h10M9 16h10M5 8h0m0 4h0m0 4h0" />
                               </svg>
                           </div>
                        </x-slot>
                

                        <x-sidebar-link :href="route('client.home')" :active="request()->routeIs('client.home')">
                            <span class="ms-3">{{ __('Menu') }}</span>
                        </x-sidebar-link>
                
                        <x-sidebar-link :href="route('client.orderHistory')" :active="request()->routeIs('client.orderHistory')">         
                            <span class="ms-3">{{ __('Order History') }}</span>
                        </x-sidebar-link>
                
                    </x-sidebar-menu>

                    <a href="{{ route('client.home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('client.home')" :active="request()->routeIs('client.home')">
                        {{ __('Menu') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('client.orderHistory')" :active="request()->routeIs('client.orderHistory')">
                        {{ __('Order History') }}
                    </x-nav-link>
                </div>

            </div>

        </div>
    </div>

</nav>
