@extends('sidemenu')

@section('content')
<div class="container mt-2">
    <div class="row">
        <h1 class="h3 mb-2 text-gray-800">Edit User</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <br/>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/user/userFormupdate/{{$users->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" value="{{ $users->firstname }}" name="firstname" id="FirstName"
                placeholder="Enter User First Name">
                @error('firstname')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user @error('lastname') is-invalid @enderror" value="{{ $users->lastname }}" name="lastname" id="LastName"
                placeholder="Enter User Last Name">
                @error('lastname')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    
    <div class="form-group">
        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ $users->email }}"
            id="Email" name="email" placeholder="Enter Your Email Address">
            @error('email')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>
      <center>
       <button type="submit" class="btn btn-primary ml-3">Submit</button>
       <a class="btn btn-danger" href="/user/userList"> Cancel</a>
      </center>
 </form>
</div>
@endsection