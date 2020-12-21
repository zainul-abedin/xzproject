@extends('layouts.app')

@section('content')

<br/>
<div class="container">
    <!------- navbar start -------->
    <nav class="navbar navbar-light shadow-sm" style="background-color: #E9E9E9; margin-bottom: 10px">
        <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 34px"><i class="fas fa-home"></i></a>
        <!--
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        -->
        <!--
        <div class="collapse navbar-collapse" id="navbarSupportedContent">           
            <ul class="navbar-nav ml-auto">
                                              
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
        -->
    </nav> 
    <!------- navbar end --------->

    <!--------- show Chantier start ------->
    <br/>

    <div class="media">
        <i class="fas fa-map-marker-alt" style="font-size: 18px;"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2 small">{{ $chantier->location->chantier_adresse->adresse }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-building" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0">
                <span class="ml-2 small">
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
            <h5 class="mt-0"><span class="ml-2 small">{{ $chantier->urgence }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-project-diagram" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2 small">{{ $chantier->travaux_type }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-tools" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2 small">{{ $chantier->categorie }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-sticky-note" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2 small">{{ $chantier->demande_objact }}</span></h5>
        </div>
    </div>
    <hr class="hr-spaceing-0">

    <div class="media">
        <i class="fas fa-clock" style="font-size: 18px"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2 small">{{ date('d/m/yy', strtotime($chantier->created_at)) }}</span></h5>
        </div>
    </div>   
    <hr class="hr-spaceing-0">

    <!--
    <div class="media">
        <a class="pr-3" data-toggle="modal" data-target="#createChantierResponsable" style="font-size: 18px;">
            <i class="fas fa-user-plus"></i>
        </a>
        <div class="media-body">
            <h5 class="mt-0"><span class="small">Responsables</span></h5>

            <div class="media mt-3">
                <a class="pr-3" data-toggle="modal" data-target="#showChantierResponsable" style="font-size: 18px;">
                    <i class="fas fa-user-shield"></i>
                </a>
                <div class="media-body">
                    <h5 class="mt-0"><span class="small">Zainul</span></h5>
                </div>
            </div>
        </div>
    </div>

    <hr class="hr-spaceing-0">

    <div class="media">
        <a class="pr-3" data-toggle="modal" data-target="#createChantierContact" style="font-size: 18px;">
            <i class="fas fa-user-plus"></i>
        </a>
        <div class="media-body">
            <h5 class="mt-0"><span class="small">Contacts</span></h5>

            <div class="media mt-3">
                <a class="pr-3" data-toggle="modal" data-target="#showChantierContact" style="font-size: 18px;">
                    <i class="fas fa-user"></i>
                </a>
                <div class="media-body">
                    <h5 class="mt-0"><span class="small">Zainul</span></h5>
                </div>
            </div>
            <div class="media mt-3">
                <a class="pr-3" data-toggle="modal" data-target="#showChantierContact" style="font-size: 18px;">
                    <i class="fas fa-user"></i>
                </a>
                <div class="media-body">
                    <h5 class="mt-0"><span class="small">Xavier</span></h5>
                </div>
            </div>

        </div>
    </div>
    <hr class="hr-spaceing-0">
    -->
    <div class="media">
        <i class="fas fa-user-cog" style="font-size: 18px;"></i>
        <div class="media-body">
            <h5 class="mt-0"><span class="ml-2 small">{{ $chantier->createur }}</span></h5>
        </div>
    </div>

    <!--------- show Chantier end --------->

    <!-- Modal for create responsable for chantier-->
    <div class="modal fade" id="createChantierResponsable" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">Add Responsable for chantier</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="addResponsableForm">
                        @csrf
                        <div class="input-group mb-3">
                            <select class="form-control contact-id" name="contact_id" id="showAllResponsableHere">            
                                <option value="">sélectionnez un responsable</option>
                                @foreach($responsables as $responsable)
                                <option value="{{ $contact->id }}">
                                    @if(!empty($responsable->contact->nom) || !empty($responsable->contact->prenom))
                                    {{ strtoupper($responsable->contact->nom)." "."(".ucwords($responsable->contact->prenom).")" }}
                                    @else
                                    {{ $responsable->contact->title ." ". $responsable->contact->nom_de_societe}}
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-control statut" name='statut'>
                                <option value="">sélectionnez un statut</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>                   
                            </select>
                        </div>
                    </form>           
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for show chantier's responsable -->
    <div class="modal fade" id="showChantierResponsable" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">Responsable details</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for create contact for chantier-->
    <div class="modal fade" id="createChantierContact" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">Creat Contact</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for show contact of the chantier -->
    <div class="modal fade" id="showChantierContact" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">Contact details</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    
</div>

