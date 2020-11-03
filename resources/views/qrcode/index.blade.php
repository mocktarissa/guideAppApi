@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div>
    @foreach ($qrcodes as $qrcode)
    <p>
        qrcode
    </p>
    @endforeach
    {{$qrcodes}}
</div>