<x-table-report>
    @if (isset($users))
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

        <x-slot name="tableHeader">
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

        <x-slot name="tableData">
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
        </x-slot>

        <x-slot name="pagination">
            {!! $users->links() !!}
        </x-slot>

    @else
        <div class="flex justify-center items-center">
            <img class="object-contain h-96 w-96" src="{{ url('/images/no_results_found.png') }}" alt="No results found" />
        </div>
        @endif
</x-table-report>
