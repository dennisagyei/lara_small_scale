@extends('layouts.master')


@section('title', 'New Members Report')

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
                                        <h1 class="text-right">New Members Report</h1>
                                        
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
                                                    <th>Company</th>
                                                    <th>Reg.No</th>
                                                    <th>Contact</th>
                                                    <th>Contact Phone</th>
                                                    <th>District</th>
                                                    <th>Reg. Date</th>
                                                    <th>Status</th>
                                                </tr></thead>
                                                <tbody>
                                                    <?php $i = 0;?>
                                                    @foreach($members as $member)
                                                     <?php $i++; ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $member->company }}</td>
                                                        <td>{{ $member->registration_no }}</td>
                                                        <td>{{ $member->contact_person }}</td>
                                                        <td>{{ $member->contact_phone }}</td>
                                                        <td>{{ $member->district }}</td>
                                                        <td>{{ substr($member->registration_date,0,10) }}</td>
                                                        <td>{{ $member->member_status }}</td>
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
                                        <a href="{{ url('/reports/memberlist/export') }}" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

</div>
@endsection