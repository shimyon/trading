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
    <form action="/user/password/{{$users->id}}" class="user" method="POST">
    @csrf
    <div class="form-group">
        <label for="username">User Name</label>
            <input type="text" class="form-control form-control-user" value="{{ $user_name }}" name="username" readonly>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="password">Password</label>
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="Password"
                placeholder="Enter User New Password">
                @error('password')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
            <label for="repeatpassword">Conform Password</label>
            <input type="password" class="form-control form-control-user @error('repeatpassword') is-invalid @enderror" name="repeatpassword"
                id="RepeatPassword" placeholder="Enter User Conform Password">
                @error('password')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
      <center>
        <button type="submit" class="btn btn-primary">Change password </button>
      </center>
 </form>
</div>
@endsection