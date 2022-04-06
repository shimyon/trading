@extends('layout')
  
@section('content') 

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">REGISTRATION</h1>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        {{Session::get('success')}}
                    </div>
                    @endif    
                    <form action="/customauth/storeRegister" class="user" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" name="firstname" id="FirstName"
                                    placeholder="First Name">
                                    @error('firstname')
                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user @error('lastname') is-invalid @enderror" name="lastname" id="LastName"
                                    placeholder="Last Name">
                                    @error('lastname')
                                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="Email"
                                placeholder="Email Address">
                                @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                                    id="Password" placeholder="Password">
                                    @error('password')
                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user @error('repeatpassword') is-invalid @enderror" name="repeatpassword"
                                    id="RepeatPassword" placeholder="Conform Password">
                                    @error('password')
                                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="/customauth/usersLogin">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@endsection