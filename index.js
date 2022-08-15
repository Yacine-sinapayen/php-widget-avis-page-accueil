/* appel vers l'api afin de récupérer les notes */
function getdata(){
    fetch('http://localhost:3009/avis')
    .then((resp) => resp.json())
    .then(function(data) {
        console.log(data)
    })
  
}
getdata()


console.log('js work')

// Note initiales des télévisons
const ratings = {
    sony: 3,
    samsung: 3.4,
    vizio: 2.3,
    panasonic: 3.6,
    philips: 4.1,
  };
  
  // Nombre total d'étoiles qu'une television peut avoir
  const starsTotal = 5;
  
  // Récupération des notes
  function getRatings() {
    // Je boucle sur l'objet ratings
    for (let rating in ratings) {
      // console.log(ratings); me renvoie les clés de l'objet ratings
      // console.log(ratings[rating]); me renvoie les valeurs de l'objet ratings
  
      // Récupération du pourcentage
      const starPercentage = (ratings[rating] / starsTotal) * 100;
      // console.log(starPercentage);
  
      // Arrondir à la dizaine la plus proche.
      const starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;
      console.log(starPercentageRounded)
  
      // Définir la largeur des étoiles intérieures en pourcentage. Pour cela, récupérer les class de chaque téléviseur et cibler les "stars-inner" (intérieur des étoiles)  pour les remplir avec ma const "starPercentageRounded".
      // En params je récuprère la class de chaque téléviseur grâce à ma let
      // rating = les clés de l'objet ratings.
      // Enfin j'indique à quelle % je veux que la largeur de mon élement "star-inner" soit remplis.
      // "star-inner" est une class dans laquelle j'ai inséré des étoile directement via mon css et sa largeur est définie
      // par le % de starPercentageRounded. Le % restant est rempli par "star-outer"
      document.querySelector(`.stars-inner`).style.width =
        starPercentageRounded;
    }
  }
  getRatings()