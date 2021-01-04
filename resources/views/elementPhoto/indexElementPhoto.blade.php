@extends('layouts.app')

<style type="text/css">
    
    #images img {
        width: 300px;
        height: 160px;
        margin-right: 10px;
    }
    
    #images audio {
        width: 300px;        
        margin-bottom: 10px;
        margin-right: 10px;
    }
    
    #images video {
        width: 300px;
        height: 160px;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    
    #images button {
        width: 300px;
        margin-top: 0px;
        margin-bottom: 15px;
    }
    
</style>

@section('content')

<div class="container">
    <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
        <button onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></button>
    </nav>
</div>

<div class="container">
    <!----- css link for light box --------->
<link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">

    <!--------------- Cart column start ------------------------------->
    <div class="row">        
        @if($elementPhotos)
            @foreach($elementPhotos as $elementPhoto)
            <div class="col-md-4">
                    <div id='images' style="inline-box-align: inherit"> 
                        @if($elementPhoto->file_mime=="image/jpg" || $elementPhoto->file_mime=="image/png" || $elementPhoto->file_mime=="image/jpeg")             
                        <a href="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}" data-lightbox="roadtrip" >
                            <img src="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}" class="img-fluid" alt="Responsive image">
                        </a>
                        @elseif($elementPhoto->file_mime=="audio/mpeg" || $elementPhoto->file_mime=="audio/x-m4a")
                            <audio controls="controls" src="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}">
                                  Your browser does not support the HTML5 Audio element.
                            </audio>    
                        </a>
                        @elseif($elementPhoto->file_mime=="video/mp4" || $elementPhoto->file_mime=="video/x-matroska" || $elementPhoto->file_mime=="video/webm")
                            <video controls="controls">
                                <source src="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif   
                        <p>{{date_format($elementPhoto->updated_at, 'd/m/Y')}}</p>                                   
                    </div>
                </div>   
            @endforeach
        @endif
    </div>        
    <!--------------------- End Cart column ----------------------------------->
<!--- script for lightBox ----->
<script src="{{ asset('js/lightbox.js') }}"></script>
</div>

@endsection