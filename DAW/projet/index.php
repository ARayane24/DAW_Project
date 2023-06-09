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
  
    <link rel="stylesheet" href="./Style.css">

    <!--my web site icon-->
    <link rel="icon" href="./src imgs/png-transparent-hotel-ligarb-tourism-travel-agency-hotel.svg" >
    <!--my web site title-->
    <title>Agence de Voyages</title>
</head>
<body>
    <nav id="job" onclick="onclickShowHide()">
        <div >
         <a  id="show-hide">&#10095;</a>
        </div>
        <div id="nav" style="display: none;">
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
                <img height="240px" width="100%" src="./src imgs/guide de voyage.jpg" alt="guide de voyage">
            
            <H1>Le titre de site de voyages</H1>
        </header>
        
        <section>
            <h3>Recherche</h3>
            <form  method="POST" >
                <div id="Recherche">
                <div class="contain">
                    <label for="Continent">Continent </label> 
                    <input type="text" id="Continent" name="RContinent" size="10" list="continent">
                         <datalist id="continent">
                             <?php 
                                 listeselect($_SESSION['contient'],'Nomcon');                             
                             ?>
                        </datalist>
                </div>

                <div class="contain">
                    <label for="Ville">Ville </label>  <input list="ville" type="text" id="Ville" name="RVille" >
                        <datalist id="ville" >
                                <?php listeselect($_SESSION['ville'],'Nomvil');?>
                        </datalist>
                </div>

                <div class="contain">
                    <label for="Pays">Pays </label>  <input type="text" id="Pays" name="RPays"  list="pays" >
                    <datalist id="pays" >
                       <?php listeselect($_SESSION['pays'],'Nompay');
                        ?>
                    </datalist>
                </div>

                <div class="contain">
                    <label for="Site">Site </label>  <input type="text" id="Site" name="RSite" placeholder="Casbas">    
                </div>
                </div>           
            
            <button type="submit" id="search" name="valider" >Valider</button>      
             </form>
        </section>

        <section id="search-Result-Section" style="display: block;">
            <span>
                <div class="ligne"></div>
            </span>
            
            </br>

            

            <div id="result">
                <h3>Résultat de la recherche</h3>
                
           
            
                <!-- php code -->
            
          </div>

          <div id="rech">
                <ul id= search-result>
                    <li>
                        <span class="ref" onmousedown = "window.location.href = 'affiche ville.php'">
                            <a href="affiche ville.php" >Alger</a>
                        </span>
                            
                        <span class="icons">
                            <button onclick="alert('hh');"><img src="./src imgs/pen.png" alt="edit"></button>
                            <button onclick=""><img src="./src imgs/trash-bin.png" alt="delete"></button>
                        </span>                
                    </li>

                    <li>
                        
                        <span class="ref" onmousedown = "window.location.href = 'alger'">
                            <a href="alger" ></a>
                        </span>
                        
                        <span class="icons">
                            <button onclick="alert('hh');"><img src="./src imgs/pen.png" alt="edit"></button>
                            <button onclick=""><img src="./src imgs/trash-bin.png" alt="delete"></button>
                       </span>

                    </li>

                    <li>
                        <span class="ref" onmousedown = "window.location.href = 'alger'">
                            <a href="alger" >Alger Alger Alger</a>
                        </span>
                            
                        <span class="icons">
                            <button onclick="alert('hh');"><img src="./src imgs/pen.png" alt="edit"></button>
                            <button onclick=""><img src="./src imgs/trash-bin.png" alt="delete"></button>
                        </span>                        
                    </li>
                </ul>

            </div>
        </section> 
        <section class="goTop" style="display: none;">
            <button id="goTop-button" onclick="window.location.href = '#'"><img src="./src imgs/up-arrow.png" alt="go top"></button>
        </section>
    </div>

    <br>
    <script>
        
                //////

            /* nav fonctions*/
            let isShown = false;
            let clicked = false;
            let element = document.getElementById('job');

            function onclickShowHide(){
                clicked = !clicked;
            }
            
            element.addEventListener("mouseover", function() {
                if (!isShown && !clicked) {
                    showHide();
                }
            });

            element.addEventListener("mouseout", function() {
                if (isShown && !clicked) {
                    showHide();
                }
            });

            
            

            function showHide(){
                isShown = !isShown;
                let nav = document.getElementById('nav');
                let showHide = document.getElementById('show-hide');

                if (isShown) {
                   
                    showHide.innerHTML ='&#10094;';
                  
                    
                    nav.style.display = "block";
                    document.getElementById('job').style.borderRadius  = "25px";
                }else{
                    
                    showHide.innerHTML ='&#10095;';
                    

                    nav.style.display = "none";
                    document.getElementById('job').style.borderRadius  = "100px";
                }
            }

            
            //////
    </script>  
</body>
</html>