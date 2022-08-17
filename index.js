/*-------  Stars system -------*/
function starsSystem() {
  // reviews me renvoie un tableau d'avis
  const reviews = document.getElementsByClassName("reviews");

  // Je boucle sur mon tableau d'avis
  for (const element of reviews) {
    // Je récupère la note de mes avis
    /* element.dataset.rating <=> data-rating=" <php echo $response['rating']; ?>" qui me permetd erécupérer la note de chaque éléments */
    rating = element.dataset.rating;

    // Je récupère l'id de mes avis afin de faire une corrspondance avec leur notes plus bas
    id = element.id;

    // Je convertie mes reviews en pourcentage
    const starPercentage = Math.round((rating / 5) * 100);

    // je target mes étoiles
    var stars = document.getElementById(`rating-${id}`);

    // j'intencie la width de mes étoiles
    stars.style.width = starPercentage + "%";
  }
}
starsSystem()

/*------- Fonction qui gère le slider -------*/
new Splide(".splide", {
  // type: "loop",
  // autoplay: "ture",
  fixedWidth : '20rem',
  width:'80%',
  perPage: 3,
  gap: "1rem",
  breakpoints: {
    870: {
      perPage: 2,
    },
    640: {
      perPage: 1,
    },
  },
}).mount();

