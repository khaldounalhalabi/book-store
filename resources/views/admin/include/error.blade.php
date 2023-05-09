@if($errors->any())
<ul class="alert alert-danger list-unstyled">
    @foreach ($errors->all() as $error)
    <li class="segoui">
        {{ $error }}
    </li>
    @endforeach
</ul>
@endif
