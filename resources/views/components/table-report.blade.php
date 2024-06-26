@props(['url', 'loadID'])

@php
    $url = $url ?? Request::segment(1);
    $loadID = $loadID ?? Request::segment(1);
@endphp

@if (isset($grandTotal))
    {{ $grandTotal }}
@endif

@if (isset($tableHeader))
    <div class="overflow-x-auto my-4 pb-4">

        <table class="w-full text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    {{ $tableHeader }}
                </tr>
            </thead>
            <tbody>
                {{ $tableData }}
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
@endif

{{ $slot }}

