@if($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li class="segoui">
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif

@if(isset($message))
    <ul class="alert alert-danger list-unstyled">
        <li>
            {{ $message }}
        </li>
    </ul>
@endif

@if(isset($error))
    <div class="alert alert-danger list-unstyled">
        {{ $error }}
    </div>
@endif

@if(isset($server_error))
    <ul class="alert alert-danger list-unstyled">
        <li>
            {{ $server_error }}
        </li>
    </ul>
@endif



