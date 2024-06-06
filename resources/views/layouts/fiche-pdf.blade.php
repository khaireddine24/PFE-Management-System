<!DOCTYPE html>
<html>
<head>
    <title>Fiche</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #555;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
            color: #555;
        }
        .label {
            font-weight: bold;
            color: #222;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #f8f8f8;
            border-bottom: 1px solid #ccc;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-body {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h2>{{ $fiche->intitule_pfe }}</h2>
        </div>
        <div class="card-body">
            <p><span class="label">Société d'accueil:</span> {{ $fiche->societe_acceuil }}</p>
            <p><span class="label">Encadrant externe:</span> {{ $fiche->encadrant_externe }}</p>
            <p><span class="label">Téléphone société:</span> {{ $fiche->ntel_societe }}</p>
            <p><span class="label">Email société:</span> {{ $fiche->mail_societe }}</p>
            <p><span class="label">Besions fonctionnels:</span> {{ $fiche->besions_fonctionnels }}</p>
            <p><span class="label">Technologies utilisées:</span> {{ $fiche->technologies_utilisees }}</p>
            <p><span class="label">Langue:</span> {{ $fiche->langue }}</p>
        </div>
    </div>
</body>
</html>
