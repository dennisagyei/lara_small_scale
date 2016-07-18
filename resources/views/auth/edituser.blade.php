@extends('layouts.master')


@section('title', 'User Profile')

@section('content')
<div class="wraper container-fluid">

	     <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/users') }}">Users</a></li>
            <li class="active">Edit</li>
        </ol>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Edit User Account</h3></div>
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
                                <form role="form" method="POST" action="/users/update/{{ $user->_id }}" >
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}

                                	<div class="form-group">
                                        <label for="InputUsername">Name</label>
                                        <input type="text" class="form-control" id="InputUsername" name="name" placeholder="Enter name" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email address</label>
                                        <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" value="{{ $user->email }}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="InputPhone">Phone</label>
                                        <input type="phone" class="form-control" id="InputPhone" name="phone" placeholder="Enter phone no" value="{{ $user->phone }}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="InputPassword">Password</label>
                                        <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password" >
                                    </div>
                                    
                                    <button type="submit" class="btn btn-inverse pull-right">Save</button>
                                </form>
				</div>
			</div>
			
		</div>
		
		
			
		</div>		
	</div>
</div>
@endsection