<x-app-layout>

    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Sample Report') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-2 lg:px-8 object-center">
        <x-status-message /> {{-- Status Message--}}

        <x-box>
            <x-slot name="header">Filters</x-slot>

            <div id="content">
                <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="flex flex-col">
                        <label for="name" class="text-stone-600 text-sm font-medium">Name</label>
                        <input type="text" id="name" placeholder="raspberry juice"
                            class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                    </div>

                    <div class="flex flex-col">
                        <label for="manufacturer" class="text-stone-600 text-sm font-medium">Manufacturer</label>
                        <input type="manufacturer" id="manufacturer" placeholder="cadbery"
                            class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                    </div>

                    <div class="flex flex-col">
                        <label for="date" class="text-stone-600 text-sm font-medium">Date of Entry</label>
                        <input type="date" id="date"
                            class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                    </div>

                    <div class="flex flex-col">
                        <label for="status" class="text-stone-600 text-sm font-medium">Status</label>

                        <select id="status"
                            class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option>Dispached Out</option>
                            <option>In Warehouse</option>
                            <option>Being Brought In</option>
                        </select>
                    </div>
                </div>

            </div>


            <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                <button id="resetBtn"
                    class="active:scale-95 rounded-lg bg-gray-200 px-6 py-2 font-medium text-sm text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button>

                <button id="searchBtn"
                    class="inline-flex items-center justify-center active:scale-95 rounded-lg bg-gray-800 px-8 py-2 font-medium text-sm text-white outline-none focus:ring hover:opacity-90 focus:ring-gray-300">
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

        </x-box>

        <div class="flex justify-between m-2">
            <x-link-button href="{{ route('userListExport') }}">Export Excel</x-link-button>
            {{-- <x-add-button onclick="addBtn()">User</x-add-button> --}}
        </div>

        <div id="userListResult">
            <!-- Show list here-->
        </div>

        <div id="editUserModal">
            <!-- Show edit user modal here-->
        </div>

        <div id="addUserModal">
            <!-- Show add user modal here-->
        </div>

    </div>

</x-app-layout>

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

            let loadID = "userListResult";

            let name = $('#content #name').val();
            let url = "/userListResult?name=" + name;

            $.ajax({
                url: url,
                success: function(res) {
                    $('#' + loadID).html(res);

                    //After load completed remove loading animation
                    $("#searchBtn svg").addClass("hidden");
                    $("#searchBtn").removeClass("pointer-events-none");
                }
            })

        });

    });
</script>

<script>
    function editBtn(id) {
        startPageLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let url = "/editUser/" + id;

        $.ajax({
            url: url,
            success: function(res) {
                $('#editUserModal').html(res);
                stopPageLoading();

            }
        })
    };

    function addBtn() {
        startPageLoading();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let url = "/addUser";

        $.ajax({
            url: url,
            success: function(res) {
                $('#addUserModal').html(res);
                stopPageLoading();

            }
        })
    };
</script>
