<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>

<?php foreach ($errors as $error) { ?>
  <div class="alert alert-danger" role="alert">
    <?= $error; ?>
  </div>
<?php } ?>

<div class="mt-md-5 py-5">

  <div class="container px-5 ">
    <div class="d-flex flex-column align-items-center mt-5 mx-auto col-md-6 col-lg-6 col-xl-6">

      <h1 class="display-5 fw-bolder text-white text-center mb-4">Connexion</h1>

      <form class="w-100" method="post">
        <div class="mb-3">
          <label for="email" class="form-label text-white">E-mail</label>
          <input type="email" class="form-control " id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label text-white">Mot de passe</label>
          <input type="password" class="form-control " id="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
        </div>

        <div class="">
          <!-- Traitement du formulaire : voir la méthode login() dans AuthController.php -->
          <button type="submit" name="loginUser" class="btn btn-primary mt-4">Je me connecte</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>