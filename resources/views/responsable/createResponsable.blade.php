@extends('layouts.app')

@section('content')
    <!-- Display error massage's start ------->
    <div class="container">
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
        <div id="calendar"></div>
    </div>
    
    <div class="container">
        <form action="" method="POST" id="addResponsableForm">
            @csrf
            <div class="input-group mb-3">
                <select class="form-control contact-id" name="contact_id" id="showAllContactHere">            
                    <option value="">sélectionnez un contact</option>
                    @foreach($contacts as $contact)
                    <option value="{{ $contact->id }}">
                        @if(!empty($contact->nom) || !empty($contact->prenom))
                        {{ strtoupper($contact->nom)." "."(".ucwords($contact->prenom).")" }}
                        @else
                        {{ $contact->title ." ". $contact->nom_de_societe}}
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
@endsection