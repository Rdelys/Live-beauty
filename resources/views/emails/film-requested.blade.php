<!DOCTYPE html>
<html lang="fr">
<body>
  <h2>🎬 Nouvelle demande de film</h2>

  <p><strong>Client :</strong> {{ $film->user->pseudo ?? $film->user->nom }}</p>
  <p><strong>Description :</strong> {{ $film->detail }}</p>
  <p><strong>Durée :</strong> {{ $film->minutes }} minutes</p>
  <p><strong>Jetons :</strong> {{ $film->jetons }}</p>
  <p><strong>Type d’envoi :</strong> {{ ucfirst($film->type_envoi) }}</p>

  <br>
  <p>👉 Connecte-toi à ton compte pour traiter la demande.</p>
</body>
</html>
