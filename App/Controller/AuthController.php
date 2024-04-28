<?php

namespace App\Controller;

use App\Db\Mysql;
use App\Entity\User;
use App\Repository\UserRepository;

class AuthController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'login':
            $this->login();
            break;
          case 'logout':
            $this->logout();
            break;
          default:
            throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
            break;
        }
      } else {
        throw new \Exception("Aucune action détectée");
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }


  protected function login()
  {
    $errors = [];

    if (isset($_POST['loginUser'])) {

      $userRepository = new UserRepository();
      // Je récupère l'utilisateur qui correspond à l'email
      $user = $userRepository->findOneByEmail($_POST['email']);

      // Je vérifie si le mot de passe qui correspond à l'email est correct
      // Voir la méthode verifyPassword dans App/Entity/User.php
      if ($user && $user->verifyPassword($_POST['password'])) {

        // Regénère l'id de Session pour éviter la "fixation de session"
        session_regenerate_id(true);

        $_SESSION['user'] = [
          'id' => $user->getId(),
          'email' => $user->getEmail(),
          'password' => $user->getPassword(),
          'first_name' => $user->getFirstName(),
          'last_name' => $user->getLastName(),
          'user_name' => $user->getUserName(),
          'birth_date' => $user->getBirthDate(),
          'role' => $user->getRole(),
          // 'avatar' => $user->getAvatar(),
        ];

        if (User::isUser()) {
          // Si l'utilisateur est un utilisateur, on le redirige vers son profil
          header('location: index.php?controller=user&action=profile');
        } else if (User::isAdmin()) {
          // Si l'utilisateur est un admin, on le redirige vers le dashboard
          header('location: index.php?controller=admin&action=dashboard');
        }
      } else {
        $errors[] = 'Email ou nom d\'utilisateur incorrect';
      }
    }

    $this->render('auth/login', [
      'errors' => $errors,
    ]);
  }


  protected function logout()
  {
    //Prévient les attaques de fixation de session
    session_regenerate_id(true);
    //Supprime les données de session du serveur
    session_destroy();
    //Supprime les données du tableau $_SESSION
    unset($_SESSION);
    header('location: index.php?controller=auth&action=login');
  }
}
