@extends('layouts.master')


@section('title', 'Compose Email')

@section('heading')
 <link rel="stylesheet" type="text/css" href="/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
 <link rel="stylesheet" type="text/css" href="/assets/jquery-multi-select/multi-select.css" />
 @endsection

@section('content')
<div class="wraper container-fluid">

        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/notifications/email') }}">Notifications</a></li>
            <li><a href="{{ url('/notifications/email') }}">Sms</a></li>
            <li class="active">Compose Sms</li>
        </ol>

    <div class="row">

         <div class="col-md-9 col-md-offset-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar" role="toolbar">
                                    <h3 class="pull-left m-t-5 m-b-0">Compose Sms</h3>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-success m-r-5"><i class="fa fa-floppy-o"></i></button>
                                        <button type="button" class="btn btn-danger m-r-5"><i class="fa fa-trash-o"></i></button>
                                        <button class="btn btn-purple"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default m-t-20">
                            <div class="panel-body p-t-10">
                                
                                <form role="form">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="To">
                                    </div>

                                    <select class="select2" multiple data-placeholder="Choose a Country...">
                                              <option value="#">&nbsp;</option>
                                              <option value="United States">United States</option>
                                              <option value="United Kingdom">United Kingdom</option>
                                              <option value="Afghanistan">Afghanistan</option>
                                    </select>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" placeholder="Cc">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" placeholder="Bcc">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="wysihtml5 form-control" placeholder="Message body" style="height: 200px"></textarea>
                                    </div>
                                </form>
                            </div> <!-- panel -body -->
                        </div> <!-- panel -->
                    </div>
         
    </div>
</div>
@endsection

@section('script')
        <script type="text/javascript" src="/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
@endsection

@section('jquery')
    $('.wysihtml5').wysihtml5();
@endsection