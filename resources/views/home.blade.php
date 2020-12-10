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

    <!-- Display error massage's start ------->
    @section('message')
        @include('partials._message')
    @endsection
    <!-- Display error massage's end ------->

    @section('content')
    <button class="btn btn-primary btn-block">Réunion aujourd`hui</button>
    <div class="alert alert-primary" id="#" role="alert">
        @foreach($all_reunion_aujourdhui->take(3) as $reunion_aujourdhui )
            <a href="{{ route('reunion.details', $reunion_aujourdhui->id) }}">
                {{ date('H:i', strtotime($reunion_aujourdhui->start)).' ' }} 
                - {{ date('H:i', strtotime($reunion_aujourdhui->end)).' ' }}
                |{{' '. $reunion_aujourdhui->chantier->location->chantier_adresse->adresse }}
            </a>
            <hr class="hr-spaceing-0">            
        @endforeach        
        <a data-toggle="modal" data-target="#ReunionAujourdhui" type="button" class="btn btn-outline-info btn-sm" style="padding-top: 2px; margin-top: 7px; color: black;">More....</a>
    </div>
    
    <button class="btn btn-primary btn-block">La réunion n'est pas terminée</button>
    <div class="alert alert-primary" id="#" role="alert">
        @foreach($all_reunion_pas_terminee->take(3) as $reunion_pas_terminee)
            <a href="{{ route('reunion.details', $reunion_pas_terminee->id) }}">
                @if((date('d/m/yy', strtotime($reunion_pas_terminee->start)))==(date('d/m/yy', strtotime($reunion_pas_terminee->end))))
                {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->start)).' ' }} - {{ date('H:i', strtotime($reunion_pas_terminee->end)).' ' }} 
                @else
                {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->start)).' ' }} - {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->end)).' ' }}                
                @endif
                |
                {{ ' '.$reunion_pas_terminee->chantier->location->chantier_adresse->adresse }}
                @if($reunion_pas_terminee->chantier->location->batiment)
                {{'/ Bat : '.$reunion_pas_terminee->chantier->location->batiment}}
                @endif
                @if($reunion_pas_terminee->chantier->location->escalier)
                    {{'/ Esc : '.$reunion_pas_terminee->chantier->location->escalier}}
                @endif
                @if($reunion_pas_terminee->chantier->location->etage)
                    {{'/ Eta : '.$reunion_pas_terminee->chantier->location->etage}}
                @endif
                @if($reunion_pas_terminee->chantier->location->porte)
                    {{'/ Por : '.$reunion_pas_terminee->chantier->location->porte}}
                @endif
            </a>            
            <hr class="hr-spaceing-0">
        @endforeach        
        <a data-toggle="modal" data-target="#ReunionPasTerminee" type="button" class="btn btn-outline-info btn-sm" style="padding-top: 2px; margin-top: 7px; color: black;" >More....</a>
    </div>
    
    <a href="{{route('reunion.index')}}" type="button" class="btn btn-primary  btn-block" >Mes réunion</a>
    <a href="{{ route('chantier.index') }}" type="button" class="btn btn-primary btn-block">Mes chantiers</a>
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
            <a href="{{ route('reunion.details', $reunion_aujourdhui->id) }}">
                {{ date('H:i', strtotime($reunion_aujourdhui->start)).' ' }}
                - {{ date('H:i', strtotime($reunion_aujourdhui->end)).' ' }}
                |{{' '. $reunion_aujourdhui->chantier->location->chantier_adresse->adresse }}
            </a>
            <hr class="hr-spaceing-0">            
        @endforeach 
      </div>
    </div>
  </div>
</div>

<!---------------- Reunion details start--------------------------------->        
<div id="reunionDetails">
    <div id="dialog-body">
        <!-- 
        reunion details come by ajax
        from reunion details 
        -->
    </div>
</div>        
<!----------------Reunion details end ----------------------------------->

<!-- Modal for La réunion n'est pas terminée -->
<div class="modal fade" id="ReunionPasTerminee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="staticBackdropLabel">La réunion n'est pas terminée</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($all_reunion_pas_terminee as $reunion_pas_terminee)
            <a href="{{ route('reunion.details', $reunion_pas_terminee->id) }}">
                @if((date('d/m/yy', strtotime($reunion_pas_terminee->start)))==(date('d/m/yy', strtotime($reunion_pas_terminee->end))))
                {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->start)).' ' }} - {{ date('H:i', strtotime($reunion_pas_terminee->end)).' ' }} 
                @else
                {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->start)).' ' }} - {{ date('d/m/yy H:i', strtotime($reunion_pas_terminee->end)).' ' }}                
                @endif
                |
                {{' '.$reunion_pas_terminee->chantier->location->chantier_adresse->adresse }}
            </a>            
            <hr class="hr-spaceing-0">
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection