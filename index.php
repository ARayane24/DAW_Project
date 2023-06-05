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
            <?php include "binom.php";?>
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
            <form id="Recherche" method="POST" action="postGet.php">
                <div class="contain">
                    <label for="Continent">Continent </label> <input type="text" id="Continent" name="Continent" size="10" list="continent" required>
                        <datalist id="continent">
                            <option value="Afrique">  
                            <option value="Amérique">
                            <option value="Antarctique">
                            <option value="Asie">
                            <option value="Europe">
                            <option value="Océanie">
                        </datalist>
                </div>
                <div class="contain">
                    <label for="Ville">Ville </label>  <input type="text" id="Ville" name="Ville">
                </div>
                <div class="contain">
                    <label for="Pays">Pays </label>  <input type="text" id="Pays" name="Pays">
                </div>
                <div class="contain">
                    <label for="Site">Site </label>  <input type="text" id="Site" name="Site" placeholder="Casbas">    
                </div>

                
            </form>  
            <button id="search" onclick="validerAnnuleButton()" name="search">Valider</button>
            </br>         
        </section>

        <section id="search-Result-Section" style="display: none;">
            <div class="ligne"></div>
            </br>

            

            <div id="result">
                <h3>Résultat de la recherche</h3>
                <a href="">Resultat de recherche</a>
            </div>

            
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur delectus in aliquid laudantium totam iusto ducimus eos ullam maiores eius. A officia mollitia iste eum unde placeat asperiores laboriosam quia, hic nisi enim facilis repudiandae laudantium esse consectetur, sit est maxime necessitatibus quidem! Accusamus ducimus, modi minima nostrum iusto ab repellat voluptate aperiam ea labore velit non enim iure corporis. Magni id, nisi ipsa dolorum temporibus distinctio molestiae eum recusandae laudantium eius deserunt amet eligendi, dolor assumenda dolorem tempora? Nulla culpa nobis, magnam sequi quod, delectus magni rem a qui ex aliquid, ipsa repellat molestiae optio repellendus eveniet provident ducimus?
        </section> 
    
    </div>
    
    
    </br>

    <script type="text/javascript">
        // add random placeholder --> for the search inputs
        // add using dom the ability to hide results section from the main until the users click the search button 
        
        function validerAnnuleButton(){
            if (document.querySelector('#search').textContent === 'Valider') {
                showResultSection();
            }else{
                annuleSearch();
            }
        }

        
        
        function showResultSection(){

            let input1 = readData(0) === "";
            let input2 = readData(1) === "";
            let input3 = readData(2) === "";
            let input4 = readData(3) === "";

            if (input1 && input2 && input3 && input4) {
                alert('nothing to search for !! ');
            }else{
              
                    document.querySelector('#search-Result-Section').style.display = '';
                    document.querySelector('#search').textContent = "Annule";
            }
            
            
            
        }

        
        function readData(i) {
            let input = document.getElementsByTagName("input")[i].value;
            return input;
        }

        function annuleSearch(){
            document.getElementById('Recherche').reset();

            document.querySelector('#search').textContent = "Valider";
            document.querySelector('#search-Result-Section').style.display = 'none';
        }
        

    </script>
</body>
</html>