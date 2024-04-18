let currency = 'BTC'; // Remplacez par la monnaie de votre choix
let url = 'https://min-api.cryptocompare.com/data/v2/histoday?fsym=' + currency + '&tsym=EUR&limit=30&aggregate=3&e=CCCAGG';

console.log(url);

fetch(url)
  .then(response => response.json())
  .then(data => {
    let labels = data.Data.Data.map(item => {
      let date = new Date(item.time * 1000); // Convertir le timestamp en date
      return date.toLocaleDateString(); // Utiliser la date comme label
    });

    let prices = data.Data.Data.map(item => item.close); // Utiliser le prix de clôture pour le graphique

    let ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Prix en EUR',
          data: prices,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  })
  .catch(error => console.error('Erreur:', error));