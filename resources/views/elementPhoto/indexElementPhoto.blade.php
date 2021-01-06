@extends('layouts.app')

@section('content')

<div class="container">
    <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
        <button onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></button>
        <!--
        <button onclick="self.close()" style="font-size: 30px"><i class="fas fa-times"></i></button>
        -->
    </nav>
</div>

<link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
<div class="album py-2">
    <div class="container">
        
        <!-- Display error massage's start ------->    
        @include('partials._message')
        <!-- Display error massage's end -------> 
        
        <div class="row">

            @if($elementPhotos)
            @foreach($elementPhotos as $elementPhoto) 
            
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">

                    @if($elementPhoto->file_mime=="image/jpg" || $elementPhoto->file_mime=="image/png" || $elementPhoto->file_mime=="image/jpeg")             
                    <a href="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}" data-lightbox="roadtrip" >
                        <img class="card-img-top" src="{{asset('photos/elementPhotos/elementThumbnails/'.$elementPhoto->file_name)}}" alt="Responsive image">
                    </a>
                    
                    @elseif($elementPhoto->file_mime=="application/pdf")    
                    <a href="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}">
                        <embed class="card-img-top" type="application/pdf" src="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}" alt="Responsive image"></embed>
                    </a>  

                    @elseif($elementPhoto->file_mime=="audio/mpeg" || $elementPhoto->file_mime=="audio/x-m4a")
                    <audio class="card-img-top" controls="controls" src="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}">
                        Your browser does not support the HTML5 Audio element.
                    </audio>    
                    @elseif($elementPhoto->file_mime=="video/mp4" || $elementPhoto->file_mime=="video/x-matroska" || $elementPhoto->file_mime=="video/webm")
                    <video class="card-img-top" controls="controls">
                        <source src="{{asset('photos/elementPhotos/'.$elementPhoto->file_name)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @endif
                    
                    
                    <div class="card-body">

                        @if($elementPhoto->photo_type)  
                        <h5 class="card-title">{{ $elementPhoto->photo_type }}</h5>
                        @endif

                        @if($elementPhoto->description)
                        <p class="card-text">{{ $elementPhoto->description }}</p>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                
                                <form action="{{ route('elementPhotos.destroy', $elementPhoto->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" aria-hidden="true" style="font-size:22px; margin-bottom: -16px; color: red; background-color: white;"><i class="far fa-trash-alt"></i></button>
                                </form>
                                <a href="{{ route('elementPhotos.edit', $elementPhoto->id, 'edit') }}" type="button" aria-hidden="true" style="font-size:22px; margin-bottom: -5px; color: green; background-color: white;"><i class="far fa-edit"></i></a>
                                <!--
                                <button type="button" aria-hidden="true" style="font-size:22px; margin-bottom: -5px; color: blue; background-color: white;"><i class="far fa-eye"></i></button>
                                -->
                            </div>
                            <small class="text-muted">{{date_format($elementPhoto->updated_at, 'd/m/Y')}}</small>
                        </div>

                    </div>
                    

                </div>

            </div>
            @endforeach
            @endif            
        </div>
    </div>
</div>

<!--- script for lightBox ----->
<script src="{{ asset('js/lightbox.js') }}"></script>

@endsection