<x-table-report>
    @if (isset($items))

        <x-slot name="tableHeader">
            <x-table-header>
                No
            </x-table-header>
            <x-table-header>
                Name
            </x-table-header>
            <x-table-header>
                Description
            </x-table-header>
            <x-table-header>
                Price (RM)
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

            @foreach ($items as $item)
                <x-table-content>
                    <x-table-data>
                        {{ $loop->iteration }}
                    </x-table-data>
                    <x-table-data>
                        {{ $item->name }}
                    </x-table-data>
                    <x-table-data>
                        {{ $item->description }}
                    </x-table-data>
                    <x-table-data>
                        {{ $item->price }}
                    </x-table-data>
                    <x-table-data>
                        {{ $item->created_at }}
                    </x-table-data>
                    <x-table-data>
                        {{ $item->updated_at }}
                    </x-table-data>
                    <x-table-data>
                        <x-edit-button onclick="editBtn({{ $item->id }})" />
                    </x-table-data>
                </x-table-content>
            @endforeach

        </x-slot>

        {!! $items->links() !!}
    @else
        <div class="flex justify-center items-center">
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
                    $('#itemListResult').html(res);
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

        let url = "/editItem/" + id;

        $.ajax({
            url: url,
            success: function(res) {
                $('#editItemModal').html(res);
                stopPageLoading();

            }
        })
    };

</script>
