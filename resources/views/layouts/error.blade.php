@if ($errors->any())
<p class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <span>{{$error}}</span> <br>
    @endforeach
</p>
@endif
