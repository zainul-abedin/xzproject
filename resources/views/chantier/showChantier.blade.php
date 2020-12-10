@extends('layouts.app')

@section('content')

<br/>
<div class="container">
    <!------- navbar start -------->
    <nav class="navbar navbar-light shadow-sm" style="background-color: #E9E9E9; margin-bottom: 10px">
        <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 34px"><i class="fas fa-home"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Edit Chantier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Edit Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Edit Adresse</a>
                </li>               
            </ul>
        </div>
    </nav> 
    <!------- navbar end --------->
    
    <!--------- show Chantier start ------->
    <br/>
    
    <div class="media">
        <i class="fas fa-map-marker-alt" style="font-size: 18px;"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $chantier->location->chantier_adresse->adresse }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">
    
    <div class="media">
        <i class="fas fa-building" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0">
                <span class="ml-2">
                    @if($chantier->location->batiment)
                            {{'Bat : '.$chantier->location->batiment}}
                    @endif
                    @if($chantier->location->escalier)
                        {{'/ Esc : '.$chantier->location->escalier}}
                    @endif
                    @if($chantier->location->etage)
                        {{'/ Eta : '.$chantier->location->etage}}
                    @endif
                    @if($chantier->location->porte)
                        {{'/ Por : '.$chantier->location->porte}}
                    @endif 
                </span>
            </h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-hourglass-start" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $chantier->urgence }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">
    
    <div class="media">
        <i class="fas fa-project-diagram" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $chantier->travaux_type }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">
    
    <div class="media">
        <i class="fas fa-tools" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $chantier->categorie }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">
    
    <div class="media">
        <i class="fas fa-sticky-note" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $chantier->demande_objact }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">
    
    <div class="media">
        <i class="fas fa-clock" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ date('d/m/yy', strtotime($chantier->created_at)) }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">
    
    <div class="media">
        <i class="fas fa-user-cog" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $chantier->createur }}</span></h5>
        </div>
    </div>
    
    <!--------- show Chantier end --------->
    
    
</div>

