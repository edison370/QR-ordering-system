@if ($errors->any())
<div class="p-4 mb-2 text-sm text-yellow-800 rounded-lg bg-yellow-50">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (\Session::has('success'))
<div class="p-4 mb-2 text-sm text-green-800 rounded-lg bg-green-50">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif