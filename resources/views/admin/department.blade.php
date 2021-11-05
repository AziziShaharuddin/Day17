@extends ('layout.default')
@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
                <th scope="row">{{$department->id}}</th>
                <td>{{$department->department_name}}</td>
                <td>
                    <a href="{{ URL::signedRoute('department.edit', ['id' => $department->id])}}">Edit</a>
                    <a href="{{ URL::signedRoute('department.delete', ['id' => $department->id])}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$departments->links()}}
@endsection