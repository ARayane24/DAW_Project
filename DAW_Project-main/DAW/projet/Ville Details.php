<?php 
include "API.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="">
    <meta name="description" content="this page is the home page of "/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <link rel="stylesheet" href="Style.css">

    <!--my web site icon-->
    <link rel="icon" href="./src imgs/png-transparent-hotel-ligarb-tourism-travel-agency-hotel.svg" >
    <!--my web site title-->
    <title>Ajouter Ville</title>

    <style>
        .slideshow img {
          display: none;
          width: 100%;
          height: 150px;       
          overflow: hidden;
        }
        .slideshow .active {
          display: block;
        }
      </style>
</head>
<body>
    <nav>
        <div id="Etudiant">
            <h3>Realisé par :</h3>
            <ul>
                <li class="Grey">OUAHABI Benhenni </li>
                <li class="Atoui">ATOUI Rayane</li>
                <li>Spécialité : INFO </li>
                <li>Section : 1</li>
                <li>Groupe : 6</li>
                <li>E-Mail :
                    <ul>
                        <li class="email">Grey.lanisteur123@gmail.com    </li>
                        <li class="email">At.rayane03@gmail.com    </li>
                    </ul>  
                </li>
            </ul>
        </div>

        <div class="ligne"></div> </br>

        <div id="AjouterVille">
            <a href="./index.php">page d’accueil</a>
        </div>
    </nav>

    <div id="Bodyleft">
        
        <section id="ville-info">
          <img height="300px" width="100%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.aV_h5zaBxVVPPnm78Flj9AHaE8%26pid%3DApi&f=1&ipt=4aef9960d5a658aa72c1a9d75255289ae14f520cd4b7e8daef00285587e24be4&ipo=images" alt="flag">

          <ul>
            
           </ul>
        </section>

        <section id="vill-photos">
          <div class="slideshow">
              <img width="100%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.99-Ub0vugOXKqI7ZrOpiLwHaE8%26pid%3DApi&f=1&ipt=0cf27a44a09902e2ca6b8b2e59124a5f53c1f60a0adeb7227012f69b1ad97e67&ipo=images" class="active">
              <img width="100%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.CBFZpMOFqyCjyHOJxouwVAHaE8%26pid%3DApi&f=1&ipt=e45cae4ca633351117c89c209e31f83bf76fac35383d8c76f51c9b6aef130971&ipo=images" >
              <img width="100%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.2h9ykEduZ-uS3NBVP1KV6AHaFj%26pid%3DApi&f=1&ipt=8f68367611aef5defd799ecb6411940da85e7ffb1e3d7b5f2205e7ba2d0e4466&ipo=images">
          </div>
          <div class="button-group">
            <button id="prev">Précédent</button>
            <button id="pause">Pause</button>
            <button id="start">Démarrer</button>
            <button id="next">Suivant</button>
          </div>
        </section>

        <section id="vill-tourist-areas">

          <ul id="Aéroports">
           
            <h4>Aéroports</h4>
            <li>Aéroport1</li>
            <li>Aéroport2</li>
            <li>Aéroport3</li>
          </ul>

          <ul id="THôtels">
            
            <h4>Hôtels</h4>
            <li>Hôtel1</li>
            <li>Hôtel2</li>
            <li>Hôtel3</li>
          </ul>

          <ul id="TRestaurants">
            
            <h4>Restaurants</h4>
            <li>Aéroport1</li>
            <li>Aéroport2</li>
            <li>Aéroport3</li>
          </ul>
          
          <ul id="Gares">
            
            <h4>Gares</h4>
            <li>Gare1</li>
            <li>Gare2</li>
            <li>Gare3</li>
          </ul>

        </section>

        

    </div>

    

    


    <script>
        var slideshow = document.querySelector('.slideshow');
        var images = slideshow.querySelectorAll('img');
        var prevButton = document.getElementById('prev');
        var nextButton = document.getElementById('next');
        var pauseButton = document.getElementById('pause');
        var startButton = document.getElementById('start');
        var currentIndex = 0;
        ////////////////////////////////////////////////////////
        var pause = false;
        var delia = 2000; // mili sec
  
        images[currentIndex].classList.add('active');
  
        function nextImage() {
          images[currentIndex].classList.remove('active');
          currentIndex = (currentIndex + 1) % images.length;
          images[currentIndex].classList.add('active');
        }
  
        function prevImage() {
          images[currentIndex].classList.remove('active');
          currentIndex = (currentIndex - 1 + images.length) % images.length;
          images[currentIndex].classList.add('active');
        }
  ///////////////////////////////////////////////////////////////////
        /*
        function startSlideshow() {function() {
            while (!pause)
                nextImage();
          }
          , delia;
          
          
        }*/
  
        function stopSlideshow() {
          clearInterval(intervalId);
        }
  
        nextButton.addEventListener('click', nextImage);
        prevButton.addEventListener('click', prevImage);
        pauseButton.addEventListener('click', function() {
          pause = true;
        });
        startButton.addEventListener('click', function() {
          pause = false;
        });
  
        startSlideshow();
      </script>
</body>
</html>