<x-table-report>
    @if (isset($orders))

        <x-slot name="tableHeader">
            <x-table-header>
                No
            </x-table-header>
            <x-table-header>
                Table No
            </x-table-header>
            <x-table-header>
                Amount
            </x-table-header>
            <x-table-header>
                Status
            </x-table-header>
            <x-table-header>
                Created at
            </x-table-header>
            <x-table-header>
                Updated at
            </x-table-header>
            <x-table-header>
                Action
            </x-table-header>
        </x-slot>

        <x-slot name="tableData">

            @foreach ($orders as $order)
                <x-table-content>
                    <x-table-data>
                        {{ $loop->iteration }}
                    </x-table-data>
                    <x-table-data>
                        {{ $order->table->description }}
                    </x-table-data>
                    <x-table-data>
                        {{ $order->amount }}
                    </x-table-data>
                    <x-table-data>
                        {{ $order->status }}
                    </x-table-data>
                    <x-table-data>
                        {{ $order->created_at }}
                    </x-table-data>
                    <x-table-data>
                        {{ $order->updated_at }}
                    </x-table-data>
                    <x-table-data>
                        <x-edit-button onclick="editBtn({{ $order->id }})" />
                    </x-table-data>
                </x-table-content>
            @endforeach

        </x-slot>

        {!! $orders->links() !!}
    @else
        <div class="flex justify-center orders-center">
            <img class="object-contain h-96 w-96" src="{{ url('/images/no_results_found.png') }}"
                alt="No results found" />
        </div>
    @endif

</x-table-report>

<script type="module">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //pagination
        $('#pagination a').click(function(e) {
            startPageLoading();
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]

            let url = '{{ $requestUrl }}' + "&page=" + page;

            $.ajax({
                url: url,
                success: function(res) {
                    $('#orderListResult').html(res);
                    stopPageLoading();
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

        let url = "/editOrder/" + id;

        $.ajax({
            url: url,
            success: function(res) {
                $('#editOrderModal').html(res);
                stopPageLoading();

            }
        })
    };

</script>
