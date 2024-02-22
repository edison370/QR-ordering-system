<div class="flex flex-wrap">

    @foreach ($items as $i)
        <div
            class="m-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-2xl hover:scale-105 duration-200">

            @if ($i->imagePath)
                <img class="m-8 mb-0 rounded-lg mx-auto" src="{{ $i->imagePath }}" alt="category image" />
            @endif

            <div class="px-5 py-5">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 text-center">{{ $i->name }}</h5>
                <h4 class="text-xl font-semibold tracking-tight text-gray-900 text-right">{{ $i->price }}</h4>
            </div>

        </div>
    @endforeach
</div>
