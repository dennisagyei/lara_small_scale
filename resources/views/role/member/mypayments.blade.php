@extends('layouts.member')


@section('title', 'My Payments')

@section('content')
<div class="wraper container-fluid">

 

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">My Payments</h3></div>
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