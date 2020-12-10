@extends('layouts.app')

@section('navbar')
<div class="container">
</div>
@endsection
<!-- Modal -->


<!---------- set url for get data by Ajax request ---------------------------
<div id='allContact' data-url ='{{url("allContact")}}'></div>
---------- set url for get data by Ajax request end ----------------------->  

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
    
</div>

<div class="container">
    <form action="{{ route('contact.store') }}" method="POST" id="addContactForm">
        @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Titre</label>
                </div>
                <select class="custom-select" name="title" id="inputGroupSelect01" required="1">
                    <option></option>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                    <option value="Monsieur et Madame">Monsieur et Madame</option>
                    <option value="Indivision">Indivision</option>
                    <option value="Société">Société</option>
                    <option value="SCI">SCI</option>
                    <option value="Agence">Agence</option>
                    <option value="Succession">Succession</option>
                    <option value="SDC">SDC</option>
                    <option value="Association">Association</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="prenom" placeholder="Prénom" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="nom" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="nom_de_societe" placeholder="Nom de société" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" name="telephone_portable" placeholder="Téléphone portable" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" name="telephone_domicile" placeholder="Téléphone domicile" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" name="telephone_bureau" placeholder="Téléphone bureau" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" name="autre_telephone" placeholder="Autre Téléphone" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control" name="mail_professionnel" placeholder="Mail Professionnel" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control" name="mail_personnel" placeholder="Mail personnel" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-binoculars"></i></span>
                </div>
                <input type="text" class="form-control" name="observation" placeholder="Observation" aria-label="Username" aria-describedby="basic-addon1">
            </div>


            <div>
                <button type="submit" class="btn btn-primary btn-md btn-block">Save</button>
            </div>

    </form>
</div>
@endsection

<!--------------------- Add contact end --------------------------------->
