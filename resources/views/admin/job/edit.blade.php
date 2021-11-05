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
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Minimum Salary</th>
            <th scope="col">Maximum Salary</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="post">
                @csrf 
                <input type="text" name="id" id="id" value="{{$jobs->id}}">
                <input type="text" name="title" id="title" value="{{$jobs->title}}">
                <input type="text" name="description" id="description" value="{{$jobs->description}}">
                <input type="text" name="min_salary" id="min_salary" value="{{$jobs->min_salary}}">
                <input type="text" name="max_salart" id="max_salart" value="{{$jobs->max_salart}}">
                <input type="submit">
            </form>
        </tbody>
    </table>
@endsection