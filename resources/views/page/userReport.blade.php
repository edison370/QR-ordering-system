<x-app-layout>

    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Sample Report') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-2 lg:px-8 object-center">
        <x-box type="filter" loadID="userReportResult" url="/userReportResult">
            <x-slot name="header">Filters</x-slot>
            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <div class="flex flex-col">
                    <label for="name" class="text-stone-600 text-sm font-medium">Name</label>
                    <input type="text" id="name" placeholder="raspberry juice"
                        class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                </div>

                <div class="flex flex-col">
                    <label for="manufacturer" class="text-stone-600 text-sm font-medium">Manufacturer</label>
                    <input type="manufacturer" id="manufacturer" placeholder="cadbery"
                        class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                </div>

                <div class="flex flex-col">
                    <label for="date" class="text-stone-600 text-sm font-medium">Date of Entry</label>
                    <input type="date" id="date"
                        class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                </div>

                <div class="flex flex-col">
                    <label for="status" class="text-stone-600 text-sm font-medium">Status</label>

                    <select id="status"
                        class="mt-2 block w-full rounded-md border text-sm border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option>Dispached Out</option>
                        <option>In Warehouse</option>
                        <option>Being Brought In</option>
                    </select>
                </div>
            </div>
        </x-box>

        <div id="userReportResult">
            <!-- Show report here-->
        </div>
    </div>

</x-app-layout>
