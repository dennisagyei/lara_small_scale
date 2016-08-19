@extends('layouts.master')


@section('title', 'Payments Report')

@section('content')
<div class="wraper container-fluid">

    <div class="page-title"> 
        <h3 class="title"><i class="fa fa-line-chart fa-lg"></i> Reports</h3> 
    </div>

    <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h1 class="text-right">Member Payments Report</h1>
                                        
                                    </div>
                                    <div class="pull-right">
                                        
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="" class="table m-t-30">
                                                <thead>
                                                    <tr><th>#</th>
                                                    <th>Member</th>
                                                    <th>Ref number</th>
                                                    <th>Payment Date</th>
                                                    <th>Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Remarks</th>
                                                    
                                                </tr></thead>
                                                <tbody>
                                                    <?php $i = 0;?>
                                                    @foreach($payments as $report)
                                                     <?php $i++; ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $report->member->company }}</td>
                                                        <td>{{ $report->ref_number }}</td>
                                                        <td>{{ $report->paydate }}</td>
                                                        <td>{{ $report->amount }}</td>
                                                        <td>{{ $report->payment_methods }}</td>
                                                        <td>{{ $report->comments }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a id="print-preview" class="btn btn-inverse" onclick="window.print()"><i class="fa fa-print"></i></a>
                                        <a href="{{ url('/reports/paymentlist/export') }}" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

</div>
@endsection