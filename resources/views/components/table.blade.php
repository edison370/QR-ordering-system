@props([''])

@php

@endphp

<div class="relative py-12 mx-auto sm:px-4 lg:px-8">
  <div class="overflow-x-auto mb-4 pb-4">
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
          @if (isset($grandTotal))
            <tr>
              {{ $grandTotal }}
            </tr>
          @endif
        </tfoot>
    </table>
  </div>

  <!-- Pagination -->
  {{ $pagination }}

</div>