@extends('layouts.member')


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
                                <form role="form" method="POST" action="/user/profile" >
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}

                                	<div class="form-group">
                                        <label for="InputUsername">Name</label>
                                        <input type="text" class="form-control" id="InputUsername" name="name" placeholder="Enter name" value="{{ Auth::check() ? Auth::user()->name : ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email address</label>
                                        <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" disabled value="{{ Auth::check() ? Auth::user()->email : ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword">New Password</label>
                                        <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password">
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
                                <form role="form" method="POST" action="/user/profile">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="InputNotEmail">Notification Email</label>
                                        <input type="email" class="form-control" id="InputNotEmail" name="notify_email" placeholder="Enter email" value="{{ Auth::check() ? Auth::user()->notify_email : ''}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="InputPhone">Phone</label>
                                        <input type="tel" class="form-control" name="phone" id="InputPhone" placeholder="Enter Phone" value="{{ Auth::check() ? Auth::user()->phone : ''}}">
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