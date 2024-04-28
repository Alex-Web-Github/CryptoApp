/* EXPLICATIONS :
Exemple d'une URL d'API utilisée dans le code ci-dessus :
https://min-api.cryptocompare.com/data/v2/histoday?fsym=' + currency + '&tsym=EUR&limit=30&aggregate=3&e=CCCAGG

--> c'est une URL pour une API fournie par CryptoCompare, un site web qui fournit des données sur les crypto-monnaies. Cette URL spécifique est utilisée pour obtenir l'historique des prix d'une crypto-monnaie spécifique en euros (EUR). Voici ce que signifient les différents paramètres :

fsym : C'est le symbole de la crypto-monnaie pour laquelle vous voulez obtenir des données. La valeur de ce paramètre est définie par la variable currency dans votre code.

tsym : C'est la devise dans laquelle le prix de la crypto-monnaie sera affiché. Dans ce cas, c'est l'euro (EUR).

limit : C'est le nombre de points de données à retourner. Dans ce cas, il est réglé sur 30, donc l'API retournera les données des 30 derniers jours.

aggregate : C'est l'intervalle de temps, en jours, entre chaque point de données. Dans ce cas, il est réglé sur 3, donc l'API retournera un point de données tous les 3 jours.

e : C'est l'échange à utiliser pour les données. Dans ce cas, c'est CCCAGG, qui est un indice composite de plusieurs échanges.

Donc, en résumé, cette URL est utilisée pour obtenir les données des prix de clôture de la crypto-monnaie spécifiée dans la variable currency pour les 30 derniers jours, avec un point de données tous les 3 jours, en euros, à partir de l'indice composite CCCAGG.
*/

/****
Ce fichier contient le code JavaScript pour afficher des graphiques de prix de crypto - monnaies sur une page Web.

Dans ce fichier, j'utilise l'API Fetch pour récupérer les données des prix des crypto - monnaies à partir de l'API CryptoCompare. J'utilise ensuite la bibliothèque Chart.js pour afficher ces données sous forme de graphiques.
****/


// Je récupère le paramètre du nom de la monnaie passé dans l'URL
let urlParams = new URLSearchParams(window.location.search);
let currency = urlParams.get('name');

// Le paramètre passé dans l'URL est bien une crypto-monnaie valide (validation préalable en PHP)
// Je peux afficher les graphiques

// GRAPHE 1 :
// Pour afficher le cours d'une monnaie sur les 24 dernières heures selon le paramètre passé dans l'URL
let url = 'https://min-api.cryptocompare.com/data/v2/histohour?fsym=' + currency + '&tsym=EUR&limit=24&e=CCCAGG';

fetch(url)
  .then(response => response.json())
  .then(data => {
    let labels = data.Data.Data.map(item => {
      // Convertir le timestamp en date
      let date = new Date(item.time * 1000);
      // Utiliser l'heure comme label
      return date.toLocaleTimeString();
    });

    // J'utiliser le prix à la clôture pour le graphique
    let prices = data.Data.Data.map(item => item.close);

    let ctx = document.getElementById('cryptoPriceChart').getContext('2d');
    let myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Valeur à la clôture (EUR)',
          data: prices,
          backgroundColor: '#07297C',
          borderWidth: 1,
          order: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'Cours de la crypto. ' + currency + ' en EUR sur 24 heures'
          }
        }
      }
    });
  })
  .catch(error => console.error('Erreur:', error));


// GRAPHE 2 :
// Pour la vue "Trade View", je vais afficher le top 10 des cryptomonnaies par capitalisation boursière en EUR
let url2 = 'https://min-api.cryptocompare.com/data/top/mktcapfull?limit=10&tsym=EUR&fsym=';

fetch(url2)
  .then(response => response.json())
  .then(data => {
    let labels = data.Data.map(item => item.CoinInfo.FullName);
    let prices = data.Data.map(item => item.RAW.EUR.PRICE.toFixed(2));

    let ctx = document.getElementById('tradingViewChart').getContext('2d');
    let myChart2 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Prix en EUR',
          data: prices,
          backgroundColor: '#07297C',
          borderWidth: 1,
          order: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'Top 10 des cryptomonnaies par capitalisation boursière'
          }
        }
      }
    });
  })
  .catch(error => console.error('Erreur:', error));


