<nav class="bg-white border-b-2 border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-6 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex space-x-4 items-center">

                    <x-sidebar-menu>
                        <x-slot name="trigger">
                            <div class="block sm:hidden">
                                <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M9 8h10M9 12h10M9 16h10M5 8h0m0 4h0m0 4h0" />
                                </svg>
                            </div>
                        </x-slot>

                        @if (session()->has('table'))
                            <x-slot name="header">
                                <div class="text-base font-bold text-gray-700 uppercase">Table {{ session('table') }}
                                </div>
                            </x-slot>
                        @endif

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

            @if (session()->has('table'))
                <div class="sm:flex sm:items-center sm:ms-6 font-bold hidden sm:block">Table {{ session('table') }}
                </div>
            @endif

        </div>
    </div>

</nav>

@if (!session()->has('table'))
    <div class="fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded-lg shadow-lg z-50 overflow-y-auto">

            <div class="p-6 text-left">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <label for="table" class="text-lg font-bold">Your Table No.</p>
                </div>

                <!--Body-->
                <input type="text" name="table" id="table"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Table No" required="">

                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" id="TableErrorMsg">
                </span>

                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button id="setTableBtn">
                        <svg id="setTableIcon" class="w-6 h-6 text-gray-800 dark:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m9 5 7 7-7 7" />
                        </svg>

                        <svg id="setTableLoading" class="inline w-5 h-5 me-2 text-white animate-spin hidden"
                            viewBox="0 0 100 101" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>

                    </button>
                </div>

            </div>
        </div>
    </div>
@endif

<script type="module">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#setTableBtn').click(function(e) {
            var table = $('#table').val();

            $("#setTableLoading").removeClass("hidden");
            $("#setTableIcon").addClass("hidden");
            $("#setTableBtn").addClass("pointer-events-none");

            $.ajax({
                type: "POST",
                url: "/setTable",
                data: {
                    table: table,
                },

                success: function(res) {
                    //After load completed remove loading animation
                    disableLoading();

                    location.reload();
                },
                error: function(res) {
                    //After load completed remove loading animation
                    disableLoading();

                    TableErrorMsg.append(res['responseText']);
                },
            })

        });


        function disableLoading() {
            $("#setTableLoading").addClass("hidden");
            $("#setTableIcon").removeClass("hidden");
            $("#setTableBtn").removeClass("pointer-events-none");
        }


    });
</script>
