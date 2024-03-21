<x-app-layout>

    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-500 leading-tight">
            {{ __('order List') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-2 lg:px-8 object-center">
        <x-status-message /> {{-- Status Message--}}

        <div class="flex justify-end m-2">
            <x-add-button onclick="addBtn()">order</x-add-button>
        </div>

        <div id="orderListResult">
            <!-- Show list here-->
        </div>

        <div id="editOrderModal">
            <!-- Show edit order modal here-->
        </div>

        <div id="addOrderModal">
            <!-- Show edit order modal here-->
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

        startPageLoading();

        let loadID = "orderListResult";

        let name = $('#content #name').val();
        let url = "/orderListResult?name=" + name;

        $.ajax({
            url: url,
            success: function(res) {
                $('#' + loadID).html(res);

                stopPageLoading();
            }
        })


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

        let url = "/order/" + id;

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

        let url = "/addOrder";

        $.ajax({
            url: url,
            success: function(res) {
                $('#addOrderModal').html(res);
                stopPageLoading();

            }
        })
    };
</script>
