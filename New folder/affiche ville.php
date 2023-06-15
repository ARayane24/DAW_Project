<?php include "API.php";
OpenSession();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="">
    <meta name="description" content="this page is the home page of "/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <link rel="stylesheet" href="./a_Global_CSS.css">
    <link rel="stylesheet" href="./c_Affiche Ville_CSS.css">

    <!--my web site icon-->
    <link rel="icon" href="./src imgs/png-transparent-hotel-ligarb-tourism-travel-agency-hotel.svg" >
    <!--my web site title-->
    <title>Visiter Ville</title>
</head>
<body id='wallpaper'>
   
    <nav id="job" onclick="onclickShowHide()">
        <div >
         <a  id="show-hide">&#10095;</a>
        </div>
        <div id="nav">
            <div id="Etudiant">
                <h3>Realisé par :</h3>
                <?php Binom();?>
            </div>

            <div class="ligne"></div> </br>

            <div id="AjouterVille">
                <a href="./index.php">page d’accueil</a>
            </div>
        </div>
        
    </nav>
    
    
    
    <div id="Bodyleft">
        <!---->
        <header>
            <div class="slideshow">
                <!-- Full-width images -->
                <div class="mySlides fade"  onmousedown = "startPause()">
                    <img  height="300px" width="100%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.E9iPyTLlln60HynLC4JCBQHaE8%26pid%3DApi&f=1&ipt=01a24bc340de62bd94fe5380a5ef1edcd2424a711ac8d84238fa77c299846b29&ipo=images" >
                </div>

                <div class="mySlides fade"  onmousedown = "startPause()">
                    <img height="300px" width="100%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.akz0hTxRH7ofWzOzjjH3zQHaDn%26pid%3DApi&f=1&ipt=0b76b7a019f5057a8e3f9d665b070b279c3067aede8040c7b5b6d14a2955217f&ipo=images" >
                </div>

                <div class="mySlides fade"  onmousedown = "startPause()">
                    <img height="300px" width="100%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.EP9MUPm_0QGUm-dr1eaz4wHaHa%26pid%3DApi&f=1&ipt=7841fd9741aa1cfe7b261a69b2727900ab636bd4497ceff8ea5347fb42979a02&ipo=images" >
                </div>

                <!-- Next and previous buttons -->
                <br>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>


                <div id="slides-control">
                    <!-- follow the number of imgs --> 
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    
                </div>
                 
            
            </div>
                
           

        </header>

        <section id="info">
            <?php detail(); ?>
        </section>

        <section>
        <div class='ligne'></div></br>

        <div style='display: flex; width:90%'>
            <div class='contain-affiche-ville' onmousedown = 'showAeroportsF()'>
                <img src='https://weknowyourdreams.com/images/airport/airport-03.jpg' alt='voir Aéroports'>
                <div class='overlay'>
                    <div class='text'>voir Aéroports</div>
                    </div>
                </div>

            <div class='contain-affiche-ville' onmousedown = 'showRestaurantsF()'>
                <img src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.JSVPo_oDaFVCAaBeKXuYXQHaE8%26pid%3DApi&f=1&ipt=ce0ba9dd08b542d49729a12c1a6fab30d1fb12304af479dab8ed4b9c2ef94ff9&ipo=images' alt='voir Aéroports'>
                <div class='overlay'>
                    <div class='text'>voir Restaurants</div>
                    </div>
                </div>

            <div class='contain-affiche-ville' onmousedown = 'showHotelsF()'>
                <img src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.S6FljC55M8zaIQmraAGBrgHaE8%26pid%3DApi&f=1&ipt=a6e63baf12169cea5a5fa932d9bb09b113de982bb78fc9a604bc7920d4f1c9d3&ipo=images' alt='voir Aéroports'>
                <div class='overlay'>
                    <div class='text'>voir Hôtels</div>
                    </div>
                </div>

            <div class='contain-affiche-ville' onmousedown = 'showGaresF()'>
                <img src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.t98nR8-Xns-3yyTMGF8D7AHaE8%26pid%3DApi&f=1&ipt=ecc587bf36eb7682d51be452ebaac3b63c6b451c393b5fe14590b7fbf9d7c352&ipo=images' alt='voir Aéroports'>
                <div class='overlay'>
                    <div class='text'>voir Gares</div>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
    <div id='rech'>
         <ul>   
          <?php recherchNaiss(); ?> 
          </ul></div>
        </section>
    </div>

    <script src="./a_Global_JS.js"></script>
    <script src="./c_Affiche ville_JS.js"></script>
</body>
</html>