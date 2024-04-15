<x-modal name="editModal" show="true" btnName="Update" action="{{ route('updateTable', $table->id) }}">
    @method('PUT')
    <div class="grid gap-4 mb-4 grid-cols-2">

        <div class="col-span-2">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <input type="text" name="description" id="description" value="{{ $table->description }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Description" required="">
        </div>

    </div>

</x-modal>


<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>