@if ($errors->any())
    <div class="alert alert-danger">
        <ul class='mb-0'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger">
    <ul class='mb-0'>
            <li>{{ Session::get('error') }}</li>
    </ul>
</div>
@endif


@if (Session::has('success'))
<div class="alert alert-danger">
    <ul class='mb-0'>
            <li>{{ Session::get('success') }}</li>
    </ul>
</div>
@endif

