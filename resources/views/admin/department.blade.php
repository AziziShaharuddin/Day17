@extends ('layout.default')
@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Department</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
                <th scope="row">{{$department->id}}</th>
                <td>{{$department->department_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{$departments->links()}} --}}
@endsection