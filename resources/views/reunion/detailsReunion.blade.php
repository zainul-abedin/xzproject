@extends('layouts.app')

@section('content')
<div class="container">
         <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
            <a class="navbar-brand" href="{{ url()->previous() }}" style="font-size: 30px;"><i class="fas fa-arrow-left"></i></a>
            <a href="{{ route('reunion.edit', $reunion->id) }}" target="_blank" style="font-size: 30px"><i class="fas fa-edit"></i></a>
         </nav>
   
    <div class="media">
        <i class="fas fa-heading" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->title }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-map-marker-alt" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->chantier->location->chantier_adresse->adresse }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">


    @if($reunion->allDay == 0)
        @if((date('d/m/yy', strtotime($reunion->start)))==(date('d/m/yy', strtotime($reunion->end))))
            <div class="media">
                <i class="fas fa-clock" style="font-size: 18px"></i>
                <div class="media-body">
                    <h5 class="mt-0"><span class="ml-2">{{ date('d/m/yy H:i', strtotime($reunion->start)).' ' }} - {{ ' '.date('H:i', strtotime($reunion->end)) }}</span></h5>
                </div>
            </div>
            <hr class="hr-spaceing-0">
        @else
            <div class="media">
                <i class="fas fa-clock" style="font-size: 18px"></i>
                <div class="media-body">
                    <h5 class="mt-0"><span class="ml-2">{{ date('d/m/yy H:i', strtotime($reunion->start)).' ' }} - {{ ' '.date('d/m/yy H:i', strtotime($reunion->end)) }}</span></h5>
                </div>
            </div>
            <hr class="hr-spaceing-0">
        @endif
    @endif    


    @if($reunion->allDay == 1)
        <div class="media">
            <i class="fas fa-clock" style="font-size: 18px"></i>
            <div class="media-body">
                <h5 class="mt-0"><span class="ml-2">All day</span></h5>
            </div>
        </div>
        <hr class="hr-spaceing-0">
    @endif



    @if($reunion->statut === 0)
        <div class="media">
            <i class="fas fa-info-circle" style="font-size: 18px"></i>
            <div class="media-body">
                <h5 class="mt-0"><span class="ml-2">Réunion n'est pas terminée</span></h5>
            </div>
        </div>
        <hr class="hr-spaceing-0">
    @elseif($reunion->statut === 1)
        <div class="media">
            <i class="fas fa-info-circle" style="font-size: 18px"></i>
            <div class="media-body">
                <h5 class="mt-0"><span class="ml-2">Réunion terminée</span></h5>
            </div>
        </div>
        <hr class="hr-spaceing-0">
    @endif


    <div class="media">
        <i class="fas fa-feather" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->description }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media" style="margin-bottom: 8px">
        <i class="fas fa-paperclip" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2"></span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">
    
    <div class="media">
        <i class="fas fa-clock" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2"></span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-user-cog" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2">{{ $reunion->createur }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

</div>
@endsection
