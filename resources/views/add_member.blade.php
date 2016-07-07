@extends('layouts.master')


@section('title', 'New Member Registration')

@section('content')
<div class="wraper container-fluid">

    <div class="page-title"> 
        <h3 class="title"><i class="fa fa-users fa-lg"></i> New Member</h3> 
    </div>

    <div class="row">

        <div class="col-md-12">
          
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add Memmber</h3></div>
                <div class="panel-body">
                                <form role="form" method="POST">
                                    <div class="form-group">
                                        <label for="InputNotEmail">Company Name</label>
                                        <input type="text" class="form-control" name="company"  placeholder="Enter company name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="InputPhone">Registration no</label>
                                        <input type="text" class="form-control" name="registration_no" placeholder="Enter registration no">
                                    </div>

                                

                                    <a type="submit" class="btn btn-inverse">Update</a>
                                </form>
                </div>
            </div>

        </div>       
    </div>
</div>
@endsection