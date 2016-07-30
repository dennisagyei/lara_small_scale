@extends('layouts.master')


@section('title', 'Payments')

@section('content')
<div class="wraper container-fluid">

    <div class="page-title"> 
        <h3 class="title"><i class="fa fa-money fa-lg"></i> All Payments</h3> 
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/payments/new') }}" class="btn btn-inverse"><i class="fa fa-plus"></i> Add Payment</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                
                            @if (session('payment_msg'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ session('payment_msg') }}
                            </div>
                            @endif
                                <table id="Paymentsdatatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Entry Date</th>
                                            <th>Company Name</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Ref Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td class="text-center">{{ substr($payment->paydate,0,10) }}</td>
                                            <td>{{ $payment->member->company }}</td>
                                            <td>Ghs {{ $payment->amount }}</td>
                                            <td>{{ $payment->payment_methods }}</td>
                                            <td>{{ $payment->ref_number }}</td>
                                            <td class="text-center"> <a href="{{ url('/payments/'.$payment->_id.'/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ul" aria-hidden="true"></i></a> </td>
                                        </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>       
    </div>
</div>
@endsection