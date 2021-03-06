@extends('layouts.master')


@section('title', 'User Profile')

@section('content')
<div class="wraper container-fluid">

	     <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/users') }}">Users</a></li>
            <li class="active">New</li>
        </ol>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">New User Account</h3></div>
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
                                <form role="form" method="POST" action="/users/save" >
                                    
                                    {{ csrf_field() }}

                                	<div class="form-group">
                                        <label for="InputUsername">Name</label>
                                        <input type="text" class="form-control" id="InputUsername" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email address</label>
                                        <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                            <label for="InputRole">Role</label>
                                            <select id="InputRole" class="form-control" name="role" required>
                                                <option></option>
                                                <option>Member</option>
                                                <option>Head Quarters Admin</option>
                                                <option>District Admin</option>
                                            </select>
                                    </div>
                                    
                                    <div id="InputDistrictGroup" class="form-group">
                                            <label for="InputDistrict">Assign District</label>
                                            <select id="InputDistrict" class="form-control" name="district" required>
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
                                    <div id="InputMemberGroup" class="form-group">
                                            <label for="InputMember">Assign Company</label>
                                            <select id="InputMember" class="form-control" name="member_id" >
                                            @foreach($members as $member)
                                                <option value="{{ $member->_id }}">{{ $member->company }}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="InputPhone">Phone</label>
                                        <input type="phone" class="form-control" id="InputPhone" name="phone" placeholder="Enter phone no" value="{{ old('phone') }}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="InputPassword">Password</label>
                                        <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password" required>
                                    </div>
                                    
                                    <a href="{{ url('/users') }}" class="btn btn-inverse pull-left">Cancel</a>
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                </form>
				</div>
			</div>
			
		</div>
		
		
			
		</div>		
	</div>
</div>
@endsection

@section('jquery')
    $("#InputMemberGroup").hide();
    $("#InputDistrictGroup").hide();
    
    $("#InputRole").change(function(){
      if ($("#InputRole option:selected").text()=='Member')
      {
          $("#InputMemberGroup").show();
          $("#InputDistrictGroup").hide();
      }
      else if ($("#InputRole option:selected").text()=='District Admin')
      {
          $("#InputDistrictGroup").show();
          $("#InputMemberGroup").hide();
      }
      else
      {
          $("#InputDistrictGroup").hide();
          $("#InputMemberGroup").hide();
      }
    
    
    });

@endsection