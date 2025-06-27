<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récapitulatif de la demande de visa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        h1 {
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Récapitulatif de la Demande de Visa</h1>

    <div class="section">
        <strong>Nom:</strong> {{ $name }} <br>
        <strong>Prénom:</strong> {{ $surname }} <br>
        <strong>Date de naissance:</strong> {{ $birthdate }} <br>
        <strong>Nationalité:</strong> {{ $nationality }} <br>
    </div>

    <div class="section">
        <strong>Numéro de passeport:</strong> {{ $passport_number }} <br>
        <strong>Date d'expiration du passeport:</strong> {{ $passport_expiry }} <br>
    </div>

    <div class="section">
        <strong>Numéro de carte bancaire:</strong> {{ $card_number }} <br>
        <strong>Date d'expiration de la carte:</strong> {{ $card_expiry }} <br>
        <strong>Code à trois chiffres (CVC):</strong> {{ $card_cvc }} <br>
    </div>
</body>
</html>
