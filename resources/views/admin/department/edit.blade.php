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
            <th scope="col">Department</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="post">
                @csrf 
                <input type="text" name="id" id="id" value="{{$departments->id}}">
                <input type="text" name="department_name" id="title" value="{{$departments->department_name}}">
                <input type="submit">
            </form>
        </tbody>
    </table>
@endsection