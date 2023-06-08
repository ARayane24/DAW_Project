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
  
    <link rel="stylesheet" href="Style.css">

    <!--my web site icon-->
    <link rel="icon" href="./src imgs/png-transparent-hotel-ligarb-tourism-travel-agency-hotel.svg" >
    <!--my web site title-->
    <title>Agence de Voyages</title>
</head>
<body>
    <nav>
        <!--informations des étudiants-->
        <div id="Etudiant">
            <h3>Realisé par :</h3>
            <?php Binom()?>
        </div>
        <div class="ligne"></div></br>
        
        <div id="AjouterVille">
            <a href="./Ajouter ville.php">Ajouter ville</a>
        </div>
    </nav>

    <div id="Bodyleft">
        <!---->
        <header>
                <img height="300px" width="100%" src="./src imgs/guide de voyage.jpg" alt="guide de voyage">
            
            <H1>Le titre de site de voyages</H1>
        </header>
        
        <section>
            <h3>Recherche</h3>
            <form id="Recherche" method="POST" >
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
                            
            
            <button type="submit" id="search" name="valider" >Valider</button>      
             </form>   
        </section>

        <section id="search-Result-Section">
            <div class="ligne"></div>

            <div id="result">
                <h3>Résultat de la recherche</h3>
                <a href="">Resultat de recherche</a>
                <div>
                    <?php rechercher();?>
                </div>
                        
            
          </div>

        </section> 
    
    </div>
    
</body>
</html>