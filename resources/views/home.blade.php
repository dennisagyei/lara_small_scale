@extends('layouts.master')

@section('content')
<div class="wraper container-fluid">
                <div class="row">
                    <div class="col-sm-6 page-title"> 
                        <h3 class="title"><span id="timer"></span></h3> 
                    </div>
                     <div class="col-sm-6 page-title"> 
                        <h3 class="title text-right">District : {{ Auth::check() ? Auth::user()->district : '' }}</h3> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-info"><i class="fa fa-users"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">{{ $memberCount }}</span>
                                Total Members
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-warning"><i class="fa fa-building"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">{{ $concessionCount }}</span>
                                Concessions
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-pink"><i class="fa fa-money"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">{{ $Totalpayment }}</span>
                                Total levies
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon bg-success"><i class="fa fa-user"></i></span>
                            <div class="mini-stat-info text-right">
                                <span class="counter">{{ $userCount }}</span>
                                New Users
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">

                        <!-- TODO -->
                        @if (Auth::check() and Auth::user()->role=='admin')
                        <div class="portlet" id="todo-container"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Recent User Accounts
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet-5" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet-5" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;?>
                                                @foreach($users as $user)
                                                    <?php $i++; ?>
                                                <tr>
                                                    <td> {{ $i }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->status }}</td>
                                                    <td> <a href="{{ url('/users/enable/'.$user->_id) }}"> <span class="label label-info">Approve</span> </a></td>
                                                   
                                                </tr>
                                                    
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </div>
                        @endif
                    </div> <!-- end col -->

                    <div class="col-lg-8">

                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Recent Members
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Company Name</th>
                                                    <th>Contact Person</th>
                                                    <th>Phone</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;?>
                                                @foreach($members as $member)
                                                    <?php $i++; ?>
                                                <tr>
                                                    <td> {{ $i }}</td>
                                                    <td>{{ $member->company }}</td>
                                                    <td>{{ $member->contact_person }}</td>
                                                    <td>{{ $member->contact_phone }}</td>
                                                    <td> <a href="{{ url('/members/'.$member->_id.'/edit') }}"> <span class="label label-info">view</span> </a></td>
                                                   
                                                </tr>
                                                    
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    
                </div> <!-- End row -->


            </div>
@endsection

@section('script')

<script type="text/javascript">

    function date_time() {
      now = moment().format('LLLL');
      document.getElementById('timer').innerHTML = now;
      setTimeout(function () { date_time(); }, 1000);
    }
    
    
    date_time();
</script>
@endsection