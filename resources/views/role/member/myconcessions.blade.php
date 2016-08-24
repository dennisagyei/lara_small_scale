@extends('layouts.member')


@section('title', 'Concession Management')

@section('content')
<div class="wraper container-fluid">


    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">My Concessions</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                
                            @if (session('concession_msg'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ session('concession_msg') }}
                            </div>
                            @endif
                                <table id="Membersdatatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Owner</th>
                                            <th>Location</th>
                                            <th>Size</th>
                                            <th>Zone</th>
                                            <th>Status</th>
                                            <th>Map</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($concessions as $concession)
                                        <tr>
                                            <td>{{ $concession->member->company }}</td>
                                            <td>{{ $concession->location }}</td>
                                            <td>{{ $concession->size }}</td>
                                            <td>{{ $concession->zone }}</td>
                                            <td><span class="label label-success">{{ $concession->status}}</span></td>
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