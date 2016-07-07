@extends('layouts.master')

@section('title')
New Payment
@endsection
        
@section('heading')
    <style type="text/css">
        .input-group-addon {
            min-width:200px;
            text-align:left;
        }
    </style>

@endsection

@section('content')

<div class="wraper container-fluid">

        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/payments') }}">Payments</a></li>
            <li class="active">New</li>
        </ol>

    <div class="col-md-9 col-md-offset-1">
        <div class="panel panel-color panel-inverse">
            <div class="panel-heading"> 
                <h3 class="panel-title">New Payment</h3> 
            </div> 
            <div class="panel-body text-center"> 
                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                            </ul>
                        </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="/payments/save">
                    {{ csrf_field() }}

                    <div class="form-group input-group">
                            <span class="input-group-addon">Company</span>
                            <select class="form-control" name="member_id" >
                            @foreach($members as $member)
                                <option value="{{ $member->_id }}">{{ $member->company }}</option>
                            @endforeach
                            </select>
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">Amount</span>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    

                    <div class="form-group input-group">
                            <span class="input-group-addon">Payment Method</span>
                            <select class="form-control" name="payment_methods" >
                                <option>Cash</option>
                                <option>Cheque</option>
                                <option>Bank Transfer</option>
                                <option>Other</option>
                            </select>
                    </div>

                    <div class="form-group input-group">
                            <span class="input-group-addon">Payment Type</span>
                            <select class="form-control" name="payment_type" >
                                <option>Annual Dues</option>
                                <option>Monthly Dues</option>
                                <option>Other</option>
                            </select>
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">Ref Number</span>
                        <input type="text" name="ref_number" class="form-control" required>
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">Pay Date</span>
                        <input type="date" name="paydate" class="form-control" id="paydate">
                    </div>

                    <div class="form-group input-group">
                            <span class="input-group-addon">Comments</span>
                            <textarea class="form-control" rows="3" name="comments"></textarea>
                    </div>

                     <div>
                        <a href="{{ url('/payments') }}" class="btn btn-inverse pull-left"> Cancel</a>
                        <button type="submit"  class="btn btn-success pull-right"> Save</button>
                    </div>
                </form>

            </div> 
           
        </div>
    </div>

</div>
@endsection

@section('jquery')
    
    var d = new Date().toISOString().slice(0,10); 

    $('#paydate').val(d);


@endsection