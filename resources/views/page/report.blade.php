<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sample Report') }}
        </h2>
    </x-slot>

    <x-table>
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
            @foreach($users as $user)
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

        <x-slot name="grandTotal">
            <x-table-data>
                Sum
            </x-table-data>
            <x-table-data>
                123
            </x-table-data>
        </x-slot>

        <x-slot name="pagination">
            {!! $users->links() !!}
        </x-slot>
    </x-table>

</x-app-layout>