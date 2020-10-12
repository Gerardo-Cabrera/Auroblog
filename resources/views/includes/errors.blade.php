@if ($errors->any())
    <div class="alert alert-danger mt-3 mb-5">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif