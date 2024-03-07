<x-client-app-layout>

    {{-- <x-slot name="header">
        <header class="flex bg-white shadow overflow-x-auto px-2 py-4">

        </header>
    </x-slot> --}}

    <div class="-mt-16 px-8 sm:px-4 lg:px-8 object-center w-full">
        @foreach ($orders as $o)
            {{ $o }}
            <div class="mb-7 bg-white p-6 shadow rounded">
                <div class="flex items-center border-b border-gray-200 pb-4 justify-between">
                    <div>{{ $o->created_at }}</div>
                        @switch($o->status)
                            @case('Confirmed')
                                <div class="text-lime-500">
                            @break

                            @default
                                <div class="text-gray-700">
                        @endswitch

                            {{ $o->status }}</div>

                    </div>

                    <div class="py-2">
                        @foreach ($o->order_details as $d)
                            <div class="flex flex-row">
                                <img class="basis-1/4 max-w-48" src="{{ $d->item->imagePath }}" alt="category image" />
                                <div class="basis-1/2"><span>{{ $d->item->description }}</span></div>
                                <div class="basis-1/4 text-right"><span>{{ $d->item->price }}</span></div>
                            </div>
                            {{ $d }}
                        @endforeach
                    </div>
                </div>
        @endforeach

    </div>

</x-client-app-layout>

<script type="module"></script>
