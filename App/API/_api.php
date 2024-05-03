<?php

namespace App\API;

use App\Repository\CryptoRepository;

/////// API A RÉÉCRIRE !!!!! ///////

// Vérifiez que la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérez les données POST
  $user_id = $_POST['user'];
  $crypto_id = $_POST['name'];

  // Créez une nouvelle instance de CryptoRepository
  $cryptoRepository = new CryptoRepository();

  // Essayez d'insérer la crypto-monnaie favorite
  $success = $cryptoRepository->insertFavoriteCryptoByNameAndUserId($user_id, $crypto_id);

  // Vérifiez si l'insertion a réussi
  if ($success) {
    // Renvoyez une réponse de succès
    http_response_code(200);
    echo json_encode(['status' => 'success', 'message' => 'La crypto-monnaie a été ajoutée avec succès.']);
  } else {
    // Renvoyez une réponse d'échec
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Une erreur est survenue lors de l\'ajout de la crypto-monnaie.']);
  }
} else {
  // Renvoyez une réponse d'erreur si la méthode de la requête n'est pas POST
  http_response_code(405);
  echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée.']);
}
