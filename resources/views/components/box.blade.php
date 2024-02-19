@props(['type' => 'normal', 'url', 'loadID'])

@php
    $url = $url ?? Request::segment(1);
    $loadID = $loadID ?? Request::segment(1);
@endphp

<nav x-data="{ open: false }" class="w-full bg-white border border-gray-200 rounded-lg shadow-md p-2 sm:p-4 mb-2">

    <div :class="{ 'border-b': open, 'border-gray-200': open }"
        class="flex p-2 sm:border-b sm:border-gray-200 justify-between items-center justify-center">
        <div class="text-base font-extrabold">{{ $header }}</div>
        <!-- Angle -->
        <div class="sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
                </svg>
            </button>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:block">
        <div id="content">
            {{ $slot }}
        </div>

        @if ($type == 'filter')
            <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                <button id="resetBtn"
                    class="active:scale-95 rounded-lg bg-gray-200 px-6 py-2 font-medium text-sm text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button>

                <button id="searchBtn"
                    class="inline-flex items-center justify-center active:scale-95 rounded-lg bg-blue-600 px-8 py-2 font-medium text-sm text-white outline-none focus:ring hover:opacity-90 ">
                    <svg class="inline w-4 h-4 me-2 text-white animate-spin hidden" viewBox="0 0 100 101"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                    Search
                </button>
            </div>
        @endif

        <div>

</nav>

<script type="module">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#resetBtn').click(function() {
            // Reset all input fields value
            $('#content input').val('');
        });

        $('#searchBtn').unbind().click(function() {
            $("#searchBtn svg").removeClass("hidden");
            $("#searchBtn").addClass("pointer-events-none");

            $.ajax({
                url: '{{ $url }}',
                success: function(res) {
                    $('#{{ $loadID }}').html(res);

                    //After load completed remove loading animation
                    $("#searchBtn svg").addClass("hidden");
                    $("#searchBtn").removeClass("pointer-events-none");
                }
            })

        });


    });
</script>
