@extends('layouts.master')


@section('title', 'Concession Management')

@section('content')
<div class="wraper container-fluid">

    <div class="page-title"> 
        <h3 class="title"><i class="fa fa-building-o fa-lg"></i> All Concessions</h3> 
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><button class="btn btn-inverse"><i class="fa fa-plus"></i> Add Concession</button></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="Membersdatatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Owner</th>
                                            <th>Location</th>
                                            <th>Size</th>
                                            <th>Zone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Angel Mining</td>
                                            <td>Assin Fosu</td>
                                            <td>Kofi Owusu</td>
                                            <td>044 686867</td>
                                            <td><span class="label label-success">Active</span></td>
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