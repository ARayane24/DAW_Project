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
            <div id="show">
                <!-- Full-width images -->
                <div class="mySlides fade" id="id1" >
                    <img  height="260px" width="100%" src="./src imgs/desert 1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade" id="id2" >
                    <img height="260px" width="100%" src="./src imgs/Alaska-itinerary-flowersglacier-3068918376.jpg" style="width:100%">
                </div>

                <div class="mySlides fade" id="id3" >
                    <img height="260px" width="100%" src="./src imgs/city at night" style="width:100%">
                </div>
                
                <div class="mySlides fade" id="id4" >
                    <img height="260px" width="100%" src="./src imgs/see.jpg" style="width:100%">
                </div>

                <div class="mySlides fade" id="id5" >
                    <img height="260px" width="100%" src="./src imgs/ice.jpg" style="width:100%">
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
                /* header imges */
            let h =document.getElementById('h');
            let img1 = document.getElementById('id1');
            let img2 =document.getElementById('id2');
            let img3 =document.getElementById('id3');
            let img4 =document.getElementById('id4');
            let img5 =document.getElementById('id5');
            
            let img1Hover = false;
            let img2Hover = false;
            let img3Hover = false;
            let img4Hover = false;
            let img5Hover = false;

            function hideAll() {
                 img1.style.display = 'none';
                 img2.style.display = 'none';
                 img3.style.display = 'none';
                 img4.style.display = 'none';
                 img5.style.display = 'none';
            }

            function showAll() {
                 img1.style.display = 'block';
                 img2.style.display = 'block';
                 img3.style.display = 'block';
                 img4.style.display = 'block';
                 img5.style.display = 'block';

                img1.style.width = '100%';
                img1.style.left = '-1%';


                img2.style.width = '100%';
                img2.style.left = '-1%';

                img3.style.width = '100%';
                img3.style.left = '-1%';
                

                img4.style.width = '100%';
                img4.style.left = '-1%';


                img5.style.width = '100%';
                img5.style.left = '-1%';

                
                
            }

            img1.addEventListener("mouseover", function() {
              img1Hover = !img1Hover;
              
                hideAll();
                img1.style.display = 'block';
                img1.style.width = '100%';
                img1.style.left = '0%';
              
            });

            img2.addEventListener("mouseover", function() {
              img2Hover = !img2Hover;
                hideAll();
                img2.style.display = 'block';
                img2.style.width = '100%';
                img2.style.left = '0%';              
            });
            
            img3.addEventListener("mouseover", function() {
              img3Hover = !img3Hover;
                hideAll();
                img3.style.display = 'block';
                img3.style.width = '100%';
                img3.style.left = '0%';
            });

            h.addEventListener("mouseover", function() {
                hideAll();
                img3.style.display = 'block';
                img3.style.width = '100%';
                img3.style.left = '0%';
                img3.style.transform = 'skew(0)';
                img3.style.margin = '0px';
            });

            img4.addEventListener("mouseover", function() {
              img4Hover = !img4Hover;
                hideAll();
                img4.style.display = 'block';
                img4.style.width = '100%';
                img4.style.left = '0%';
              
            });

            img5.addEventListener("mouseover", function() {

              img5Hover = !img5Hover;
                hideAll();
                img5.style.display = 'block';
                img5.style.width = '100%';
                img5.style.left = '0%';
            });


            img1.addEventListener("mouseout", function() {
                if( !img2Hover || !img3Hover || !img4Hover || !img5Hover)
                    showAll();
              
            });

            img2.addEventListener("mouseout", function() {
                if(!img1Hover || !img3Hover || !img4Hover || !img5Hover)
                showAll();
            });
            
            img3.addEventListener("mouseout", function() {
                if(!img1Hover || !img2Hover || !img4Hover || !img5Hover){
                    img3.style.transform = 'skew(15deg)';
                    showAll();
                }
                
            });

            h.addEventListener("mouseout", function() {
                if(!img3Hover){
                    img3.style.transform = 'skew(15deg)';
                    showAll();
                }
                
            });

            img4.addEventListener("mouseout", function() {
                if(!img1Hover || !img2Hover || !img3Hover || !img5Hover)
                showAll();
            });

            img5.addEventListener("mouseout", function() {
                if(!img1Hover || !img2Hover || !img3Hover || !img4Hover)
                showAll();
            });

            //////

            function preparePage(){
                let Bodyleft = document.getElementById('Bodyleft');
                Bodyleft.style.borderRadius = '15px';
                let headerImg = document.getElementById('show');
                headerImg.style.borderRadius = '15px';
                
            }

            //////

            function goTop(){
                return window.location.href = '#';
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
                alert("la ville que vous avez selectionnee a ete supprimee");
                location.reload();
            }
    </script>  
</body>
</html>