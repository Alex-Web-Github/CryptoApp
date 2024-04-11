<?php

namespace App\Controller;

class Controller
{
  // Ce controleur fait office de "Routeur'" pour rediriger vers les bons controleurs
  public function route(): void
  {
    try {
      // On vérifie si un controleur est spécifié dans l'url
      if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
          case 'page':
            //charger controleur page
            $controller = new PageController();
            $controller->route();
            break;
          case 'auth':
            //charger controleur auth
            $controller = new AuthController();
            $controller->route();
            break;
          case 'user':
            $controller = new UserController();
            $controller->route();
            break;
            // case 'movie':
            //   $controller = new MovieController();
            //   $controller->route();
            //   break;
          default:
            throw new \Exception("Le controleur n'existe pas");
            break;
        }
      } else {
        // Si pas de paramètre 'controleur' dans l'url
        $controller = new PageController();
        // Puis on charge la page d'accueil grâce à la méthode home()
        $controller->home();
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  protected function render(string $path, array $params = []): void
  {
    $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';

    try {
      if (!file_exists($filePath)) {
        throw new \Exception("Fichier non trouvé : " . $filePath);
      } else {
        // Cette fonction crée les variables dont les noms sont les index de ce tableau, et leur affecte la valeur associée
        extract($params);
        require_once $filePath;
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }
}
