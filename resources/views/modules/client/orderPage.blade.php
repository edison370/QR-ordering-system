<x-client-app-layout>

    {{-- <x-slot name="header">
        <header class="flex bg-white shadow overflow-x-auto px-2 py-4">

        </header>
    </x-slot> --}}

    <div class="-mt-16 px-8 sm:px-4 lg:px-8 object-center w-full">
        @foreach ($orders as $o)
      
            <div class="mb-4 sm:mb-7 bg-white p-3 sm:p-6 shadow rounded">
                <div class="flex items-center border-b border-gray-200 pb-2 sm:pb-4 justify-between text-sm sm:text-base">
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

                    <div class="py-2 text-xs sm:text-sm">
                        @foreach ($o->order_details as $d)
                            <div class="flex flex-row mb-2">
                                <div class="basis-1/4"><img class="object-cover rounded" src="{{ $d->item->imagePath }}" alt="category image" /></div>
                                <div class="basis-1/2 px-2">
                                    <div>
                                        {{ $d->item->name }}
                                    </div>

                                    <div class="text-gray-400">
                                        {{ $d->comment }}
                                    </div>

                                </div>
                                <div class="basis-1/4 text-right"><span>RM{{ $d->item->price }}</span></div>
                            </div>
                       
                        @endforeach
                    </div>
                </div>
        @endforeach

    </div>

</x-client-app-layout>

<script type="module"></script>
