@extends('layouts.master')


@section('title', 'Users Setup')

@section('content')

<div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">User Accounts </h3> 
                </div>
                  
                <div class="row">
                
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form method="POST" action="/users/find">
                                     {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" id="example-input1-group2" name="search" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-search"></i></button>
                                    </span>
                                    
                                    <a href="{{ url('/users/add') }}" type="button" class="btn btn-inverse pull-right"> Add User</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div> <!-- End row -->

                <div class="row">
                    @foreach($users as $user)
                    <div class="col-sm-6">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <a class="pull-left" href="#">
                                        <img class="thumb-lg img-circle bx-s" src="/img/user.png" alt="">
                                    </a>
                                    <div class="pull-right btn-group-sm">
                                        <a href="{{ url('/users/edit/'.$user->_id) }}" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ url('/users/destroy/'.$user->_id) }}" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <h4>{{ $user->name }}</h4>
                                        <p class="text-muted"> {{ $user->email }}</p>
                                        @if($user->status=='Active')
                                            <span class="label label-success">{{ $user->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $user->status }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr/>
                                    <button class="btn btn-primary btn-rounded m-b-5"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user->phone }}</button>
                                    
                                    @if ($user->status=='Active')
                                    <a href="/users/disable/{{ $user->_id }}" class="btn btn-primary btn-rounded m-b-5 pull-right"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disable</a>
                                    @elseif ($user->status<>'Active')
                                    <a href="/users/enable/{{ $user->_id }}" class="btn btn-danger btn-rounded m-b-5 pull-right"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Enable</a>
                                    @endif
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- end col -->
                    @endforeach
                  </div>
</div>
@endsection