<x-table-report>
    
    @if (isset($tables))

        <x-slot name="tableHeader">
            <x-table-header>
                No
            </x-table-header>
            <x-table-header>
                Link
            </x-table-header>
            <x-table-header>
                Description
            </x-table-header>
            <x-table-header>
                Active
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

            @foreach ($tables as $table)
                <x-table-content>
                    <x-table-data>
                        {{ $loop->iteration }}
                    </x-table-data>
                    <x-table-data>

                        <div class="relative max-w-2xl mx-auto mt-24">
                            <div class="bg-gray-900 text-white p-4 rounded-md">
                                <div class="flex justify-between items-center mb-2">
                                    <span id="code" class="text-gray-400">{{ route('client.home') }}/{{ $table->code }}</span>
                                    <button class="code bg-gray-800 hover:bg-gray-700 text-gray-300 px-3 py-1 rounded-md" data-clipboard-target="#code">
                                Copy
                              </button>
                                </div>
                            </div>
                        </div>
                        
                    </x-table-data>
                    <x-table-data>
                        {{ $table->description }}
                    </x-table-data>
                    <x-table-data>
                        @if($table->isActive)
                            Yes
                        @else
                            No
                        @endif
                    </x-table-data>
                    <x-table-data>
                        {{ $table->created_at }}
                    </x-table-data>
                    <x-table-data>
                        {{ $table->updated_at }}
                    </x-table-data>
                    <x-table-data>
                        <x-edit-button onclick="editBtn({{ $table->id }})" />
                    </x-table-data>
                </x-table-content>
            @endforeach

        </x-slot>

        {!! $tables->links() !!}
    @else
        <div class="flex justify-center tables-center">
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
                    $('#tableListResult').html(res);
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

        let url = "/editTable/" + id;

        $.ajax({
            url: url,
            success: function(res) {
                $('#editTableModal').html(res);
                stopPageLoading();

            }
        })
    };

    new ClipboardJS('.code');
</script>
