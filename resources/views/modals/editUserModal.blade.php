<x-modal name="editModal" show="true" btnName="Update" action="{{ route('adminUpdateUser', $user->id) }}" method="PUT">
    @method('PUT')
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="name" required="">
        </div>

        <div class="col-span-2">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="text" name="email" id="email" value="{{ $user->email }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="email" required="">
        </div>

    </div>

</x-modal>
