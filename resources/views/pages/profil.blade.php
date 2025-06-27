@extends('layouts.app')

@section('content')

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil') }}</div>
                <br>

                <div class="card-body">
                    <h2>{{ __('Bonjour ') }}{{ $user->prenom }} {{ $user->nom }}</h2>

                    <!-- Bouton pour commencer la demande de visa -->
                    <div class="mt-4">
                        <a href="/visa-request" class="btn btn-primary">
                            {{ __('Commencer demande de visa') }}
                        </a>
                    </div>
                    <br>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Affichage du message d'erreur -->
                    @error('visa_request')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <br><br><br><br><br>
                    <!-- Table of user's visa requests -->
                    <div class="mt-5">
                        <h4>{{ __('Vos demandes de visa') }}</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Date de demande') }}</th>
                                    <th>{{ __('Statut') }}</th>
                                    <th>{{ __('Validation') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visaRequests as $request)
                                    <tr>
                                        <td>{{ $request->created_at->format('d/m/Y') }}</td> <!-- Date of request -->
                                        <td>{{ $request->status ?? 'En attente' }}</td> <!-- Status -->
                                        <td>{{ $request->validation ? 'Oui' : ($request->validation === 'non' ? 'Non' : 'En attente') }}</td> <!-- Validation status -->
                                        <td>
                                            <!-- PDF boutton-->
                                            @if($request->status === 'encours' || $request->status === 'finalisée')
                                                <a href="{{ route('profil.visa-request.pdf', $request->id) }}" class="btn btn-info">PDF</a>
                                            @endif
                                            <!-- PDF boutton, shown only if the visa is accepted -->
                                            @if($request->validation === 'oui')
                                                <a href="{{ route('profil.visa.download', $request->id) }}" class="btn btn-info">Télécharger le Visa</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br>
</div>

@endsection
