<?php

namespace App\Controller;

use App\Autoloader;
use App\Repository\UserRepository;
use App\Repository\CryptoRepository;
use App\Entity\User;
use App\API\ApiTools;
use App\Tools\StringTools;

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

        // Puis on attribue, par défaut, le nom de fichier "avatar-default.jpg" à l'utilisateur
        $user->setAvatar(DEFAULT_AVATAR);

        // Méthode validate() : permet de vérifier si les données sont valides
        $errors = $user->validate();

        if (empty($errors)) {
          // Si il n'y a pas d'erreurs, alors on enregistre l'utilisateur en BDD
          $userRepository = new UserRepository();

          // La méthode persist() permet à la fois de créer ou modifier un utilisateur suivant si un Id est renseigné (ie: Utilisateur déjà enregistré) ou non en BDD
          $userRepository->persist($user);

          // Puis on redirige vers la page Login
          header('Location: index.php?controller=auth&action=login');
        }
      }

      // Pour afficher le formulaire de création d'un utilisateur
      $this->render('user/signUpForm', [
        // On passe les erreurs à la View pour pouvoir les afficher dans le formulaire le cas échéant
        'errors' => $errors
      ]);
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  // Mettre à jour les données depuis la page Profil d'un Utilisateur 
  protected function updateUser()
  {
    try {
      $errors = [];
      $user = new User();

      if (isset($_POST['updateUser'])) {

        // Je vérifie si le champs "avatar" est renseigné (il est facultatif dans l'updateForm) alors je le traite

        // Les types MIME autorisés sont stockés dans une variable
        $authorizedMimeTypes = [
          'png' => 'image/png',
          'jpg' => 'image/jpg',
          'jpeg' => 'image/jpeg',
          'webp' => 'image/webp',
        ];

        // Fonction pour uniformiser les slugs et "cleaner" les noms de fichiers (-> Trouvé sur le web)
        function slugify($text, string $divider = '-')
        {
          // Replace non letter or digits by -
          $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
          // Transliterate
          $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
          // Remove unwanted characters
          $text = preg_replace('~[^-\w]+~', '', $text);
          // Trim
          $text = trim($text, $divider);
          // Remove duplicate divider
          $text = preg_replace('~-+~', $divider, $text);
          // Lowercase
          $text = strtolower($text);
          // Check if it is empty
          if (empty($text)) {
            return 'n-a';
          }
          // Return result
          return $text;
        }
        // Fonctions de vérification du téléchargement de l'avatar
        function isUploadSuccessful(array $uploadedFile): bool
        {
          return isset($uploadedFile['error']) && $uploadedFile['error'] === UPLOAD_ERR_OK;
        }
        // Fonction pour vérifier si le fichier téléchargé est inférieur à 2Mo
        function isUploadSmallerThan2M(array $uploadedFile): bool
        {
          return $uploadedFile['size'] < 2000000;
        }
        // Fonction pour vérifier si le type MIME du fichier téléchargé est autorisé
        function isMimeTypeAuthorized(array $authorizedMimeTypes, array $uploadedFile): bool
        {
          $finfo = new \finfo(FILEINFO_MIME_TYPE);
          $mimeType = $finfo->file($uploadedFile['tmp_name']);

          return in_array($mimeType, $authorizedMimeTypes, true);
        }
        // Fonction pour obtenir l'extension du fichier téléchargé à partir du type MIME
        function getExtensionFromMimeType(array $authorizedMimeTypes, array $uploadedFile): string
        {
          $finfo = new \finfo(FILEINFO_MIME_TYPE);
          $mimeType = $finfo->file($uploadedFile['tmp_name']);

          if ($extension = array_search($mimeType, $authorizedMimeTypes, true)) {
            return $extension;
          }
          throw new \Exception('Le type MIME n\'est lié à aucune extension');
        }
        // Fonction pour déplacer le fichier téléchargé vers le dossier '/uploads/avatar' du serveur et supprimer l'ancien fichier fichier si il est renseigné
        function moveUploadedFile(array $uploadedFile, string $fileName, string $oldFileName = null): bool
        {
          if (move_uploaded_file($uploadedFile['tmp_name'], _AVATAR_IMAGES_FOLDER_ . $fileName)) {
            if ($oldFileName !== null) {
              unlink(_AVATAR_IMAGES_FOLDER_ . $oldFileName);
            }
          }
          return true;
        }

        // Je vérifie si le champs "avatar" est renseigné (il est facultatif dans l'updateForm) alors je le traite
        if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['name'] !== '') {
          $uploadedFile = $_FILES['uploaded_file'];
          // $uploadedFile = $_FILES['uploaded_file'] ?? [];

          // Je stocke les informations de l'Input Téléchargement dans une variable. Si aucun fichier n'a été téléchargé, j'initialise cette variable en un tableau vide.

          // Vérification du téléchargement par la méthode $_POST et au bon format de fichier
          if (!isUploadSuccessful($uploadedFile)) {
            throw new \Exception('Le téléchargement a échoué : aucun fichier sélectionné');
          }
          if (!isMimeTypeAuthorized($authorizedMimeTypes, $uploadedFile)) {
            throw new \Exception('Le type de fichier n\'est pas supporté');
          }
          // Vérification taille fichier < 2Mo
          if (!isUploadSmallerThan2M($uploadedFile)) {
            throw new \Exception('Le fichier dépasse les 2 Mo');
          }

          // Vérifications OK, on peut démarrer le téléchargement du fichier vers le dossier '/uploads/avatar' du serveur
          $extension = getExtensionFromMimeType($authorizedMimeTypes, $uploadedFile);
          $fileNameWithoutExtension = pathinfo($uploadedFile["name"], PATHINFO_FILENAME);
          $fileName = slugify($fileNameWithoutExtension);
          // uniqid() : utile pour éviter l'écrasement de fichier si le même nom de fichier image est utilisé plusieurs fois.
          $fileName = uniqid() . '-' . $fileName . '.' . $extension;

          // Je récupère le nom de l'ancien fichier "avatar" de l'utilisateur connecté en vu de le supprimer après le téléchargement du nouveau fichier
          $oldFileName = $_SESSION['user']['avatar'];
          if (!moveUploadedFile($uploadedFile, $fileName, $oldFileName)) {
            throw new \Exception('Le téléchargement a échoué ...');
          }

          $_SESSION['user']['avatar'] = $fileName;
        }


        // Si il y a soumission de formulaire, alors hydrater l'objet User avec les données du formulaire (voir la méthode dans App\Entity)
        $user->hydrate($_POST);
        // Puis je récupère l'id de l'utilisateur connecté
        $user->setId($_SESSION['user']['id']);
        // Puis je récupère l'avatar de l'utilisateur connecté
        // (si il a été modifié précédemment, il a été actualisé suite au traitement de l'upload de l'avatar)
        $user->setAvatar($_SESSION['user']['avatar']);

        // Vérifie si tous les champs sont renseignés (sauf 'avatar') et si les types de données sont valides (pour email et date)
        $errors = $user->validate();

        // TODO Les données de $_POST sont-elles bien nettoyées ? -> striptags() ???

        if (empty($errors)) {
          // Si il n'y a pas d'erreurs, alors on enregistre les modifications de l'utilisateur en BDD
          $userRepository = new UserRepository();
          $userRepository->persist($user);

          // Regénère l'id de Session pour éviter la "fixation de session"
          session_regenerate_id(true);

          // Puis on met à jour les données de session
          $_SESSION['user'] = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'user_name' => $user->getUserName(),
            'birth_date' => $user->getBirthDate(),
            'role' => $user->getRole(),
            'avatar' => $user->getAvatar(),
          ];

          // Enfin on redirige vers la page Profile
          // header('Location: index.php?controller=user&action=profile');
        }
      }
      // Pour afficher le formulaire de modification d'un compte utilisateur
      $this->render('user/updateForm', [
        'errors' => $errors
      ]);


      var_dump($_FILES['uploaded_file']);
      var_dump($_SESSION['user']);

      //
      //
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

  // Supprimer un Utilisateur par son Id depuis le DashboardAdmin
  protected function deleteUserById()
  {
    try {
      $errors = [];
      $user = new User();

      // Puis je récupère l'id de l'utilisateur depuis le DashboardAdmin
      $user->setId($_GET['id']);

      $userRepository = new UserRepository();
      $userRepository->delete($user);

      // Enfin on redirige vers la page Admin
      header('Location: index.php?controller=admin&action=showAllUsers');
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  // Afficher le Profil d'un Utilisateur
  protected function profile()
  {
    try {
      $errors = [];
      $user = new User();
      // si l'utilisateur est connecté (voir App\Entity\User.php pour la méthode isLogged()
      if (User::isLogged()) {
        // Récupérer l'id de l'utilisateur connecté
        $user_id = $_SESSION['user']['id'];

        $cryptoRepository = new CryptoRepository();

        // Je récupère les cryptos favorites de l'utilisateur depuis la table crypto_user
        $userFavoritesCrypto = $cryptoRepository->FindAllByUserId($user_id);

        if ($userFavoritesCrypto) {
          // Je vérifie si l'utilisateur a des cryptos favorites renseignées

          $cryptoDataList = [];
          foreach ($userFavoritesCrypto as $favoriteCrypto) {
            $favoriteCryptoName = $favoriteCrypto['name'];

            // Je récupère les données de la crypto avec l'API cryptocompare.com (en EUR)
            $favoriteCryptoDataByName = ApiTools::getInformationFromApi($favoriteCryptoName);

            // Je stocke les données issues de l'API dans un tableau clé/valeur (nom de la crypto => données API de la crypto)
            $cryptoDataList[$favoriteCryptoName] = $favoriteCryptoDataByName;
          }
        } else {
          $cryptoDataList = [];
          $errors = "Vous n'avez pas de cryptos favorites.";
        }
      } else {
        throw new \Exception("Votre session a expiré, veuillez vous reconnecter.");
      }

      // Pour afficher la page "Profil" d'un utilisateur
      $this->render('user/profile', [
        'errors' => $errors,
        // Je passe le tableau des cryptos favorites de l'utilisateur dans le template "favorites-partial.php" sous la forme d'un tableau associatif
        'cryptoDataList' => $cryptoDataList,
        // 'favoriteCrypto' => $favoriteCrypto,
      ]);
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }
}
