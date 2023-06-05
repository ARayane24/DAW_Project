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
</head>
<body>
    <nav>
        
        <div id="Etudiant">
            <h3>Realisé par :</h3>
            <?php include "binom.php";?>
        </div>

        <div class="ligne"></div> </br>

        <div id="AjouterVille">
            <a href="./index.php">page d’accueil</a>
        </div>
    </nav>
    
    <div id="Bodyleft">
        <!---->
        <header>
            <img height="300px" width="100%" src="./src imgs/guide de voyage.jpg" alt="guide de voyage">
            <H1>Le titre de site de voyages</H1>
        </header>

        <section>
            <h3>Ajouter une Ville</h3>
            <form id="Recherche-info" method="POST" action="postGet.php">
                <div id="main-info">
                  <?php include "AddContinent.php"?>  
                </div>

                <div class="ligne"></div> <br>

                <h4>plus de details</h4>

                

                <div id="tourist-areas">
                    <div class="contain">
                        <label for="Hôtels">Hôtels </label> <input type="text" id="Hôtels" name="Hôtels" size="20">
                        <button id="add" onclick="" name="add">Ajouter</button>
                        <select name="Hôtels" size="5" multiple>  
                            <option value="Hôtel1"> Hôtel1 </option>  
                            <option value="Hôtel2"> Hôtel2 </option>  
                            <option value="Hôtel3"> Hôtel3 </option>   
                        </select> 
                    </div>
                    <div class="contain">
                        <label for="Restaurants">Restaurants </label>  <input type="text" id="Restaurants" name="Restaurants" size="20">
                        <button id="add" onclick="" name="add">Ajouter</button>
                        <select name="Restaurants" size="5" multiple>  
                            <option value="Restaurant1"> Restaurant1 </option>  
                            <option value="Restaurant2"> Restaurant2 </option>  
                            <option value="Restaurant3"> Restaurant3 </option>   
                        </select> 
                    </div>
                    <div class="contain">
                        <label for="Gares">Gares </label>  <input type="text" id="Gares" name="Gares" size="20">
                        <button id="add" onclick="" name="add">Ajouter</button>
                        <select name="Gares" size="5" multiple>  
                            <option value="Gare1"> Gare1 </option>  
                            <option value="Gare2"> Gare2 </option>  
                            <option value="Gare3"> Gare3 </option>   
                        </select> 
                    </div>
                    <div class="contain">
                        <label for="Aéroports">Aéroports </label>  <input type="text" id="Aéroports" name="Aéroports" size="20">
                        <button id="add" onclick="" name="add">Ajouter</button>
                        <select name="Aéroports" size="5" multiple>  
                            <option value="Aéroport1"> Aéroport1 </option>  
                            <option value="Aéroport2"> Aéroport2 </option>  
                            <option value="Aéroport3"> Aéroport3 </option>   
                        </select> 
                    </div>
                </div>
                
                <button id="add" onclick="" name="add">Ajouter</button>
            </form>  
            
            </br>
            
        </section>

    </div>
</body>
</html>