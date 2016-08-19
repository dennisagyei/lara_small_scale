@extends('layouts.member')


@section('title', 'My Details ')

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


    <div class="row">

        <div class="col-md-12">
          
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">My Membership Details</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/members/{{ $member->_id }}/update">
                         {{ method_field('PATCH') }}
                         {{ csrf_field() }}
                       

                        <div class="form-group input-group">
                            <span class="input-group-addon ">Company Name</span>
                            <input type="text" class="form-control" name="company" value="{{ $member->company}}" readonly>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Registration no</span>
                                <input type="text" name="registration_no" class="form-control" value="{{ $member->registration_no}}">
                            </div>        
                        </div>    

                            <div class="form-group input-group">
                                <span class="input-group-addon">Registration Date</span>
                                <input type="date" name="registration_date" class="form-control" value="{{ substr($member->registration_date,0,10) }}">

                            </div> 
                        
                        <div class="form-group input-group">
                            <span class="input-group-addon">Contact Person</span>
                            <input type="text" name="contact_person" class="form-control" value="{{ $member->contact_person }}">
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Contact Phone</span>
                            <input type="tel" name="contact_phone" class="form-control" value="{{ $member->contact_phone }}">
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Email</span>
                            <input type="email" name="email" class="form-control" value="{{ $member->email }}">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">Address</span>
                            <textarea class="form-control" rows="5" name="address">{{ $member->address }}</textarea>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">District</span>
                            <select class="form-control" name="district">
                                <option  {{ $member->district == 'Tarkwa' ? 'selected' : '' }}>Tarkwa</option>
                                <option  {{ $member->district == 'Bolga' ? 'selected' : '' }}>Bolga</option>
                                <option  {{ $member->district == 'Wa' ? 'selected' : '' }}>Wa</option>
                                <option  {{ $member->district == 'Bibiani' ? 'selected' : '' }}>Bibiani</option>
                                <option  {{ $member->district == 'Dunkwa' ? 'selected' : '' }}>Dunkwa</option>
                                <option  {{ $member->district == 'Konongo' ? 'selected' : '' }}>Konongo</option>
                                <option  {{ $member->district == 'Assin Fosu' ? 'selected' : '' }}>Assin Fosu</option>
                                <option  {{ $member->district == 'Akyem Oda' ? 'selected' : '' }}>Akyem Oda</option>
                                <option  {{ $member->district == 'Asankragwa' ? 'selected' : '' }}>Asankragwa</option>
                                
                            </select>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Member Type</span>
                                <input type="text" name="member_type" class="form-control" value="{{ $member->member_type }}">
                            </div> 
                        </div>         

                        <div class="form-group input-group">
                            <span class="input-group-addon">Member Status</span>
                            <select class="form-control" name="member_status">
                                <option  {{ $member->member_status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option  {{ $member->member_status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option  {{ $member->member_status == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                            </select>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group input-group">
                            <span class="input-group-addon">EPA Permit No.</span>
                            <input type="text" name="epa_permit_no" class="form-control" value="{{ $member->epa_permit_no }}">
                            </div>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Expiry Date</span>
                            <input type="date" name="epa_expiry_date" class="form-control" value="{{ substr($member->epa_expiry_date,0,10)}}">
                        </div>

                        <div class="col-md-6">
                        <div class="form-group input-group">
                            <span class="input-group-addon">Mining license</span>
                            <input type="text" name="mining_license" class="form-control" value="{{ $member->mining_license }}">
                        </div>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">Expiry Date</span>
                            <input type="date" name="mining_expiry_date" class="form-control" value="{{ substr($member->mining_expiry_date,0,10)}}">
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group input-group">
                            <span class="input-group-addon">Operating license</span>
                            <input type="text" name="operating_license" class="form-control" value="{{ $member->operating_license }}">
                            </div>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon">Expiry Date</span>
                            <input type="date" name="oper_expiry_date" class="form-control" value="{{ substr($member->oper_expiry_date,0,10) }}">
                        </div>

                        <a href="{{ url('/members/confirm/'.$member->_id) }}" class="btn btn-danger">Delete</a>

                        <div class="pull-right">
                            <a href="{{ url('/members') }}" class="btn btn-inverse">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button> 
                        </div>
                    </form>
                </div>
            </div>

        </div>       
    </div>
</div>
@endsection