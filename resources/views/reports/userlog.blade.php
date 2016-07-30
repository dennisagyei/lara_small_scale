@extends('layouts.master')


@section('title', 'User Activity Log Report')

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
                                        <h1 class="text-right">User Activity Report</h1>
                                        
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
                                            <table id="useractivityreport" class="table m-t-30">
                                                <thead>
                                                    <tr><th>#</th>
                                                    <th>User Name</th>
                                                    <th>Login Date</th>
                                                    <th>Machine</th>
                                                    <th>IP</th>
                                                    
                                                </tr></thead>
                                                <tbody>
                                                    <?php $i = 0;?>
                                                    @foreach($userlogs as $log)
                                                     <?php $i++; ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $log->user->name }}</td>
                                                        <td>{{ $log->created_at }}</td>
                                                        <td>{{ $log->machine }}</td>
                                                        <td>{{ $log->ip }}</td>
                                                        
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
                                        <a href="#" class="btn btn-inverse"><i class="fa fa-print"></i></a>
                                        <a href="{{ url('/reports/useractivity/export') }}" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

</div>
@endsection