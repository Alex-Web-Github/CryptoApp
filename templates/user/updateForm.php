<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\User $user */
?>

<div class="mt-md-5 py-5">
  <div class="container px-5 ">
    <div class="mt-5 col-12 col-md-10 col-xl-8 m-auto">
      <h1 class="display-5 fw-bolder text-white text-center mb-4">Modifier son compte</h1>

      <form class="row g-3 text-left mt-4" method="post" action="" enctype="multipart/form-data">

        <div class="col-md-6">
          <label for="first_name" class="form-label text-white">Prénom</label>
          <input type="text" class="form-control <?= (isset($errors['first_name']) ? 'is-invalid' : '') ?>" id="first_name" name="first_name" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['first_name'] : '' ?>">
          <div class="invalid-feedback"><?= $errors['first_name'] ?></div>
        </div>

        <div class="col-md-6">
          <label for="last_name" class="form-label text-white">Nom</label>
          <input type="text" class="form-control <?= (isset($errors['last_name']) ? 'is-invalid' : '') ?>" id="last_name" name="last_name" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['last_name'] : '' ?>">
          <div class="invalid-feedback"><?= $errors['last_name'] ?></div>
        </div>

        <div class="col-md-6">
          <label for="birth_date" class="form-label text-white">Date de naissance</label>
          <input type="text" class="form-control <?= (isset($errors['birth_date']) ? 'is-invalid' : '') ?>" id="birth_date" name="birth_date" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['birth_date'] : '' ?>">
          <div class="invalid-feedback"><?= $errors['birth_date'] ?></div>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label text-white">E-mail</label>
          <input type="text" class="form-control <?= (isset($errors['email']) ? 'is-invalid' : '') ?>" id="email" name="email" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['email'] : '' ?>">
          <div class="invalid-feedback"><?= $errors['email'] ?></div>
        </div>

        <div class="col-md-6">
          <label for="user_name" class="form-label text-white">Nom d'utilisateur</label>
          <input type="text" class="form-control <?= (isset($errors['user_name']) ? 'is-invalid' : '') ?>" id="user_name" name="user_name" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['user_name'] : '' ?>">
          <div class="invalid-feedback"><?= $errors['user_name'] ?></div>
        </div>

        <div class="col-md-6">
          <label for="password" class="form-label text-white">Mot de passe</label>
          <input type="text" class="form-control <?= (isset($errors['password']) ? 'is-invalid' : '') ?>" id="password" name="password" value="">
          <div class="invalid-feedback"><?= $errors['password'] ?></div>
        </div>

        <!-- <div class="col-md-6">
            <label for="avatar" class="form-label text-white">TODO -> Ajouter un Avatar</label>
            <input type="file" class="form-control " id="avatar" name="avatar" value="">
          </div> -->

        <div class="gap-4 d-flex flex-column flex-sm-row mt-4">
          <button type="submit" name="updateUser" class="btn btn-primary btn-sm px-4 me-sm-3">Je confirme les modifications</button>
          <a class="btn btn-outline-light btn-sm px-4" href="index.php?controller=user&action=profile">Retour</a>
        </div>

      </form>
    </div>
  </div>
</div>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>