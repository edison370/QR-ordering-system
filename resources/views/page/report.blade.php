<x-app-layout>
    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Sample Report') }}
        </h2>
    </x-slot>

    <x-table-report>
        <x-slot name="filters">
            <x-box>
                <x-slot name="header">Filters</x-slot>
                <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="flex flex-col">
                        <label for="name" class="text-stone-600 text-sm font-medium">Name</label>
                        <input type="text" id="name" placeholder="raspberry juice"
                            class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                    </div>

                    <div class="flex flex-col">
                        <label for="manufacturer" class="text-stone-600 text-sm font-medium">Manufacturer</label>
                        <input type="manufacturer" id="manufacturer" placeholder="cadbery"
                            class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                    </div>

                    <div class="flex flex-col">
                        <label for="date" class="text-stone-600 text-sm font-medium">Date of Entry</label>
                        <input type="date" id="date"
                            class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                    </div>

                    <div class="flex flex-col">
                        <label for="status" class="text-stone-600 text-sm font-medium">Status</label>

                        <select id="status"
                            class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option>Dispached Out</option>
                            <option>In Warehouse</option>
                            <option>Being Brought In</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                    <button
                        class="active:scale-95 rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button>
                    <button
                        class="active:scale-95 rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none focus:ring hover:opacity-90">Search</button>
                </div>
            </x-box>
        </x-slot>

        <x-slot name="grandTotal">
            <x-box>
                <x-slot name="header">Summary</x-slot>
                <dl
                    class="grid max-w-screen-xl grid-cols-2 gap-8 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 py-2 sm:py-4">
                    <x-summary-description>
                        <x-slot name="value">
                            RM73,000
                        </x-slot>
                        Cost
                    </x-summary-description>
                    <x-summary-description>
                        <x-slot name="value">
                            RM73,000
                        </x-slot>
                        Cost
                    </x-summary-description>
                    <x-summary-description>
                        <x-slot name="value">
                            RM73,000
                        </x-slot>
                        Cost
                    </x-summary-description>
                </dl>
            </x-box>
        </x-slot>

        <x-slot name="header">
            <x-table-header>
                ID
            </x-table-header>
            <x-table-header>
                Name
            </x-table-header>
            <x-table-header>
                Email
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

        <x-table-content>
            @foreach ($users as $user)
                <x-table-data>
                    {{ $user->id }}
                </x-table-data>
                <x-table-data>
                    {{ $user->name }}
                </x-table-data>
                <x-table-data>
                    {{ $user->email }}
                </x-table-data>
                <x-table-data>
                    {{ $user->created_at }}
                </x-table-data>
                <x-table-data>
                    {{ $user->updated_at }}
                </x-table-data>
                <x-table-data>
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </x-table-data>
            @endforeach
        </x-table-content>

        <x-slot name="pagination">
            {!! $users->links() !!}
        </x-slot>
    </x-table-report>

</x-app-layout>
