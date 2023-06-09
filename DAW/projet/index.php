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
    
    <style>
            #rech{ 
                margin: 10px;
                padding: 20px;
                width: 98%;
            }


            #search-result>li{
                margin: 10px;
                display:flex;

                justify-content: space-between;
                border: solid;
                border-style: 30px solid;
                border-radius: 30px;

                /* Add shadows to create the "card" effect */
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: .3s; 
            
            }

            #search-result a {
                height: 40px;
                font-style: black;
                padding: 14px 16px;
                font-size: 30px;
            }
            

            #search-result img {
                margin: 6%;
                width: 40px;
                height: 40px;
                
                float: right;
            }


            #search-result .icons{
                width: 20%;
                margin: 3px;
                margin: 10px;
                float: right;
                display: flex;
                justify-content: center;
            }

            #search-result button{
                border: none;
                background: none;
            }

            /* Change the color of links on hover */
            #search-result li:hover {
                border-radius: 15px;
                background-color: #d4edffc0;
                font-style: black;
            }


            #search-result .ref{
                width: 70%;
                padding-left: 10px;
                margin-top: 15px;
            }
    </style>
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
 
                <div id="rech">
                    <?php rechercher();?>
                </div>
            </div>
        </section> 
    
    </div>
    <script>
    </script>  
</body>
</html>