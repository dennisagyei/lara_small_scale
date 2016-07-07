@extends('layouts.master')

@section('title')
Edit Payment
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

    <div class="page-title"> 
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/payments') }}">Payments</a></li>
            <li class="active">Edit Payment</li>
        </ol>
    </div>

    <div class="col-md-9 col-md-offset-1">
        <div class="panel panel-color panel-inverse">
            <div class="panel-heading"> 
                <h3 class="panel-title">Edit Payment</h3> 
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
                <form class="form-horizontal" role="form" method="POST" action="/payments/{{ $payment->_id }}/update">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group input-group">
                            <span class="input-group-addon">Company</span>
                            <select class="form-control" name="member_id" >
                            @foreach($members as $member)
                                <option  {{ $payment->member_id == $member->_id ? 'selected' : '' }} value="{{ $member->_id }}">{{ $member->company }}</option>
                            @endforeach
                            </select>
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">Amount</span>
                        <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}">
                    </div>
                    

                    <div class="form-group input-group">
                            <span class="input-group-addon">Payment Method</span>
                            <select class="form-control" name="payment_methods" >
                                <option  {{ $payment->payment_methods == 'Cash' ? 'selected' : '' }}>Cash</option>
                                <option  {{ $payment->payment_methods == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                                <option  {{ $payment->payment_methods == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                <option  {{ $payment->payment_methods == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                    </div>

                    <div class="form-group input-group">
                            <span class="input-group-addon">Payment Type</span>
                            <select class="form-control" name="payment_type" >
                                <option  {{ $payment->payment_type == 'Annual Dues' ? 'selected' : '' }}>Annual Dues</option>
                                <option  {{ $payment->payment_type == 'Monthly Dues' ? 'selected' : '' }}>Monthly Dues</option>
                                <option  {{ $payment->payment_type == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">Ref Number</span>
                        <input type="text" name="ref_number" class="form-control" value="{{ $payment->ref_number }}">
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">Pay Date</span>
                        <input type="date" name="paydate" class="form-control" value="{{ substr($payment->paydate,0,10) }}">
                    </div>

                    <div class="form-group input-group">
                            <span class="input-group-addon">Comments</span>
                            <textarea class="form-control" rows="3" name="comments">{{ $payment->comments }}</textarea>
                    </div>

                    <a href="{{ url('/payments/confirm/'.$payment->_id) }}" class="btn btn-danger pull-left">Delete</a>

                     <div class="pull-right">
                        <a href="{{ url('/payments') }}" class="btn btn-inverse"> Cancel</a>
                        <button type="submit"  class="btn btn-success"> Save</button>
                    </div>
                </form>

            </div> 
           
        </div>
    </div>

</div>
@endsection

