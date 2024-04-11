<?php

namespace App\Controller;

use App\Autoloader;
use App\Repository\UserRepository;
use App\Entity\User;

class UserController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'register':
            $this->register();
            break;
          case 'profile':
            $this->profile();
            break;
          case 'update':
            $this->updateUser();
            break;
          case 'delete':
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

  // Enregistrer un nouvel Utilisateur
  protected function register()
  {
    try {
      $errors = [];
      $user = new User();

      if (isset($_POST['saveUser'])) {
        // Si il y a soumission de formulaire, alors hydrater l'objet User
        // voir dans App\Entity;
        $user->hydrate($_POST);

        // Puis on attribue, par défaut, le rôle "ROLE_USER" à l'utilisateur
        // voir les Constantes dans config.php;
        $user->setRole(ROLE_USER);

        // Puis on attribue, par défaut, l'avatar "avatar-default.jpg" à l'utilisateur
        // $user->setAvatar(DEFAULT_AVATAR);

        // méthode validate() : permet de vérifier si les données sont valides
        $errors = $user->validate();

        if (empty($errors)) {
          // Si il n'y a pas d'erreurs, alors on enregistre l'utilisateur en BDD
          $userRepository = new UserRepository();

          // persist() : permet de créer ou modifier un utilisateur suivant si Id renseignée ("User" déjà enregistré) ou non en BDD
          // voir dans App\Repository\UserRepository;
          $userRepository->persist($user);

          // Puis on redirige vers la page Login
          header('Location: index.php?controller=auth&action=login');
        }
      }

      // Pour afficher le formulaire de création d'un utilisateur
      $this->render('user/sign-up', [
        // 'pageTitle' => '',
        // On passe les erreurs à la View pour pouvoir les afficher dans le formulaire le cas échéant
        'errors' => $errors
      ]);
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  // Mettre à jour un Utilisateur 
  protected function updateUser()
  {
    try {
      $errors = [];
      $user = new User();

      if (isset($_POST['updateUser'])) {
        // Si il y a soumission de formulaire, alors hydrater l'objet User avec les données du formulaire
        // voir dans App\Entity;
        $user->hydrate($_POST);
        // Puis je récupère l'id de l'utilisateur connecté
        $user->setId($_SESSION['user']['id']);

        $errors = $user->validate();

        if (empty($errors)) {
          // Si il n'y a pas d'erreurs, alors on enregistre les modifications de l'utilisateur en BDD
          // voir dans App\Repository\UserRepository;
          $userRepository = new UserRepository();
          $userRepository->persist($user);

          // Regénère l'id de Session pour éviter la "fixation de session"
          session_regenerate_id(true);
          // Puis on met à jour les données de session
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

          // Enfin on redirige vers la page Profile
          header('Location: index.php?controller=user&action=profile');
        }
      }

      // Pour afficher le formulaire de modification d'un compte utilisateur
      $this->render('user/update', [
        'errors' => $errors
      ]);
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  // Supprimer un Utilisateur
  protected function deleteUser()
  {
    try {
      $errors = [];
      $user = new User();

      // Puis je récupère l'id de l'utilisateur connecté
      $user->setId($_SESSION['user']['id']);

      $userRepository = new UserRepository();
      $userRepository->delete($user);

      // Prévient les attaques de fixation de session
      session_regenerate_id(true);
      // Supprime les données de session du serveur
      session_destroy();
      // Supprime les données du tableau $_SESSION
      unset($_SESSION);

      // Enfin on redirige vers la page d'accueil
      header('Location: index.php');
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  protected function profile()
  {
    $this->render('user/profile', [
      // on peut passer ici des paramètres à la View Profile.php
      // 'test' => 555,
      // 'nom' => "John",
    ]);
  }
}