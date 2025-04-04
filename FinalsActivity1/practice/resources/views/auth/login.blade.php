@if(session('success'))
<div style="color: green">
    {{session('success')}}
</div>
@endif

@if($errors->any())
<div style="color: red">@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach</div>
@endif
<form action="{{route('login')}}" method="post">
    @csrf
    <div>
        <label for="email">Email: </label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">password: </label>
        <input type="password" name="password" required>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
