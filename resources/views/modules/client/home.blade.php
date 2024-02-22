<x-client-app-layout>

    <x-slot name="header">
        
    </x-slot>

    <div class="py-12 px-4 sm:px-2 lg:px-8 object-center">

        @foreach ($categories as $c)
            <div class="border-b-2">
                <h5 class="text-2xl font-bold">{{$c->name}}</h5>
            </div>

            <x-client-menu url="/Category/{{$c->name}}" categoryName="{{$c->name}}" categoryID="{{$c->id}}">
            </x-client-menu>

        @endforeach

    </div>

</x-client-app-layout>
