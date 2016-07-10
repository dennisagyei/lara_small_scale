@extends('layouts.master')


@section('title', 'Compose Email')

@section('heading')
 <link rel="stylesheet" type="text/css" href="/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
 <link rel="stylesheet" type="text/css" href="/assets/select2/select2.css" />

 @endsection

@section('content')
<div class="wraper container-fluid">

        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/notifications/email') }}">Notifications</a></li>
            <li><a href="{{ url('/notifications/email') }}">Email</a></li>
            <li class="active">Compose Email</li>
        </ol>

    <div class="row">

         <div class="col-md-9 col-md-offset-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar" role="toolbar">
                                    <h3 class="pull-left m-t-5 m-b-0">Compose Mail</h3>
                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default m-t-20">
                            <div class="panel-body p-t-10">

                            @if (session('mail_status'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ session('mail_status') }}
                            </div>
                            @endif
                                
                                <form role="form" method="POST" action="/notifications/email/send">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <select name="to_email[]" class="select2" multiple data-placeholder="Choose a Member...">
                                              <option value="#">&nbsp;</option>
                                              @foreach($members as $member)
                                                <option value="{{ $member->email }}">{{ $member->company }}</option>
                                              @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                            <div class="">
                                                <input name="cc_email" type="email" class="form-control" placeholder="Cc">
                                            </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="wysihtml5 form-control" placeholder="Message body" style="height: 200px"></textarea>
                                    </div>

                                     <div class="pull-right">
                                        <button type="button" class="btn btn-success m-r-5"><i class="fa fa-floppy-o"></i></button>
                                        <button type="button" class="btn btn-danger m-r-5"><i class="fa fa-trash-o"></i></button>
                                        <button type="submit" class="btn btn-purple"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
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
        <script  type="text/javascript" src="/assets/select2/select2.min.js"></script>
@endsection

@section('jquery')
    $('.wysihtml5').wysihtml5();


                jQuery(".select2").select2({
                    width: '100%'
                });
@endsection