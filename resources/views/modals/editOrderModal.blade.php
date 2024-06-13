<x-modal name="editModal" show="true" btnName="Update" action="{{ route('updateOrder', $order->id) }}">
    @method('PUT')
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" value="{{ $order->name }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Name" required="">
        </div>

        <div class="col-span-2">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <input type="text" name="description" id="description" value="{{ $order->description }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Description" required="">
        </div>

        <div class="col-span-2">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="text" name="price" id="price" value="{{ $order->price }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Price" required="">
        </div>

        <button
            class="inline-flex items-center justify-center active:scale-95 rounded-full bg-lime-500 px-4 py-2 font-medium text-sm text-white outline-none focus:ring hover:opacity-90 focus:ring-gray-300">
            Confirm
        </button>
        <button
            class="inline-flex items-center justify-center active:scale-95 rounded-full bg-red-500 px-4 py-2 font-medium text-sm text-white outline-none focus:ring hover:opacity-90 focus:ring-gray-300">
            Cancel
        </button>
    </div>

</x-modal>
