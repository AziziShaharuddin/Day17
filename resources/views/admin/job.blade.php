@extends ('layout.default')
@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Minimum Salary</th>
            <th scope="col">Maximum Salary</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <th scope="row">{{$job->id}}</th>
                <td>{{$job->title}}</td>
                <td>{{$job->description}}</td>
                <td>{{$job->min_salary}}</td>
                <td>{{$job->max_salart}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection