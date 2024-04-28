<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\User $user */
?>

<div class="mt-md-5 py-5">

  <div class="container px-5 ">
    <div class="mt-5 col-12 col-md-10 col-xl-8 m-auto">
      <h1 class="display-5 fw-bolder text-white text-center mb-4">Créer un compte</h1>

      <form class="row g-3 text-left mt-4" method="post">

        <div class="col-md-6">
          <label for="first_name" class="form-label text-white">Prénom</label>
          <input type="text" class="form-control <?= (isset($errors['first_name']) ? 'is-invalid' : '') ?>" id="first_name" name="first_name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
          <?php if (isset($errors['first_name'])) { ?>
            <div class="invalid-feedback"><?= $errors['first_name'] ?></div>
          <?php } ?>
        </div>

        <div class="col-md-6">
          <label for="last_name" class="form-label text-white">Nom</label>
          <input type="text" class="form-control <?= (isset($errors['last_name']) ? 'is-invalid' : '') ?>" id="last_name" name="last_name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
          <?php if (isset($errors['last_name'])) { ?>
            <div class="invalid-feedback"><?= $errors['last_name'] ?></div>
          <?php } ?>
        </div>

        <div class="col-md-6">
          <label for="birth_date" class="form-label text-white">Date de naissance</label>
          <input type="date" class="form-control <?= (isset($errors['birth_date']) ? 'is-invalid' : '') ?>" id="birth_date" name="birth_date" value="<?= isset($_POST['birth_date']) ? $_POST['birth_date'] : '' ?>">
          <?php if (isset($errors['birth_date'])) { ?>
            <div class="invalid-feedback"><?= $errors['birth_date'] ?></div>
          <?php } ?>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label text-white">E-mail</label>
          <input type="email" class="form-control <?= (isset($errors['email']) ? 'is-invalid' : '') ?>" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
          <?php if (isset($errors['email'])) { ?>
            <div class="invalid-feedback"><?= $errors['email'] ?></div>
          <?php } ?>
        </div>

        <div class="col-md-6">
          <label for="user_name" class="form-label text-white">Nom d'utilisateur</label>
          <input type="text" class="form-control <?= (isset($errors['user_name']) ? 'is-invalid' : '') ?>" id="user_name" name="user_name" value="<?= isset($_POST['user_name']) ? $_POST['user_name'] : '' ?>">
          <?php if (isset($errors['user_name'])) { ?>
            <div class="invalid-feedback"><?= $errors['user_name'] ?></div>
          <?php } ?>
        </div>

        <div class="col-md-6">
          <label for="password" class="form-label text-white">Mot de passe</label>
          <input type="text" class="form-control <?= (isset($errors['password']) ? 'is-invalid' : '') ?>" id="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
          <?php if (isset($errors['password'])) { ?>
            <div class="invalid-feedback"><?= $errors['password'] ?></div>
          <?php } ?>
        </div>

        <div class="col-12">
          <button type="submit" name="saveUser" class="btn btn-primary mt-4">Je m'inscris</button>
        </div>
      </form>

    </div>
  </div>

</div>


<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>