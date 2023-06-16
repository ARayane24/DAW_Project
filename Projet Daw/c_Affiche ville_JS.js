 /* img slide fonctions */
 let slideIndex = 1;
 let start = false;

 function startPause(){
     start = !start;
     if(start)
         showSlides();
 }

 showSlides(slideIndex);

 function plusSlides(n) {
     showSlides(slideIndex += n);
 }

 function currentSlide(n) {
     showSlides(slideIndex = n);
 }

 function showSlides(n) {
     let i;
     let slides = document.getElementsByClassName("mySlides"); // pour avoir tous les photos
     let dots = document.getElementsByClassName("dot");// pour avoir tous les points
     let hs =  document.getElementsByClassName("h");// pour avoir tous les titre des photos

     if (n > slides.length) {slideIndex = 1}   // n > nbr des imgs returne a la 1er img  
     if (n < 1) {slideIndex = slides.length}  // n < 1  returne a la dernier img 

     for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";  // cache tous les imgs
         hs[i].style.display = "none";
     }

     for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace(" active", ""); // cache tous les point
     }

     if (slides[slideIndex-1] && dots[slideIndex-1] && hs[slideIndex-1]) {
        slides[slideIndex-1].style.display = "block"; // affiche une img 
        dots[slideIndex-1].className += " active"; // active une point
        hs[slideIndex-1].style.display = "block"; // affiche une titre site
     }

     

     if (start) { // start va etre vrais si user click sur un img 
         slideIndex++; // positionne l'index sur l'img suiv.
         if (slideIndex > slides.length) {slideIndex = 1} 

         // re-apple fonction chaque 2s
         setTimeout(showSlides, 2000);
     }
 }
 
  /* Show more details functions */
  let goTopButton = document.getElementById('goTop-button');
  let showAeroports = document.getElementById('Aeroport');
  let showRestaurants = document.getElementById('Restaurant');
  let showHotels = document.getElementById('Hotel');
  let showGares = document.getElementById('Gare');

  let imgClick = false;
  let clickAeroports = false;
  let clickRestaurants = false;
  let clickHotels = false;
  let clickGares = false;

  

  function showAeroportsF(){
      hideAll();
      if ( clickAeroports ) {
          clickAeroports = !clickAeroports;
           clickRestaurants = false;
           clickHotels = false;
           clickGares = false;
          return;
      }
      clickRestaurants = false;
      clickHotels = false;
      clickGares = false;
      clickAeroports = !clickAeroports;
      showAeroports.style.display = 'block';

      goTopButton.style.display = 'block';
  }

  function showRestaurantsF(){
      hideAll();
      if (  clickRestaurants) {
          clickRestaurants = !clickRestaurants;
          clickHotels = false;
           clickGares = false;
           clickAeroports = false;
          return;
      }
      clickHotels = false;
      clickGares = false;
      clickAeroports = false;
      clickRestaurants = !clickRestaurants;
      showRestaurants.style.display = 'block';

      goTopButton.style.display = 'block';
  }

  function showHotelsF(){
      hideAll();
      if ( clickHotels) {
          clickHotels = !clickHotels;
          clickGares = false;
          clickAeroports = false;
          clickRestaurants = false;
          return;
      }
      clickGares = false;
      clickAeroports = false;
      clickRestaurants = false;
      clickHotels = !clickHotels;
      showHotels.style.display = 'block';


      goTopButton.style.display = 'block';
  }

  function showGaresF(){
      hideAll();
      if (clickGares) {
          clickGares = !clickGares;
          clickHotels = false;
          clickAeroports = false;
          clickRestaurants = false;
          return;
      }
      clickHotels = false;
      clickAeroports = false;
      clickRestaurants = false;
      clickGares = !clickGares;
      showGares.style.display = 'block';
      // use php to get list

      goTopButton.style.display = 'block';
  }

  function hideAll(){
    if (showRestaurants.style.display != 'none' ) {
        showRestaurants.style.display = 'none';
    }
    if (showHotels.style.display != 'none') {
        showHotels.style.display = 'none';
    }
    if (showAeroports.style.display != 'none') {
        showAeroports.style.display = 'none';
    }
    if (showGares.style.display != 'none') {
        showGares.style.display = 'none'; 
    }
    if (goTopButton.style.display != 'none') {
        goTopButton.style.display = 'none';
    }
  }


  /////
  function deletenec(x){
    // pour exe. code PHP depuis JS

    // Créer un objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Définir la méthode et l'URL de la requête
    xhr.open("POST", "API.php", true);

    // Définir l'en-tête de la requête
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Envoyer la requête avec la valeur en tant que paramètre
    xhr.send("y=" + encodeURIComponent(x));
    alert("le necc que vous avez selectionnee a ete supprimee" + x);
    location.reload();

}
