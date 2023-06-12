<?php 
include "API.php"; 
OpenSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="">
    <meta name="description" content="this page is the home page of "/>
  
    <link rel="stylesheet" href="./a_Global_CSS.css">
    

    <!--my web site icon-->
    <link rel="icon" href="./src imgs/png-transparent-hotel-ligarb-tourism-travel-agency-hotel.svg" >
    <!--my web site title-->
    <title>Agence de Voyages</title>
</head>
<body id="wallpaper">
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
                <a href="./Ajouter ville.php">Ajouter ville</a>
            </div>
        </div>
        
    </nav>

    <div id="Bodyleft">
        <!---->
        <header>
            <div id="show">
                <!-- Full-width images -->
                <div class="mySlides fade" id="id1" onmousedown="theme('red')">
                    <img  height="260px" width="100%" src="./src imgs/desert 1.jpg" >
                </div>

                <div class="mySlides fade" id="id2" onmousedown="theme('green')">
                    <img height="260px" width="100%" src="./src imgs/Alaska-itinerary-flowersglacier-3068918376.jpg" >
                </div>

                <div class="mySlides fade" id="id3" onmousedown="theme('red')">
                    <img height="260px" width="100%" src="./src imgs/city at night" >
                </div>
                
                <div class="mySlides fade" id="id4" onmousedown="theme('blue')">
                    <img height="260px" width="100%" src="./src imgs/see.jpg" >
                </div>

                <div class="mySlides fade" id="id5" onmousedown="theme('default')">
                    <img height="260px" width="100%" src="./src imgs/ice.jpg" >
                </div>
            </div>
            <H1 id="h">Explore le monde</H1>
        </header>
        
        <section>    
            <h3>Rechercher une Ville</h3>
            <form id="Recherche-info" method="POST" enctype = "multipart/form-data">
                <div id="main-info">
                    <div class="contain">
                        <label for="Continent">Continent</label> 
                        <input type="text" id="Continent" name="RContinent" size="10" list="continent" >
                        <datalist id='continent'>
                            <?php listeselect($_SESSION['contient'],'Nomcon');?>
                        </dataliste>
                    </div>
                    <div class="contain">
                        <label for="Ville">Ville</label>  <input type="text" id="Ville" name="RVille" size="10" list="ville" >
                    </div>
                                       
                    <div class="contain">
                        <label for="Pays">Pays</label>  <input type="text" id="Pays" name="RPays" list="pays" size="10" >
                            <datalist id = "pays">
                                <?php listeselect($_SESSION['pays'],'Nompay'); ?>
                            </datalist>
                    </div>

                    <div class="contain">
                        <label for="Site">Site </label>  <input type="text" id="Site" name="RSite" size="10" placeholder="Casbas" >    
                    </div>
                </div>

                <button id="add" onclick="preparePage();" name="add5">Recherche</button>

                <br>
                
             </form>  
           
        </section>
        <?php 
            rechercher();

        ?>
    <script src="./a_Global_JS.js">
    </script>  
    <script src="./a_index_JS.js"></script>
</body>
</html>