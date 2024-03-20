<button
class="inline-flex items-center justify-center active:scale-95 rounded-lg bg-gray-800 px-6 py-2 font-medium text-sm text-white outline-none focus:ring hover:opacity-90 focus:ring-gray-300"
{{ $attributes }}>
<svg class="w-[18px] h-[18px] text-white mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
    width="24" height="24" fill="none" viewBox="0 0 24 25">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
        d="M5 12h14m-7 7V5" />
</svg>
    {{ $slot}}
</button>

