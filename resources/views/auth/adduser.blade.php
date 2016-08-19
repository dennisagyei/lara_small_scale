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
                                        <input type="text" class="form-control" id="InputUsername" name="name" placeholder="Enter name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email address</label>
                                        <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" required>
                                    </div>
                                    
                                     <div class="form-group">
                                         
                                            <label for="InputRole">Role</label>
                                            <select id="InputRole" class="form-control" name="role" >
                                                <option>Member</option>
                                                <option>Head Quarters Admin</option>
                                                <option>Tarkwa Admin</option>
                                                <option>Bolga Admin</option>
                                                <option>Wa Admin</option>
                                                <option>Bibiani Admin</option>
                                                <option>Dunkwa Admin</option>
                                                <option>Konongo Admin</option>
                                                <option>Assin Fosu Admin</option>
                                                <option>Akyem Oda Admin</option>
                                                <option>Asankragwa Admin</option>
                                            </select>
                                      </div>
                                        
                                        
                                    
                                    <div class="form-group">
                                        <label for="InputPhone">Phone</label>
                                        <input type="phone" class="form-control" id="InputPhone" name="phone" placeholder="Enter phone no" required>
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