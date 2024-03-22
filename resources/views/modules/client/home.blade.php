<x-client-app-layout>

    <x-slot name="header">
        <header class="flex bg-white shadow overflow-x-auto px-2 py-4">

            @foreach ($categories as $c)
                <div x-data class="items-center px-2 sm:px-3">
                    <button
                        x-on:click="window.scrollTo({
                            top: categorySection{{ $c->id }}.getBoundingClientRect().top - document.body.getBoundingClientRect().top - document.getElementById('menu-category').offsetTop - 20, 
                            behavior: 'smooth'
                        })"
                        class="text-base text-center px-4 py-0.5 rounded-full border border-sky-100 bg-sky-50 hover:bg-sky-200 focus:bg-sky-100 duration-200">{{ $c->name }}</button>
                </div>
            @endforeach

        </header>
    </x-slot>

    <div id="menu-category" class="pb-12 px-8 sm:px-4 lg:px-8 object-center">

        @foreach ($categories as $c)
            <div class="border-b-2 mb-4">
                <h5 id="categorySection{{ $c->id }}" class="text-2xl font-bold">{{ $c->name }}</h5>
            </div>

            <x-client-menu url="/Category/{{ $c->name }}" categoryName="{{ $c->name }}"
                categoryID="{{ $c->id }}">
            </x-client-menu>
        @endforeach

    </div>

    {{-- Cart view --}}
    <div id="cartView">
    </div>

</x-client-app-layout>

<script type="module">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/CartView",
            success: function(res) {
                $('#cartView').html(res);
            }
        })

    });
</script>
