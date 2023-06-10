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
                <img id="headerImg" height="240px" width="100%" src="./src imgs/guide de voyage.jpg" alt="guide de voyage">
            
            <H1>Le titre de site de voyages</H1>
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

            function preparePage(){
                let Bodyleft = document.getElementById('Bodyleft');
                Bodyleft.style.borderRadius = '15px';
                let headerImg = document.getElementById('headerImg');
                headerImg.style.borderRadius = '15px';
                
            }


            /////
            function deleteVille(x){

                // Créer un objet XMLHttpRequest
                var xhr = new XMLHttpRequest();

                // Définir la méthode et l'URL de la requête
                xhr.open("POST", "API.php", true);

                // Définir l'en-tête de la requête
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                console.log(x);

                // Envoyer la requête avec la valeur en tant que paramètre
                xhr.send("x=" + encodeURIComponent(x));
                alert("la ville que vous avez selectionnee a ete supprimee" + x);
                location.reload();
            }
    </script>  
</body>
</html>