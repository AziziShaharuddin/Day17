@extends ('layout.default')
@section('content')
    {{-- @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif --}}
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Minimum Salary</th>
            <th scope="col">Maximum Salary</th>
            <th scope="col">Action</th>
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
                <td>
                    <a href="{{ URL::signedRoute('job.edit', ['id' => $job->id])}}">Edit</a>
                    <a href="{{ URL::signedRoute('job.delete', ['id' => $job->id])}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$jobs->links()}}
@endsection