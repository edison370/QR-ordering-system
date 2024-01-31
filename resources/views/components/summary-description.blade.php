<div {{ $attributes->merge(['class'=>'flex flex-col items-center justify-center'])}} >
    <dt class="mb-1 text-sm font-extrabold">{{ $value }}</dt>
    <dd class="text-gray-500 text-center">{{ $slot }}</dd>
</div>