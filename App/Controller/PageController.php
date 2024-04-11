<?php

namespace App\Controller;

// use App\Repository\BookRepository;

class PageController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'home':
            $this->home();
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


  protected function home()
  {
    $this->render('page/home', [
      // pas besoin de passer des paramètres à la page Home dans mon cas
      // 'test' => 555,
      // 'nom' => "John",
    ]);
  }
}