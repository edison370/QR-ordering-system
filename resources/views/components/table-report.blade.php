@props([''])

@php

@endphp

<div class="py-12 px-4 sm:px-2 lg:px-8">

    @if(isset($filters))
        {{ $filters }}
    @endif

    @if (isset($grandTotal))
        {{ $grandTotal }}
    @endif

    <div class="overflow-x-auto my-4 pb-4">

        <table class="w-full text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    {{ $header }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>

    <!-- Pagination -->
    {{ $pagination }}

</div>