<div class="flex flex-wrap gap-6 mb-4">

    @foreach ($items as $i)
        <div
            class="w-full sm:max-w-64 bg-white border border-gray-200 rounded-t-lg shadow hover:shadow-2xl duration-200">

            @if ($i->imagePath)
                <img class="rounded-t-lg mx-auto w-full" src="{{ $i->imagePath }}" alt="category image" />
            @endif

            <div class="px-5 py-5">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 text-center">{{ $i->name }}</h5>
                <h4 class="text-xl font-semibold tracking-tight text-gray-900 text-right">{{ $i->price }}</h4>
            </div>

        </div>
    @endforeach
</div>
