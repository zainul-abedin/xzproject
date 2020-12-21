@extends('layouts.app')

@section('content')

<div class="container small">
    <nav class="navbar navbar-light" style="background-color: #E9E9E9; margin-bottom: 10px">
        <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 30px"><i class="fas fa-home"></i></a>
        <a class="btn btn-light" href="{{ route('chantier.create') }}" target="_blank"  style="font-size: 26px; background-color: #E9E9E9"><i class="fas fa-plus"></i></a>
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
    
    <table id="chantierTable" class="table table-striped table-bordered small">
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
                        {{ mb_strimwidth($chantier->location->chantier_adresse->adresse, 0, 35, "..") }}
                        
                    </a>
                </td>
                <td>
                    <a href="{{ route('chantier.show', $chantier->id) }}">
                        @if($chantier->location->etage)
                        {{' Eta : '.$chantier->location->etage.','}}
                        @endif
                        @if($chantier->location->porte)
                        {{' Por : '.$chantier->location->porte}}
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

<script>
    /*-------- script for datatable start ----------------------------*/
    $(document).ready(function () {    
        // DataTable
        var table = $('#chantierTable').DataTable({

        });
    });

    /*-------- script for datatable start ----------------------------*/
</script>

@endsection
