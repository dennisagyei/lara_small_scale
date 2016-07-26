@extends('layouts.master')


@section('title', 'Email Notifications')

@section('content')
<div class="wraper container-fluid">

    <div class="page-title"> 
        <h3 class="title"><i class="fa fa-envelope fa-lg"></i> Notifications/Email</h3> 
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/notifications/email/send') }}" class="btn btn-inverse"><i class="fa fa-plus"></i> Compose Email</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="Membersdatatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Entry Date</th>
                                            <th>Sender</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($notifications as $notify)
                                        <tr>
                                            <td class="text-center">{{ substr($notify->created_at,0,10) }}</td>
                                            <td>{{ $notify->sender }}</td>
                                            <td>{{ $notify->subject }}</td>
                                            <td><span class="label label-success">{{ $notify->status }}</span></td>
                                            <td class="text-center"> <a href="#" class="btn btn-default btn-sm"><i class="fa fa-list-ul" aria-hidden="true"></i></a> </td>
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