<?php include "API.php";
OpenSession();
if(modification()){$a = getData($_GET['idville']);}
if (isset($a)) {
    $GLOBALS['a'] = $a;
}


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
                        <input type="text" id="Continent" name="Continent" maxlength="10" list="continent"  value = '<?php  if(modification()){echo"".$GLOBALS['a'][0]['nomcon']; }?>' required>
                        <datalist id='continent'>
                            <?php listeselect($_SESSION['contient'],'Nomcon');?>
                        </dataliste>

                        <button type="button" onclick="openDialog('DialogAddPays')">Ajouter Continent</button>
                    </div>
                    <div class="contain">
                        <label for="Ville">Ville</label>  <input type="text" id="Ville" name="Ville2" maxlength="10" list="ville" value='<?php if(modification()){echo"".$GLOBALS['a'][0]['nomvil'];} ?>' required>
                    </div>
                                       
                    <div class="contain">
                            <label for="Pays">Pays</label>
                            <input type="text" id="Pays" name="Pays" list="pays" maxlength="10" value = '<?php if(modification()){ echo"".$GLOBALS['a'][0]['nompay'];} ?>' required>
                            <datalist id = "pays">
                                <?php listeselect($_SESSION['pays'],'Nompay'); ?>
                            </datalist>

                            <button type="button" onclick="openDialog('DialogAddPays')">Ajouter pays</button>    
                    </div>

                    <div class="contain">
                        <label for="Site">Site </label>  <input type="text" id="Site" name="Site" maxlength="10" placeholder="Casbas" value = '<?php if(modification()){ echo"".$GLOBALS['a'][0]['nompay'];} ?>' required>    
                    </div>
                </div>

                <div id="details">
                    <div class="contain">
                        <label for="Descriptif">Descriptif</label> <br>
                        <textarea id="Descriptif" name="Descriptif" placeholder="description" maxlength="255" value = '' required><?php if(modification()){echo"".$GLOBALS['a'][0]['descvil'];} ?></textarea>        
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
                        <label for="Hôtels">Hôtels </label> <input type="text" id="Hôtels" name="Hôtels" maxlength="20">
                        <button type="button" id="add" onclick="addDetails('Hôtels');" name="add">Ajouter</button>
                        <select id="selectHôtels" name="hotles[]" size="5" multiple>  
                            <option value="Hôtel1"> Hôtel1 </option>  
                            <option value="Hôtel2"> Hôtel2 </option>  
                            <option value="Hôtel3"> Hôtel3 </option>   
                        </select> 
                    </div>
                    <div class="contain">
                        <label for="Restaurants">Restaurants </label>  <input type="text" id="Restaurants" name="Restaurants" maxlength="20">
                        <button type="button" id="add" onclick="addDetails('Restaurants');" name="add">Ajouter</button>
                        <select id="selectRestaurants" name="Restaurantss[]" size="5" multiple>  
                            <option value="Restaurant1"> Restaurant1 </option>  
                            <option value="Restaurant2"> Restaurant2 </option>  
                            <option value="Restaurant3"> Restaurant3 </option>   
                        </select> 
                    </div>
                    <div class="contain">
                        <label for="Gares">Gares </label>  <input type="text" id="Gares" name="Gares" maxlength="20">
                        <button type="button" id="add" onclick="addDetails('Gares');" name="add">Ajouter</button>
                        <select id="selectGares" name="Garess[]" size="5" multiple>  
                            <option value="Gare1"> Gare1 </option>  
                            <option value="Gare2"> Gare2 </option>  
                            <option value="Gare3"> Gare3 </option>   
                        </select> 
                    </div>
                    <div class="contain">
                            <label for="Aéroports">Aéroports </label>  <input type="text" id="Aéroports" name="Aéroports" maxlength="20">
                            <button type="button" id="add" onclick="addDetails('Aéroports');" name="add">Ajouter</button>
                            <select id="selectAéroports" name="Aeroports[]" size="5" multiple>  
                                <option value="Aéroport1"> Aéroport1 </option>  
                                <option value="Aéroport2"> Aéroport2 </option>  
                                <option value="Aéroport3"> Aéroport3 </option>   
                            </select> 
                    </div>
                </div>
                <input type="hidden" name="mode" value="<?php if(modification()) echo "modification"; ?>">
                <button id="add" type="submit" name="add">Submit</button>
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