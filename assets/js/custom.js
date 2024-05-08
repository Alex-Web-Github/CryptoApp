// requête en AJAX pour ajouter une crypto favorite à un utilisateur connecté

let req = new XMLHttpRequest();
let select = document.querySelector('.form-select');
select.addEventListener('change', function () {
  let crypto = this.value;
  req.open('POST', 'index.php?controller=crypto&action=insertFavorite', true);
  req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  req.send('name=' + crypto);
  req.onreadystatechange = function () {
    if (req.readyState === 4) {
      if (req.status === 200) {
        console.log('La crypto-monnaie a été ajoutée avec succès.');
        window.location.reload();

      } else {
        console.log('Une erreur est survenue lors de l\'ajout de la crypto-monnaie.');
      }
    }
  }
});

