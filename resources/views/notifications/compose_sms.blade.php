@extends('layouts.master')


@section('title', 'Compose SMS')

@section('heading')
 <link rel="stylesheet" type="text/css" href="/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
 <link rel="stylesheet" type="text/css" href="/assets/select2/select2.css" />

 @endsection

@section('content')
<div class="wraper container-fluid">

        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/notifications/sms') }}">Notifications</a></li>
            <li><a href="{{ url('/notifications/sms') }}">Sms</a></li>
            <li class="active">Compose SMS</li>
        </ol>

    <div class="row">

         <div class="col-md-9 col-md-offset-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar" role="toolbar">
                                    <h3 class="pull-left m-t-5 m-b-0">Compose SMS</h3>
                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default m-t-20">
                            <div class="panel-body p-t-10">

                            @if (session('sms_status'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ session('sms_status') }}
                            </div>
                            @endif
                                
                                <form role="form" method="POST" action="/notifications/sms/send">
                                        {{ csrf_field() }}

                                    <div class="form-group">
                                         <label class="small" for="recipient">To:</label>
                                        <select id="recipients" name="recipients[]" class="select2" multiple data-placeholder="Choose a Member..." required>
                                              @foreach($members as $member)
                                                <option value="{{ $member->contact_phone }}">{{ $member->company }}</option>
                                              @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="small" for="subject">Subject:</label>
                                        <input id="subject" name="subject" type="text" class="form-control" placeholder="Whats your message about" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="small" for="message">Message:</label>
                                        <textarea required class="form-control" rows="5" id="message" name="message"  maxlength="140" placeholder="Type your message content here"></textarea>
                                        <div id="characterLeft">140 characters left</div>
                                    </div>

                                     <div class="pull-right">
                                        <button type="button" class="btn btn-success m-r-5"><span>Save as Draft </span><i class="fa fa-floppy-o"></i></button>
                                        <button type="button" class="btn btn-danger m-r-5"><i class="fa fa-trash-o"></i></button>
                                        <button id="btnSubmit" type="submit" class="btn btn-purple"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
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
        
        $(".select2").select2({
                    width: '100%'
        });

        $('#message').keyup(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
        });

                
@endsection