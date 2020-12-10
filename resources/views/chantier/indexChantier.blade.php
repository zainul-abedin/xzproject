@extends('layouts.app')

@section('content')

<div class="container">
    <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
        <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 34px"><i class="fas fa-home"></i></a>
        <button class="btn btn-light ml-auto mr-1" data-toggle="modal" data-target="#allReunionList" style="font-size: 30px; background-color: #E9E9E9"><i class="fas fa-list"></i></button>
    </nav> 
    
    <!-- Display error massage's start ------->    
    @if($errors->any())
    <div class="alert alert-danger">
        @if($errors->count()===1)
        {{ $errors->first() }}
        @else
        <lu>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </lu>
        @endif
    </div>
    @endif

    @if(session()->has('message'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('message') }}
    </div>
    @endif
    <!-- Display error massage's end ------->  
    
    <table id="chantierTable">
        <thead>
            <tr>
                <th>Adresses</th>
                <th>Locations</th>
                <th>Commencé</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chantiers as $chantier)
            <tr>
                <td>
                    <a href="{{ route('chantier.show', $chantier->id) }}">
                        {{ $chantier->location->chantier_adresse->adresse }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('chantier.show', $chantier->id) }}">
                        @if($chantier->location->batiment)
                            {{' Bat : '.$chantier->location->batiment.'/'}}
                        @endif
                        @if($chantier->location->escalier)
                            {{' Esc : '.$chantier->location->escalier.'/'}}
                        @endif
                        @if($chantier->location->etage)
                            {{' Eta : '.$chantier->location->etage.'/'}}
                        @endif
                        @if($chantier->location->porte)
                            {{' Por : '.$chantier->location->porte.'/'}}
                        @endif 
                    </a>
                </td>
                <td>
                    <a href="{{ route('chantier.show', $chantier->id) }}">
                        {{date('d/m/yy', strtotime($chantier->created_at)) }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</div>

<script>
    /*-------- script for datatable start ----------------------------*/ 
    $(document).ready( function () {
        $('#chantierTable').DataTable({
            "language": {
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Rien trouvé - désolé",
                "info": "Affichage de la page _PAGE_ de _PAGES_",
                "infoEmpty": "Aucun enregistrement disponible",
                "infoFiltered": "(filtré de _MAX_ enregistrements totaux)",
                "search": "Chercher:"
            }
        });
    } );
    
    /*-------- script for datatable start ----------------------------*/
</script>

@endsection
