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
            <h3>Ajouter une Ville</h3>
            <form id="Recherche-info" method="POST" enctype = "multipart/form-data" action="API.php">
                <div id="main-info">
                    <div class="contain">
                        <label for="Continent">Continent</label> 
                        <input type="text" id="Continent" name="Continent" size="10" list="continent" required>
                        <datalist id='continent'>
                            <?php listeselect($_SESSION['contient'],'Nomcon');?>
                        </dataliste>
                    </div>
                    <div class="contain">
                        <label for="Ville">Ville</label>  <input type="text" id="Ville" name="Ville2" size="10" list="ville"  required>
                    </div>
                                       
                    <div class="contain">
                        <label for="Pays">Pays</label>  <input type="text" id="Pays" name="Pays" list="pays" size="10" required>
                            <datalist id = "pays">
                                <?php listeselect($_SESSION['pays'],'Nompay'); ?>
                            </datalist>
                    </div>

                    <div class="contain">
                        <label for="Site">Site </label>  <input type="text" id="Site" name="Site" size="10" placeholder="Casbas" required>    
                    </div>
                </div>

                <button id="add" onclick="search();" name="add">Recherche</button>

                <br>
                <div class="ligne" id="ligne" style="display: none;"></div></br>
             </form>  
            
        </section>
        
        

        <section id="search-Result-Section" style="display: none;">
    
        
            <div id="rech">
            <h3>Résultat de la recherche</h3>
                    <ul id= search-result>

                        <!-- php code -->
                        <!-- search results -->

                        <li>
                            <span class="ref" onmousedown = "window.location.href = 'affiche ville.php'">
                                <a href="affiche ville.php" >Alger</a>
                            </span>
                                
                            <span class="icons">
                                <button onclick="alert('hh');"><img src="./src imgs/pen.png" alt="edit"></button>
                                <button onclick="deleteVille()"><img src="./src imgs/trash-bin.png" alt="delete"></button>
                            </span>                
                        </li>

                        <li>
                            
                            <span class="ref" onmousedown = "window.location.href = 'alger'">
                                <a href="alger" ></a>
                            </span>
                            
                            <span class="icons">
                                <button onclick="alert('hh');"><img src="./src imgs/pen.png" alt="edit"></button>
                                <button onclick="deleteVille()"><img src="./src imgs/trash-bin.png" alt="delete"></button>
                        </span>

                        </li>

                        <li>
                            <span class="ref" onmousedown = "window.location.href = 'alger'">
                                <a href="alger" >Alger Alger Alger</a>
                            </span>
                                
                            <span class="icons">
                                <button onclick="alert('hh');"><img src="./src imgs/pen.png" alt="edit"></button>
                                <button onclick="deleteVille()"><img src="./src imgs/trash-bin.png" alt="delete"></button>
                            </span>                        
                        </li>
                    </ul>
                
            </div>
        </section> 
        <section id="goTop" style="display: none;">
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

            function search(){
                let input1 = document.getElementById('Continent').value;
                let input2 = document.getElementById('Ville').value;
                let input3 = document.getElementById('Pays').value;
                let input4 = document.getElementById('Site').value;
                if (input1 || input2 || input3 || input4) {
                    preparePage(); // show where the search result will be shown
                }
            }

            function preparePage(){
                let Bodyleft = document.getElementById('Bodyleft');
                Bodyleft.style.borderRadius = '15px';
                let headerImg = document.getElementById('headerImg');
                headerImg.style.borderRadius = '15px';

                let searchResult = document.getElementById('search-Result-Section');
                let searchResult1 = document.getElementById('ligne');
                let searchResult2 = document.getElementById('goTop');
                searchResult.style.display = 'block';
                searchResult1.style.display = 'block';
                searchResult2.style.display = 'block';
            }


            /////
            function deleteVille(){
                /* code php pour supprimer ville */
                alert("la ville que vous avez selectionnee a ete supprimee");
            }
    </script>  
</body>
</html>