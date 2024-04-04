<x-modal name="editModal" show="true" btnName="Update" action="{{ route('updateItem', $item->id) }}">
    @method('PUT')
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" value="{{ $item->name }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Name" required="">
        </div>

        <div class="col-span-2">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <input type="text" name="description" id="description" value="{{ $item->description }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Description" required="">
        </div>

        <div class="col-span-2">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="number" name="price" id="price" value="{{ str_replace(',', '', $item->price) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Price" required="" step="any">
        </div>

        <div class="col-span-2">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select id="category" name="category" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Choose a category</option>
            </select>
        </div>

        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Item picture</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                type="file" name="image" id="image" required  accept=".png, .jpg, .jpeg"/>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">PNG, JPG or JPEG (MAX 10MB).</p>
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

        $.ajax({
            url: "/getAllCategory",
            success: function(res) {

                $.each(res, function(index, value) {

                    if({{ $item->categoryID }} == value['id']){
                        var category = `                
                    <option value = "` + value['id'] + `" selected>` + value['name'] + `</option>
                    `;
                    }else{
                        var category = `                
                    <option value = "` + value['id'] + `" >` + value['name'] + `</option>
                    `;
                    }

                    $("#category").append(category);

                });

            }
        })

    });
</script>