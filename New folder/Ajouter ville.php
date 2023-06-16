<?php include "./API.php";
OpenSession();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="modifier , ajouter , ville ">
    <meta name="description" content="cette page est pour ajouter ou modifier les villes "/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <link rel="stylesheet" href="./a_Global_CSS.css">
    <link rel="stylesheet" href="./b_Ajouter ville_CSS.css">

    <!--my web site icon-->
    <link rel="icon" href="./src imgs/png-transparent-hotel-ligarb-tourism-travel-agency-hotel.svg" >
    <!--my web site title-->
    <title>Ajouter Ville</title>
</head>
<body id='wallpaper'>
    <nav id="job" onclick="onclickShowHide()">
        <div>
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
    
    <div id="Bodyleft" >
        <!---->
        <header>
            <div id="show" >
                <!-- Full-width images -->
                <div class="mySlides fade" id="id1"  onmousedown="theme('red');">
                    <img  height="260px" width="100%" src="./src imgs/desert 1.jpg" >
                </div>

                <div class="mySlides fade" id="id2"  onmousedown="theme('green');">
                    <img height="260px" width="100%" src="./src imgs/Alaska-itinerary-flowersglacier-3068918376.jpg" >
                </div>

                <div class="mySlides fade" id="id3"  onmousedown="theme('red');">
                    <img height="260px" width="100%" src="./src imgs/city at night" >
                </div>
                
                <div class="mySlides fade" id="id4"  onmousedown="theme('blue');">
                    <img height="260px" width="100%" src="./src imgs/see.jpg" >
                </div>

                <div class="mySlides fade" id="id5"  onmousedown="theme('default');">
                    <img height="260px" width="100%" src="./src imgs/ice.jpg" >
                </div>
            </div>
            <H1 id="h">Explore le monde</H1>
        </header>

        <section>    
            <h3>Ajouter une Ville</h3>
            
            <form id="Recherche-info" method="POST" enctype = "multipart/form-data" action="API.php">
                <div id="main-info">
                    <div class="contain">
                        <label for="Continent">Continent</label> 
                        <input type="text" id="Continent" name="Continent" maxlength="10" list="continent"  value = '<?php  getData('nomcon'); ?>' required>
                        <datalist id='continent'>
                            <?php listeselect($_SESSION['contient'],'Nomcon');?>
                        </dataliste>

                        <button type="button" onclick="">Ajouter Continent</button>
                    </div>
                    <div class="contain">
                        <label for="Ville">Ville</label>  <input type="text" id="Ville" name="Ville2" maxlength="10" list="ville" value='<?php getData('nomvil'); ?>' required>
                    </div>
                                       
                    <div class="contain">
                            <label for="Pays">Pays</label>
                            <input type="text" id="Pays" name="Pays" list="pays" maxlength="10" value = '<?php getData('nompay');?>' required>
                            <datalist id = "pays">
                                <?php listeselect($_SESSION['pays'],'Nompay'); ?>
                            </datalist>

                            <button type="button" onclick="openDialog('DialogAddPays')">Ajouter pays</button>    
                    </div>

                    <div class="contain">
                        <label for="Site">Site </label>  <input type="text" id="Site" name="Site" maxlength="10" placeholder="Casbas" value = '<?php getData('nompay'); ?>' required>    
                    </div>
                </div>

                <div id="details">
                    <div class="contain">
                        <label for="Descriptif">Descriptif</label> <br>
                        <textarea id="Descriptif" name="Descriptif" placeholder="description" maxlength="255"  required><?php getData('descvil'); ?></textarea>        
                    </div>
                    <div class="contain">
                        <label for="Photos">Photos </label> <br>
                        <input type="file" id="Photos" name="Photos" multiple="multiple" placeholder="photo1.png" required>
      
                    </div>
                </div>

                <div class="ligne"></div></br>

                <h4>plus de details</h4>
                
                <div id="tourist-areas">
                    <div class="contain">
                        <label for="Hotel">Hôtels </label> <input type="text" id="Hotel" name="Hotel" maxlength="20">
                        <button type="button" id="add" onclick="addDetails('Hotel');" name="add">Ajouter</button>
                        <select id="selectHôtels" name="Hotels[]" size="5" multiple></select> 
                    </div>
                    <div class="contain">
                        <label for="Restaurant">Restaurants </label>  <input type="text" id="Restaurant" name="Restaurant" maxlength="20">
                        <button type="button" id="add" onclick="addDetails('Restaurant');" name="add">Ajouter</button>
                        <select id="selectRestaurants" name="Restaurants[]" size="5" multiple></select> 
                    </div>
                    <div class="contain">
                        <label for="Gare">Gares </label>  <input type="text" id="Gare" name="Gare" maxlength="20">
                        <button type="button" id="add" onclick="addDetails('Gare');" name="add">Ajouter</button>
                        <select id="selectGares" name="Gares[]" size="5" multiple></select> 
                    </div>
                    <div class="contain">
                            <label for="Aeroport">Aeroports </label>  <input type="text" id="Aeroport" name="Aeroport" maxlength="20">
                            <button type="button" id="add" onclick="addDetails('Aeroport');" name="add">Ajouter</button>
                            <select id="selectAeroports" name="Aeroports[]" size="5" multiple></select> 
                    </div>
                </div>
                <input type="hidden" name="mode" value="<?php if(modification()) echo "modification"; ?>">
                <input type="hidden" name="idville_toEdit" value="<?php if(modification()) echo "".$_GET['idville']; ?>">
                <button id="add" type="submit" name="add"><?php if(modification()) echo "modifier";  else echo "ajouter";?></button>
             </form>  
            
        </section>
    </div> 

        <dialog id="DialogAddPays" >
            <form method="POST" action="API.php">
                <h2>Ajouter Pays</h2>
                    <div class="contain">
                    <label for="ContinentPays">Continent  </label><input type="text" name="ContinentPays" maxlength="10" list="continent" required>
                        <datalist id='continent'>
                            <?php listeselect($_SESSION['contient'],'Nomcon');?>
                        </dataliste>
                    </div>
                    
                        <div class="contain">
                            <label for="addPays">Pays  </label> <input type="text"  name="addPays" maxlength="10" required>
                        </div>
                    
                    <button onclick="closeDialogADD('DialogAddPays');">ADD</button>
                    <button onclick="closeDialog('DialogAddPays');">Cancel</button>            
                </form>
        </dialog> 
                         
    
    <script src="./a_Global_JS.js"></script>
    <script src="./a_index_JS.js"></script>  
</body>
</html>