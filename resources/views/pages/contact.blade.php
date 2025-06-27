@extends('layouts.app')

@section('content')

<div>
    <br><br><br><br><br><br><br><br><br>
</div>

<section id="formulaire-contact" style="padding: 40px 0;">

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="text-primary">Contactez-nous</h2>
                    <p id="sous-titre-formulaire">Nous sommes à votre écoute. Veuillez remplir le formulaire ci-dessous pour nous envoyer votre message.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <form id="form-contact" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group" id="nom-groupe">
                            <label for="nom-utilisateur" id="label-nom">Nom :</label>
                            <input type="text" class="form-control" id="nom-utilisateur" name="nom" required value="{{ old('nom') }}">
                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="email-groupe">
                            <label for="email-utilisateur" id="label-email">Email :</label>
                            <input type="email" class="form-control" id="email-utilisateur" name="email" required value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="sujet-groupe">
                            <label for="sujet-utilisateur" id="label-sujet">Sujet :</label>
                            <input type="text" class="form-control" id="sujet-utilisateur" name="sujet" required value="{{ old('sujet') }}">
                            @error('sujet')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="message-groupe">
                            <label for="message-utilisateur" id="label-message">Message :</label>
                            <textarea class="form-control" id="message-utilisateur" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success" id="btn-envoi">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
</section>

    <div>
        <br><br><br><br><br><br><br><br><br><br><br>
    </div>

@endsection
