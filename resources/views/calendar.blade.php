@extends('layouts.app')

@section('content')

        <!----------------------------------------------------------------------
        | ----------------------- My code stert --------------------------------
        |---------------------------------------------------------------------->    
        <div class="content">
            <div class="jumbotron">
                <h3 class="text-center">Working Schedule of DMI</h3>
            </div>
            <div class="container">
                @if(session()->has('message'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('message') }}
                </div>
                @endif
                <div id="calendar"></div>
            </div>
        </div>

        <!----------------------- day click dialog start ---------------------->
        <div id="dialog">
            <div id="dialog-body">
                <form id="dayClick" method="POST" action="{{ route('reunion.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Reunion title</label>
                        <input type="text" class="form-control" name="title" placeholder="Reunion title">
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                    </div>
                    <div class="form-group">
                        <label>Start date & time</label>
                        <input type="text" class="form-control" id="start" name="start" placeholder="Starsing date & time">
                    </div>
                    <div class="form-group">
                        <label>End date & time</label>
                        <input type="text" class="form-control" id="end" name="end" placeholder="End date & time">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="checkbox" value="1" name="allDay">All Day
                    </div>
                    <div class="form-group">
                        <label>Background color</label>
                        <input type="color" class="form-control" name="color">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Add Reunion</button>
                    </div>

                </form>
            </div>

        </div>
        <!----------------------- day click dialog end   ---------------------->
        
        <!---------------------- java script start ---------------------------->
        
        <script src="{{ asset('js/script.js') }}"></script>
        
        <!---------------------- java script start ---------------------------->

        <!----------------------------------------------------------------------
        | ----------------------- My code end --------------------------------
        |---------------------------------------------------------------------->    
@endsection