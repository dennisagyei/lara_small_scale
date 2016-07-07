@extends('layouts.master')


@section('title', 'Payments')

@section('content')
<div class="wraper container-fluid">

    <div class="page-title"> 
        <h3 class="title"><i class="fa fa-money fa-lg"></i> Levy>Payments</h3> 
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><button class="btn btn-inverse"><i class="fa fa-plus"></i> Add Payment</button></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
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
                                        <tr>
                                            <td class="text-center">2016-06-19</td>
                                            <td>Angel Mining</td>
                                            <td>Ghs 500.00</td>
                                            <td>Cash</td>
                                            <td>000001</td>
                                            <td class="text-center"> <a href="#" class="btn btn-default btn-sm"><i class="fa fa-list-ul" aria-hidden="true"></i></a> </td>
                                        </tr>
                                        
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