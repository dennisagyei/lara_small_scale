@extends('layouts.master')


@section('title', 'New ')

@section('heading')
    <style type="text/css">
        .input-group-addon {
            min-width:200px;
            text-align:left;
        }
    </style>

@endsection

@section('content')
<div class="wraper container-fluid">

        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/members') }}">Members</a></li>
            <li class="active">New</li>
        </ol>

    <div class="row">

        <div class="col-md-12">
          
            <div class="panel panel-color panel-inverse">
                <div class="panel-heading"><h3 class="panel-title">Add Member</h3></div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="/members/save">
                        {{ csrf_field() }}

                        <div class="form-group input-group">
                            <span class="input-group-addon ">Company Name</span>
                            <input type="text" class="form-control" name="company" required >
                        </div>

                        <div class="col-md-6">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Registration no</span>
                                <input type="text" name="registration_no" class="form-control" required >
                            </div>        
                        </div>    

                            <div class="form-group input-group">
                                <span class="input-group-addon">Registration Date</span>
                                <input id="registration_date" type="date" name="registration_date" class="form-control" required>

                            </div> 
                        
                        <div class="form-group input-group">
                            <span class="input-group-addon">Contact Person</span>
                            <input type="text" name="contact_person" class="form-control" required>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Contact Phone</span>
                            <input type="tel" name="contact_phone" class="form-control" required>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Email</span>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">Address</span>
                            <textarea class="form-control" rows="5" name="address"></textarea>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">District</span>
                            <select class="form-control" name="district">
                                <option>Tarkwa</option>
                                <option>Bolga</option>
                                <option>Wa</option>
                                <option>Bibiani</option>
                                <option>Dunkwa</option>
                                <option>Konongo</option>
                                <option>Assin Fosu</option>
                                <option>Akyem Oda</option>
                                <option>Asankragwa</option>
                            </select>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Member Type</span>
                                <input type="text" name="member_type" class="form-control">
                            </div> 
                        </div>         

                        <div class="form-group input-group">
                            <span class="input-group-addon">Member Status</span>
                            <select class="form-control" name="member_status" >
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Suspended</option>
                            </select>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group input-group">
                            <span class="input-group-addon">EPA Permit No.</span>
                            <input type="text" name="epa_permit_no" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Expiry Date</span>
                            <input type="date" name="epa_expiry_date" class="form-control" id="epa_expiry_date">
                        </div>

                        <div class="col-md-6">
                        <div class="form-group input-group">
                            <span class="input-group-addon">Mining license</span>
                            <input type="text" name="mining_license" class="form-control">
                        </div>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">Expiry Date</span>
                            <input type="date" name="mining_expiry_date" class="form-control" id="mining_expiry_date">
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group input-group">
                            <span class="input-group-addon">Operating license</span>
                            <input type="text" name="operating_license" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Expiry Date</span>
                            <input type="date" name="oper_expiry_date" class="form-control" id="oper_expiry_date">
                        </div>

                        <div class="pull-right">
                            <a href="{{ url('/members') }}" class="btn btn-inverse">Cancel</a>
                            <button type="submit" class="btn btn-inverse">Save</button> 
                        </div>


                    </form>
                </div>

            </div>

        </div>       
    </div>
</div>
@endsection


@section('jquery')
    
    var d = new Date().toISOString().slice(0,10); 

    $('#registration_date').val(d);
    $('#epa_expiry_date').val(d);
    $('#mining_expiry_date').val(d);
    $('#oper_expiry_date').val(d);

@endsection