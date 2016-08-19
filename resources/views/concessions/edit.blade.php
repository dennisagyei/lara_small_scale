@extends('layouts.master')


@section('title')
Edit Concession
@endsection
        
@section('heading')
    <style type="text/css">
        .input-group-addon {
            min-width:200px;
            text-align:left;
        }
    </style>

@endsection

@section('content')
<div class="wraper container-fluid">

        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/concessions') }}">Concessions</a></li>
            <li class="active">Edit</li>
        </ol>


    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-color panel-inverse">
                <div class="panel-heading"><h3 class="panel-title">Edit Concession</h3></div>
                    <div class="panel-body">
                        <form id="concession_form" class="form-horizontal" role="form" method="POST" action="/concessions/{{ $concession->_id }}/update">
                         {{ method_field('PATCH') }}

                            {{ csrf_field() }}

                            <div class="form-group input-group">
                                <span class="input-group-addon">Concession Owner</span>
                                <select class="form-control" name="member_id" >
                                @foreach($members as $member)
                                    <option  {{ $concession->member_id == $member->_id ? 'selected' : '' }} value="{{ $member->_id }}">{{ $member->company }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">Size</span>
                                <input type="text" name="size" class="form-control" value="{{ $concession->size }}" required>
                            </div>
                            
                            <div class="form-group input-group">
                                <span class="input-group-addon">Locaton</span>
                                <textarea class="form-control" rows="3" name="location">{{ $concession->location }}</textarea>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">Zone</span>
                                <input type="text" name="zone" class="form-control" value="{{ $concession->zone }}" required>
                            </div>
                    
                            <div class="form-group input-group">
                                <span class="input-group-addon">Concession Status</span>
                                <select class="form-control" name="status" >
                                <option {{ $concession->status == 'Virgin' ? 'selected' : '' }}>Virgin</option>
                                <option {{ $concession->status == 'Operational' ? 'selected' : '' }}>Operational </option>
                                <option {{ $concession->status == 'Utilized' ? 'selected' : '' }}>Utilized</option>
                                <option {{ $concession->status == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">Management Type</span>
                                <select class="form-control" name="owner_type" >
                                    <option {{ $concession->owner_type == 'Foreign' ? 'selected' : '' }}>Foreign</option>
                                    <option {{ $concession->owner_type == 'Local' ? 'selected' : '' }}>Local</option>
                                    <option {{ $concession->owner_type == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-btn">
                                <button type="button" id="reset" class="btn btn-effect-ripple btn-primary">Click to Reset Map</button>
                                </span>
                                <input type="text" class="form-control" placeholder="Left click on the map to create markers, when last marker meets first marker, it create a complete mapping area." readonly>
                            </div>
                            
                            <div class="form-group" id="main-map" style="height: 400px;"></div>
                            <input type="hidden" name="map_coords" id="map-coords" value=""/>

                    <a href="{{ url('/concessions/confirm/'.$concession->_id) }}" class="btn btn-danger pull-left">Delete</a>

                     <div class="pull-right">
                        <a href="{{ url('/concessions') }}" class="btn btn-inverse pull-left"> Cancel</a>
                        <button type="submit"  class="btn btn-success pull-right"> Save</button>
                    </div>
                </form>
                    </div>
            </div>
        </div>       
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC9H_SZmYKPM0TXnnnHxcRPMJyYjf00rvs"></script>
<script type="text/javascript" src="/js/polygon(1.0).min.js"></script>

@endsection


@section('jquery')

 //create map
         var GhanaCenter=new google.maps.LatLng(6.879714, -1.723929);
         var myOptions = {
            zoom: 7,
            center: GhanaCenter,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
         map = new google.maps.Map(document.getElementById('main-map'), myOptions);
         
          // attached a polygon creator drawer to the map
         var creator = new PolygonCreator(map);
 
         // reset button
         $('#reset').click(function(){
                creator.destroy();
                creator=null;              
                creator=new PolygonCreator(map);  
                polygon.setMap(null);             
         });   
 
         // set polygon data to the form hidden field
         $('#concession_form').submit(function () {
            $('#map-coords').val(creator.showData());
         });
         
         // create
         var polygonCoords = [
        @foreach($coords as $coord)
            new google.maps.LatLng({{$coord}}),       
        @endforeach
        ];
 
         // construct the polygon
         polygon = new google.maps.Polygon({
                               paths: polygonCoords,
                               strokeColor: "#FF0000",
                               strokeOpacity: 0.8,
                               strokeWeight: 2,
                               fillColor: "#FF0000",
                               fillOpacity: 0.35
         });
 
         // show polygon on the map
         polygon.setMap(map);
@endsection