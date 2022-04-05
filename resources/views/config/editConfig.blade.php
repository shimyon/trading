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
            <input type="text" class="form-control form-control-user @error('buy_unit') is-invalid @enderror" value="{{ $configurations->buy_unit }}" name="buy_unit" id="buy_unit"
                    placeholder="Enter Buying Unit">
            @error('buy_unit')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-6">
            <input type="date" class="form-control form-control-user @error('stopon') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($configurations->stopon)) }}" name="stopon" id="stOpon">
                @error('stopon')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user @error('exp_sl') is-invalid @enderror" value="{{ $configurations->exp_sl }}" name="exp_sl" id="exp_sl"
                    placeholder="Enter Exp SL">
                    @error('exp_sl')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user @error('exp_tp') is-invalid @enderror" value="{{ $configurations->exp_tp }}" name="exp_tp" id="exp_tp" placeholder="Enter Exp TP">
                @error('exp_tp')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user @error('rsi_buy') is-invalid @enderror" value="{{ $configurations->rsi_buy }}" name="rsi_buy" id="rsi_buy"
                    placeholder="Enter Rsi Buy">
                    @error('rsi_buy')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user @error('rsi_sell') is-invalid @enderror" value="{{ $configurations->rsi_sell }}" name="rsi_sell" id="rsi_sell" placeholder="Enter Rsi Sell">
                @error('rsi_sell')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user @error('new_trade_wait_time') is-invalid @enderror" value="{{ $configurations->new_trade_wait_time }}"
            id="new_trade_wait_time" name="new_trade_wait_time" placeholder="Enter New Trade Wait Time">
            @error('new_trade_wait_time')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ $configurations->isStop == 1  ? 'checked' : '' }} name="isStop" id="isStop" checked>
                <label class="form-check-label" for="flexCheckDefault" checked>
                  Stop
                </label>
            </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ $configurations->isStopLossHandle == 1  ? 'checked' : '' }} name="isStopLossHandle" id="isStopLossHandle" checked>
                <label class="form-check-label" for="flexCheckDefault" checked>
                  Stop Loss Handle
                </label>
            </div>
        </div>
    </div>
      <center>
       <button type="submit" class="btn btn-primary ml-3">Submit</button>
       <a class="btn btn-danger" href="/config/configList"> Cancel</a>
      </center>
 </form>
</div>
@endsection