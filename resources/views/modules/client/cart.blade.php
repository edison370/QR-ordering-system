<x-client-app-layout>

    <x-slot name="header">
        <header class="flex bg-white shadow overflow-x-auto px-2 py-4">

            @foreach ($categories as $c)
                <div x-data class="items-center px-2 sm:px-3">
                    <button x-on:click="window.scrollTo({
                            top: categorySection{{$c->id}}.getBoundingClientRect().top - document.body.getBoundingClientRect().top - document.getElementById('menu-category').offsetTop - 20, 
                            behavior: 'smooth'
                        })"
                        class="text-base text-center px-4 py-0.5 rounded-full border border-sky-100 bg-sky-50 hover:bg-sky-200 focus:bg-sky-100 duration-200">{{ $c->name }}</button>
                </div>
            @endforeach

        </header>
    </x-slot>

    <div id="menu-category" class="py-12 px-8 sm:px-4 lg:px-8 object-center">

        @foreach ($categories as $c)
            <div class="border-b-2 mb-4">
                <h5 id="categorySection{{$c->id}}" class="text-2xl font-bold">{{ $c->name }}</h5>
            </div>

            <x-client-menu url="/Category/{{ $c->name }}" categoryName="{{ $c->name }}"
                categoryID="{{ $c->id }}">
            </x-client-menu>
        @endforeach

    </div>

    <div class="fixed bottom-0 right-0 p-3 m-4 bg-white rounded-full border">
        <div class="absolute top-0 right-0">
            <svg class="w-[20px] h-[20px] text-red" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z" clip-rule="evenodd"/>
            </svg>
            
        </div>
        <svg class="w-[38px] h-[38px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.3L19 7H7.3"/>
        </svg>
    </div>

</x-client-app-layout>

<script type="module">

</script>
