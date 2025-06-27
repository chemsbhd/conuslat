@extends('layouts.app')

@section('content')

<style>

    .form-control {
        width: 100%;
        max-width: 100%;
    }

</style>

<!-- Message de confirmation -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


{{-- Dans visa-request.blade.php --}}
@if($status === \App\Models\VisaRequest::STATUS_ENCOURS)

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
    <p>Votre demande est en cours de traitement.</p>

@else
 

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>


<div class="container">
    <h2>Demande de Visa</h2>
    <form method="POST" action="{{ route('visa.request.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}" required>
            @error('surname') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
            @error('birthdate') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="nationality" class="form-label">Nationalité</label>
            <select id="nationality" name="nationality" class="form-control @error('nationality') is-invalid @enderror" required>
                <option value="">{{ __('Choisissez votre nationalité') }}</option>
                @foreach($nationalities as $code => $nationality)
                    <option value="{{ $code }}">{{ $nationality }}</option>
                @endforeach
            </select>
            @error('nationality')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>               
        <div class="mb-3">
            <label for="passport_number" class="form-label">Numéro de Passeport</label>
            <input type="text" class="form-control" id="passport_number" name="passport_number" value="{{ old('passport_number') }}" required>
            @error('passport_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="passport_expiry" class="form-label">Date d'Expiration du Passeport</label>
            <input type="date" class="form-control" id="passport_expiry" name="passport_expiry" value="{{ old('passport_expiry') }}" required>
            @error('passport_expiry') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="passport_image" class="form-label">Image du Passeport</label>
            <input type="file" class="form-control" id="passport_image" name="passport_image" accept=".jpg,.jpeg,.png" required>
            @error('passport_image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="card_number" class="form-label">Numéro de Carte Bancaire</label>
            <input type="text" class="form-control" id="card_number" name="card_number" value="{{ old('card_number') }}" required>
            @error('card_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="card_expiry" class="form-label">Date d'Expiration de la Carte (MM/AA)</label>
            <input type="text" class="form-control" id="card_expiry" name="card_expiry" placeholder="MM/AA" value="{{ old('card_expiry') }}" required>
            @error('card_expiry') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="card_cvc" class="form-label">Code à 3 Chiffres</label>
            <input type="text" class="form-control" id="card_cvc" name="card_cvc" value="{{ old('card_cvc') }}" required>
            @error('card_cvc') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        @if($errors->any())

        <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Soumettre la Demande</button>
    </form>
</div>

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
@endif

<div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
@endsection
