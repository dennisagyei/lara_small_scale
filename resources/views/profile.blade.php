@extends('layouts.master')


@section('title', 'User Profile')

@section('content')
<div class="wraper container-fluid">

	<div class="page-title"> 
		<h3 class="title">My Profile</h3> 
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Profile Settings</h3></div>
				<div class="panel-body">
                                <form role="form">
                                	<div class="form-group">
                                        <label for="InputUsername">Username</label>
                                        <input type="text" class="form-control" id="InputUsername" placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email address</label>
                                        <input type="email" class="form-control" id="InputEmail" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword">New Password</label>
                                        <input type="password" class="form-control" id="InputPassword" placeholder="Password">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-inverse">Update</button>
                                </form>
				</div>
			</div>
			
		</div>
		
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Notification Settings</h3></div>
				<div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="InputNotEmail">Email address</label>
                                        <input type="email" class="form-control" id="InputNotEmail" placeholder="Enter email">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="InputPhone">Phone</label>
                                        <input type="tel" class="form-control" id="InputPhone" placeholder="Enter Phone">
                                    </div>

                                    <div class="form-group">
                                        <label class="cr-styled">
                                            <input type="checkbox">
                                            <i class="fa"></i> 
                                            Send Notifications
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-inverse">Update</button>
                                </form>
				</div>
			</div>
			
		</div>		
	</div>
</div>
@endsection