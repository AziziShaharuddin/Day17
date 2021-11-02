@extends ('layout.default')
@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{$users->links()}} --}}
@endsection