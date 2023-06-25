<?php 
include "API.php"; 
OpenSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="index, monde , explore, vouyage">
    <meta name="description" content="la page principal"/>
  
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
                <!--lien en mode de creation-->
                <a href="./Ajouter ville.php?mode=creation">Ajouter ville</a>
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
                        <input type="text" id="Continent" name="RContinent" size="10" list="continent" onchange="Cascadepays();">
                        <datalist id='continent'>
                            <?php listeselect($_SESSION['continent'],'Nomcon');?>
                        </dataliste>
                    </div>
                    <div class="contain">
                        <label for="Ville">Ville</label>  
                        <input type="text" id="Ville" name="RVille" list="villeL" >
                        <datalist id='villeL'>
                            
                        </dataliste>
                    </div>
                                       
                    <div class="contain">
                        <label for="Pays">Pays</label>  <input type="text" id="Pays" name="RPays" list="PaysL" onchange="CascadeVille();">
                            <datalist id = "PaysL">

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
        <script src="./a_Global_JS.js"></script>  
        <script src="./a_index_JS.js"></script>
        <?php  rechercher(); ?>
        
        <script>
            function CascadeVille(){
                if (document.getElementById("Pays").value!='') {

                    document.getElementById("Ville").value=''; 
                    var TabV = <?php echo json_encode($_SESSION["ville"]) ; ?> ;
                    var TabP = <?php echo json_encode($_SESSION["pays"]) ;?> ;
                    
                    var pays=document.getElementById("Pays").value; 
                    var payss = TabP.find(function(item){
                        return item.Nompay.startsWith(pays);
                    });
                    var NT=TabV.filter(function(elmnt){ 
                    return elmnt.Idpay == payss.Idpay;  
                    });
                
                    var Ville= document.getElementById("villeL");
                    var text;
                    Ville.innerHTML='';
                    for(i=0;i<NT.length;i++){
                        op = document.createElement("option");
                        op.text=NT[i].Nomvil;
                        Ville.append(op);
                    }
                } else document.getElementById("Ville").value=''; 
            }

        function Cascadepays(){
            if (document.getElementById("Continent").value!='') {
                document.getElementById("Ville").value=''; 
                document.getElementById("Pays").value=''; 
                    var TabC = <?php echo json_encode($_SESSION["continent"]) ;?> ;
                    var TabP = <?php echo json_encode($_SESSION["pays"]) ;?> ;
                    var con=document.getElementById("Continent").value;
                    var conti = TabC.find(function(item){
                        return item.Nomcon.startsWith(con);
                    });
                    var NT=TabP.filter(function(elmnt){ 
                    return elmnt.Idcon == conti.Idcon;  
                    });

                    var pays= document.getElementById("PaysL");
                    var text;
                    pays.innerHTML='';
                    for(i=0;i<NT.length;i++){
                        op = document.createElement("option");
                        op.text=NT[i].Nompay;
                        pays.append(op);
                    }
                } else {
                    document.getElementById("Ville").value=''; 
                    document.getElementById("Pays").value=''; 
                }
            }
    </script>
    
</body>
</html>