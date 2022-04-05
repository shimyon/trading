@extends('sidemenu')

@section('content')
<div class="container mt-2">
    <div class="row">
        <h1 class="h3 mb-2 text-gray-800">Edit Password</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <div class="col-md-8">
              <a class="btn btn-primary" href="/user/userList" style="float: right"> Back</a>
          </div>
    </div>
    <br/>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/user/password" class="user" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <input type="text" class="form-control form-control-user" value="{{ $user_name }}" name="username" readonly>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="Password"
                placeholder="Enter User New Password">
                @error('password')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user @error('repeatpassword') is-invalid @enderror" name="repeatpassword"
                id="RepeatPassword" placeholder="Enter User Conform Password">
                @error('password')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
      <center>
       <button type="submit" class="btn btn-primary ml-3" >Change Password</button>
      </center>
 </form>
</div>
@endsection
    <script>
        var id = {{ app('request')->input('id') }};

        $(function() {
            if (id != 0) {
                GetById();
            }
        })

        function GetById() {
            $.ajax({
                "url": "./get",
                "method": "GET",
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                "data": {
                    "id": id,
                },
                success: function(res) {
                
                },
                error: function(err) {
                    //alert("Data not saved! Please try again.");
                }
            });
        }

        function change() {
            $.ajax({
                "url": "/user/password",
                "method": "POST",
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                "data": {
                    "id": id,
                    "password": $('#Password').val(),
                    "repeatpassword": $('#RepeatPassword').val()
                },
                success: function(res) {
                    if (res.isok) {
                        alert("Data saved successfully");
                        window.location.href = './';
                    } else {
                        for (const key in res.error) {
                            alert(res.error[key].join());
                        }
                    }
                },
                error: function(err) {
                    alert("Data not saved! Please try again.");
                }
            });
        }
    </script>