<?php

namespace App\Controller;

use App\Autoloader;
use App\Controller\Controller;
use App\Repository\UserRepository;
use App\Repository\CryptoRepository;
use App\Entity\User;


class AdminController extends Controller
{

  public function route(): void
  {
    try {
      $errors = [];

      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'showAllUsers':
            $this->showAllUsers();
            break;
          case 'deleteUser':
            $this->deleteUser();
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

  protected function showAllUsers(): void
  {
    $errors = [];

    try {
      // Vérifier si l'utilisateur est connecté et a le rôle ADMIN
      if (User::isLogged() && User::isAdmin()) {

        // On instancie le repository des utilisateurs
        $userRepository = new UserRepository();

        // On récupère la liste de tous les utilisateurs
        $usersList = $userRepository->findAll();

        // On récupère les cryptos favorites de chaque utilisateur
        $userFavorites = [];
        foreach ($usersList as $user) {
          $cryptoRepository = new CryptoRepository();

          $userFavorites[$user->getId()] = $cryptoRepository->FindAllByUserId($user->getId());
        }

        // On affiche la liste des utilisateurs
        $this->render('admin/manageUsers', [
          'errors' => $errors,
          'usersList' => $usersList,
          'userFavorites' => $userFavorites,
        ]);
      } else {
        throw new \Exception("Vous n'avez pas les droits pour accéder à cette page, ou vous n'êtes pas connecté.");
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  protected function deleteUser(): void
  {
    try {

      if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {

        $user = new User();
        $user->setId($_GET['id']);

        $userRepository = new UserRepository();
        // On vérifie si l'utilisateur existe
        if ($userRepository->findOneById($user->getId())) {
          $userRepository->delete($user);

          // Enfin on redirige vers la page Admin/ShowAllUsers
          header('Location: index.php?controller=admin&action=showAllUsers');
        } else {
          throw new \Exception("Aucun utilisateur trouvé");
        }
      } else {
        throw new \Exception("Aucun utilisateur sélectionné");
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }
}
