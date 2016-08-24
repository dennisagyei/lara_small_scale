@extends('layouts.master')


@section('title', 'Members')

@section('content')
<div class="wraper container-fluid">

    <div class="page-title"> 
        <h3 class="title"><i class="fa fa-users fa-lg"></i> All Members</h3> 
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a class="btn btn-inverse" href="{{ url('/members/new') }}"><i class="fa fa-plus"></i> Add Member</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            
                            @if (session('member_msg'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ session('member_msg') }}
                            </div>
                            @endif
                                <table id="Membersdatatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Company Name</th>
                                            <th>Contact Person</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($members as $member)
                                       
                                        <tr>
                                            <td class="text-center"><i class="fa fa-building fa-lg" aria-hidden="true"></i></td>
                                            <td>{{ $member->company }}</td>
                                            <td>{{ $member->contact_person }}</td>
                                            <td>{{ $member->contact_phone }}</td>
                                            <td><span class="label label-success">{{ $member->member_status }}</span></td>
                                            <td class="text-center"> <a href="{{ url('/members/'.$member->_id.'/edit') }}" class="btn btn-default btn-sm"><i class="fa fa-list-ul" aria-hidden="true"></i></a> </td>
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