<x-app-layout>

    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-2 lg:px-8 object-center">
        <x-status-message /> {{-- Status Message--}}

        <div class="flex justify-end m-2">
            <x-add-button onclick="addBtn()">Order</x-add-button>
        </div>

        <div id="userListResult">
            <!-- Show list here-->
        </div>

        <div id="editUserModal">
            <!-- Show edit order modal here-->
        </div>

        <div id="addOrderModal">
            <!-- Show add order modal here-->
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

        let url = "/user/" + id;

        $.ajax({
            url: url,
            success: function(res) {
                $('#editOrderModal').html(res);
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

        let url = "/addItem";

        $.ajax({
            url: url,
            success: function(res) {
                $('#addOrderModal').html(res);
                stopPageLoading();

            }
        })
    };
</script>
