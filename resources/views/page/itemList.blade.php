<x-app-layout>

    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Item List') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-2 lg:px-8 object-center">
        <x-status-message /> {{-- Status Message--}}

        <div class="flex justify-end m-2">
            <x-add-button onclick="addBtn()">Item</x-add-button>
        </div>

        <div id="itemListResult">
            <!-- Show list here-->
        </div>

        <div id="editItemModal">
            <!-- Show edit item modal here-->
        </div>

        <div id="addItemModal">
            <!-- Show edit item modal here-->
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

        let loadID = "itemListResult";

        let name = $('#content #name').val();
        let url = "/itemListResult?name=" + name;

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

        let url = "/item/" + id;

        $.ajax({
            url: url,
            success: function(res) {
                $('#editItemModal').html(res);
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
                $('#addItemModal').html(res);
                stopPageLoading();

            }
        })
    };
</script>
