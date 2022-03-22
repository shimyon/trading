@extends('sidemenu')

@section('content')
<div class="container mt-2">
    <div class="row">
        <h1 class="h3 mb-2 text-gray-800">Edit Configuration</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <br/>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/config/configFormupdate/{{$configurations->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user @error('cofigame') is-invalid @enderror" value="{{ $configurations->cofigame }}" name="cofigame" id="CofiGame"
                placeholder="Enter Configuration Game">
                @error('cofigame')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user @error('price') is-invalid @enderror" value="{{ $configurations->price }}" name="price" id="Price"
                placeholder="Enter Config Price">
                @error('price')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user @error('tp') is-invalid @enderror" value="{{ $configurations->tp }}" name="tp" id="TP"
                placeholder="Enter Config TP">
                @error('tp')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user @error('sl') is-invalid @enderror" value="{{ $configurations->sl }}" name="sl" id="SL"
                placeholder="Enter Config SL">
                @error('sl')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" {{ $configurations->isStop == 1  ? 'checked' : '' }} name="isStop" id="isStop" checked >
                <label class="form-check-label" for="flexCheckDefault" >
                  Stop
                </label>
                @error('isStop')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
        </div>
        <div class="col-sm-6">
            <input type="date" class="form-control form-control-user @error('stopon') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($configurations->stopon)) }}" name="stopon" id="stOpon">
                @error('stopon')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
      <center>
       <button type="submit" class="btn btn-primary ml-3">Submit</button>
       <a class="btn btn-danger" href="/config/configList"> Cancel</a>
      </center>
 </form>
</div>
@endsection