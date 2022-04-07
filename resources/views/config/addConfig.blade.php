@extends('sidemenu')

@section('content')
<div class="container mt-2">
    <div class="row">
        <h1 class="h3 mb-2 text-gray-800">Add Configuration</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <div class="col-md-8">
              <a class="btn btn-primary" href="/config/configList" style="float: right"> Back</a>
          </div>
    </div>
    <br/>
    @if(session('status'))
     <div class="alert alert-success mb-1 mt-1">
     {{ session('status') }}
    </div>
   @endif
    <form action="/config/configFormStore" class="user" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="cofigame">Configuration Name</label>
            <input type="text" class="form-control form-control-user @error('cofigame') is-invalid @enderror" name="cofigame" id="CofiGame"
                placeholder="Enter Configuration Game">
                @error('cofigame')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
            <label for="price">Price</label>
            <input type="text" class="form-control form-control-user @error('price') is-invalid @enderror" name="price" id="Price"
                placeholder="Enter Config Price">
                @error('price')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="tp">TP</label>
            <input type="text" class="form-control form-control-user @error('tp') is-invalid @enderror" name="tp" id="TP"
                placeholder="Enter Config TP">
                @error('tp')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
        <div class="col-sm-6">
            <label for="sl">SL</label>
            <input type="text" class="form-control form-control-user @error('sl') is-invalid @enderror" name="sl" id="SL"
                placeholder="Enter Config SL">
                @error('sl')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="buy_unit">Buy Unit</label>
            <input type="text" class="form-control form-control-user @error('buy_unit') is-invalid @enderror" name="buy_unit" id="buy_unit"
                    placeholder="Enter Buying Unit">
            @error('buy_unit')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="stopon">Stock Open</label>
            <input type="date" class="form-control form-control-user @error('stopon') is-invalid @enderror" name="stopon" id="stOpon">
                @error('stopon')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="exp_sl">Exp SL</label>
                <input type="text" class="form-control form-control-user @error('exp_sl') is-invalid @enderror" name="exp_sl" id="exp_sl"
                    placeholder="Enter Exp SL">
                    @error('exp_sl')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
        </div>
        <div class="col-sm-6">
            <label for="exp_tp">Exp TP</label>
            <input type="text" class="form-control form-control-user @error('exp_tp') is-invalid @enderror" name="exp_tp" id="exp_tp" placeholder="Enter Exp TP">
                @error('exp_tp')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="rsi_buy">Rsi Buy</label>
                <input type="text" class="form-control form-control-user @error('rsi_buy') is-invalid @enderror" name="rsi_buy" id="rsi_buy"
                    placeholder="Enter Rsi Buy">
                    @error('rsi_buy')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
        </div>
        <div class="col-sm-6">
            <label for="rsi_sell">Rsi Sell</label>
            <input type="text" class="form-control form-control-user @error('rsi_sell') is-invalid @enderror" name="rsi_sell" id="rsi_sell" placeholder="Enter Rsi Sell">
                @error('rsi_sell')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="new_trade_wait_time">New Trade Wait Time</label>
        <input type="text" class="form-control form-control-user @error('new_trade_wait_time') is-invalid @enderror"
            id="new_trade_wait_time" name="new_trade_wait_time" placeholder="Enter New Trade Wait Time">
            @error('new_trade_wait_time')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="isStop" id="isStop" checked>
                <label class="form-check-label" for="flexCheckDefault" checked>
                  Stop
                </label>
            </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="isStopLossHandle" id="isStopLossHandle" checked>
                <label class="form-check-label" for="flexCheckDefault" checked>
                  Stop Loss Handle
                </label>
            </div>
        </div>
    </div>
      <center>
       <button type="submit" class="btn btn-primary ml-3">Submit</button>
      </center>
 </form>
</div>
@endsection