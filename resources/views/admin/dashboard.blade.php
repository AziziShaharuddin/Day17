@extends ('layout.default')
@section('content')
    <h1>Hello there </h1>
    {{-- {{$jwt_token}} --}}
    <div style="display: flex">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="{{ url("/admin/user")}}"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL USERS</div></a>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$userCount}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <!-- Company Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="{{ url("/admin/job")}}"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL JOBS</div></a>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jobCount}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <!-- Contact Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="{{ route("admin.department")}}"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TOTAL DEPARTMENTS</div></a>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$departmentCount}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

{{-- @section('scripts')
<script>
  alert('hi');
  $(document).ready(function(){
    // alert('hi');
    $.ajax({
      url: '/api/dashboard',
      type: 'post',
      headers: {"Authorization": "Bearer {{$jwt_token}}"},
      data: {},
      success:function(response){
        $("#user_total").html(response.user_total);
      },
      error:function(error){

      },
    });
  });
</script>
@endsection --}}