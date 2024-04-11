<?php

namespace App\Controller;

use App\Db\Mysql;
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
      // 
      $user = $userRepository->findOneByEmail($_POST['email']);

      // Je vérifie si le user_name qui correspond à l'email est correct
      if ($user && $_POST['user_name'] == $user->getUserName()) {

        var_dump($_SESSION['user']);

        // Regénère l'id de Session pour éviter la "fixation de session"
        session_regenerate_id(true);

        $_SESSION['user'] = [
          'id' => $user->getId(),
          'email' => $user->getEmail(),
          'first_name' => $user->getFirstName(),
          'last_name' => $user->getLastName(),
          'user_name' => $user->getUserName(),
          'birth_date' => $user->getBirthDate(),
          'role' => $user->getRole(),
          // 'avatar' => $user->getAvatar(),
        ];

        // header('location: index.php');
        header('location: index.php?controller=user&action=profile');
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
