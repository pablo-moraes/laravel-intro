@if ($errors->any())
    <div>
        @foreach($errors->all() as $error)
            <small class="alert text-danger">{{$error}}</small>
            <br>
        @endforeach
    </div>
@endif