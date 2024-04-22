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

        <div class="col-span-2">
            <label for="isActive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Active</label>
            <div class="flex">
                <div class="flex items-center me-4" id='radioYes'>
                    <input id="isActive" type="radio" value="1" name="isActive"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                </div>
                <div class="flex items-center me-4" id='radioNo'>
                    <input id="isActive" type="radio" value="0" name="isActive"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                </div>
            </div>
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

        if ({{ $table->isActive }}) {
            $("#radioYes #isActive").prop("checked", true);
        } else {
            $("#radioNo #isActive").prop("checked", true);
        }

    });
</script>