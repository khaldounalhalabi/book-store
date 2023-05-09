@if($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li class="segoui">
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif

@if(isset($server_error))
    <ul class="alert alert-danger list-unstyled">
        <li>
            {{ $server_error }}
        </li>
    </ul>
@endif



