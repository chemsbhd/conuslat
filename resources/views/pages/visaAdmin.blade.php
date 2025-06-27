@extends('layouts.app')

@section('content')

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Passer de 8 à 12 pour élargir -->
            <div class="card">
                <strong><div class="card-header">{{ __('Gestion des demandes de visa') }}</div></strong>
                <br>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Élargissement de la table en utilisant width: 100% -->
                    <table class="table table-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 15%;">{{ __('Nom') }}</th>
                                <th style="width: 15%;">{{ __('Prénom') }}</th>
                                <th style="width: 15%;">{{ __('Nationalité') }}</th>
                                <th style="width: 10%;">{{ __('Validation') }}</th>
                                <th style="width: 45%;">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visaRequests as $visaRequest)
                                <tr>
                                    <td>{{ $visaRequest->name }}</td>
                                    <td>{{ $visaRequest->surname }}</td>
                                    <td>{{ $visaRequest->nationality }}</td>
                                    <td>
                                        @if($visaRequest->validation)
                                            {{ ucfirst($visaRequest->validation) }}
                                        @else
                                            {{ __('En attente') }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Actions">
                                            @if(is_null($visaRequest->validation))
                                                <!-- Formulaire pour accepter la demande -->
                                                <form action="{{ route('admin.visa.update', ['id' => $visaRequest->id, 'status' => 'oui']) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Accepter</button>
                                                </form>
                                    
                                                <!-- Formulaire pour refuser la demande -->
                                                <form action="{{ route('admin.visa.update', ['id' => $visaRequest->id, 'status' => 'non']) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Refuser</button>
                                                </form>
                                            @endif

                                            <!-- Si la demande est acceptée, permettre de télécharger le PDF du visa accepté -->
                                            @if($visaRequest->validation === 'oui')
                                                <a href="{{ route('admin.visa.accepted-pdf', $visaRequest->id) }}" class="btn btn-success">Télécharger Visa Accepté</a>
                                            @endif

                                            <!-- Lien pour télécharger le PDF standard -->
                                            <a href="{{ route('admin.visa.pdf', $visaRequest->id) }}" class="btn btn-info">PDF</a>
                                        </div>
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

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

@endsection
