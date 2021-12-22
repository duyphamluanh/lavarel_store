<!-- /resources/views/post/create.blade.php -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class='mb-0'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->