@extends ('layout.default')
@section('content')
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="post">
                @csrf 
                <input type="text" name="id" id="id" value="{{$users->id}}">
                <input type="text" name="name" id="name" value="{{$users->name}}">
                <input type="text" name="email" id="email" value="{{$users->email}}">
                <input type="submit">
            </form>
        </tbody>
    </table>
    
@endsection