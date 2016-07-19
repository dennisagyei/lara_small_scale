@extends('layouts.master')

@section('content')
<div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title"><span id="timer"></span></h3> 
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
                        <div class="portlet" id="todo-container"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Alerts & Actions
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
                                <div class="portlet-body todoapp">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 id="todo-message"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h4> 
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="" class="pull-right btn btn-primary btn-sm" id="btn-archive">Archive</a>
                                        </div>
                                    </div>

                                    <ul class="list-group no-margn nicescroll todo-list" style="max-height: 275px;" id="todo-list"></ul>

                                     <form name="todo-form" id="todo-form" role="form" class="m-t-20">
                                        <div class="row">
                                            <div class="col-sm-9 todo-inputbar">
                                                <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo">
                                            </div>
                                            <div class="col-sm-3 todo-send">
                                                <button class="btn-info btn-block btn" type="button" id="todo-btn-submit">Add</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
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