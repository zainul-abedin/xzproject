@extends('layouts.app')
<style>
    #reunionDetails {
        display: none;
    }
</style>
<div class="container" style="margin-top: 10px">
    @section('navbar')
    @include('partials._home-navbar')
    @endsection

    @section('content')
    
    <!-- Display error massage's start ------->
    @include('partials._message')
    <!-- Display error massage's end ------->

    <!-------------------------------------------------------------------------->
    
    
    <div id="carouselExampleIndicators" class="carousel slide" data-interval="false" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
           
        </ol>
        <div class="carousel-inner">
            
            <div class="carousel-item">
                <div class="card shadow-sm p-2 mb-3 bg-white rounded" style="height: 24rem;">
                    <div class="card-header">
                        Reunions pas terminee
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($all_reunion_pas_terminee->take(3) as $reunion_pas_terminee)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-12 text-truncate">
                                        <a reunion_id ="{{$reunion_pas_terminee->id}}" style="font-size: 0.90rem">
                                            {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->start)).' ' }}
                                            |
                                            {{' '.$reunion_pas_terminee->title}}
                                        </a>  
                                    </div>
                                </div> 
                            </li>
                        @endforeach
                    </ul>
                    
                    @if(count($all_reunion_pas_terminee)>3)
                    <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a data-toggle="modal" data-target="#ReunionPasTerminee">Plus....</a>
                            </div>
                        </div>
                    @endif
                    <div class="card-header" style="margin-top: 8px;">
                        Reunions terminee
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($all_reunion_terminee->take(3) as $reunion_terminee)
                            <li class="list-group-item">
                            <div class="row">
                                <div class="col-12 text-truncate">
                                    <a reunion_id ="{{$reunion_terminee->id}}" style="font-size: 0.90rem">
                                        {{ date('d/m/yy H:i', strtotime($reunion_terminee->start)).' ' }}
                                        |
                                        {{' '.$reunion_terminee->title}}
                                    </a> 
                                </div>
                            </div>
                                   
                            </li>
                        @endforeach
                    </ul>
                    @if(count($all_reunion_terminee)>3)
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a data-toggle="modal" data-target="#ReunionTerminee" >Plus....</a>
                            </div>
                        </div>
                    @endif
                </div>
                
            </div>
            
            <div class="carousel-item active">
                <div class="card shadow-sm p-2 mb-3 bg-white rounded" style="height: 24rem;">
                    <div class="card-header">
                        Réunion aujourd`hui
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($all_reunion_aujourdhui->take(8) as $reunion_aujourdhui )
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-12 text-truncate">
                                    <a reunion_id ="{{$reunion_aujourdhui->id}}" style="font-size: 0.90rem">
                                        {{ date('H:i', strtotime($reunion_aujourdhui->start)).' ' }} 
                                        |{{' '. $reunion_aujourdhui->title }}
                                    </a>
                                </div>
                            </div>
                            
                        </li>                        
                        @endforeach
                        
                    </ul>
                    
                    @if(count($all_reunion_aujourdhui)>8)
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a data-toggle="modal" data-target="#ReunionAujourdhui" >Plus....</a>
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
            <div class="carousel-item">
                <div class="card shadow-sm p-2 mb-3 bg-white rounded" style="height: 24rem;">
                    <div class="card-header">
                        Réunions futures
                    </div>
                    <ul class="list-group list-group-flush">
                        
                        @foreach($all_reunion_futures->take(8) as $reunion_futures)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-12 text-truncate">
                                    <a  reunion_id ="{{$reunion_futures->id}}" style="font-size: 0.90rem">                                        

                                        {{ date('d/m/yy H:i', strtotime($reunion_futures->start)).' ' }}
                                        |
                                        {{' '.$reunion_futures->title}}
                                       
                                    </a>
                                    
                                </div>
                            </div>
                            
                        </li>
                        @endforeach
                    </ul>
                    @if(count($all_reunion_futures)>8)
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a data-toggle="modal" data-target="#ReunionFutures" >Plus....</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="fa fa-chevron-left fa-lg" style="color:red;"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="fa fa-chevron-right fa-lg" style="color:red;"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <!-------------------------------------------------------------------------->
   
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <a href="{{route('reunion.index')}}" type="button" class="btn btn-outline-secondary">Mes réunion</a>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="Second group">
          <a href="{{ route('chantier.index') }}" type="button" class="btn btn-outline-secondary">Mes chantiers</a>
        </div>        
    </div>
     
</div> 


<!-- Modal for  reunion futures -->
<div class="modal fade" id="ReunionFutures" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Réunion futures</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($all_reunion_futures as $reunion_futures)
                <a reunion_id ="{{$reunion_futures->id}}" style="font-size: 0.90rem">
                    
                    {{ date('d/m/yy H:i', strtotime($reunion_futures->start)).' ' }} 
                    |
                    {{' '.$reunion_futures->chantier->location->chantier_adresse->adresse }}
                </a>            
                <hr class="hr-spaceing-0">
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Modal for Réunion aujourd`hui -->
<div class="modal fade" id="ReunionAujourdhui" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Réunion aujourd`hui</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($all_reunion_aujourdhui as $reunion_aujourdhui )
                <a reunion_id ="{{$reunion_aujourdhui->id}}" style="font-size: 0.90rem">
                    {{ date('H:i', strtotime($reunion_aujourdhui->start)).' ' }}
                    |{{' '. $reunion_aujourdhui->title}}
                </a>
                <hr class="hr-spaceing-0">            
                @endforeach 
            </div>
        </div>
    </div>
</div>


<!-- Modal for La réunion n'est pas terminée -->
<div class="modal fade" id="ReunionPasTerminee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Réunions n'est pas terminée</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($all_reunion_pas_terminee as $reunion_pas_terminee)
                <a reunion_id ="{{$reunion_pas_terminee->id}}" style="font-size: 0.90rem">
                    
                    {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->start)).' ' }}                   
                    |
                    {{' '.$reunion_pas_terminee->chantier->location->chantier_adresse->adresse }}
                </a>            
                <hr class="hr-spaceing-0">
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Modal for Réunions terminée -->
<div class="modal fade" id="ReunionTerminee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">Réunions terminée</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($all_reunion_terminee as $reunion_terminee)
                <a reunion_id ="{{$reunion_terminee->id}}" style="font-size: 0.90rem">
                    {{ date('d/m/yy H:i', strtotime($reunion_terminee->start)).' ' }}
                    |
                    {{' '.$reunion_terminee->chantier->location->chantier_adresse->adresse }}
                </a>            
                <hr class="hr-spaceing-0">
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- reunionDetails Modal -->
<div id="reunionDetails" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', 'a[reunion_id]', function (e) {
            
            var reunion_id = $(this).attr('reunion_id');
            var url = '{{ route("reunion.show", ":id") }}';
                url = url.replace(":id", reunion_id);

                $.ajax({

                    url: url,
                    type: 'GET',
                    success: function (response) {

                        $('#reunionDetails .modal-content').html(response);
                        $('#reunionDetails').modal('show');
                    }
                });
        }); 
    });
    
</script>

@endsection