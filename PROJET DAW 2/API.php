<?php


session_start();

/* les fonctions de connection  */
function connecter()
{
    // connect a la base de donne
    return new mysqli('localhost', 'root', '', 'voyage',3308);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['mode']) && $_POST['mode'] == 'modification') {
        /* le cas de modification */
        if (isset($_POST['idville_toEdit'])) {
            updateAll($_POST['idville_toEdit']);
        }
       
    } else {
        /* le cas de creation */
        if (isset($_POST['ContinentPays']))
            insertpays();

        if (isset($_POST['addContinent']))
            insertContinant();

        if (isset($_POST['Continent']))
            insertVille();
    }

    if (isset($_POST['x']))
        supprimerVille($_POST['x']);

    if (isset($_POST['Idvilnec']) && isset($_POST['Typenec'])) {
        recherchNaiss();
    }

    if (isset($_POST['y']))
        supprimerNaiss($_POST['y']);
}


/* les fonctions d'insertion */
function insertContinant()
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $continant = $_POST['addContinent'];

        if ($continant != "") {
            $query = "INSERT into continent(nomcon) values ('$continant');";
            $result = mysqli_query($connect, $query);
        }
    }
    header("Location: Ajouter ville.php");
    exit;
}

function insertpays()
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $continant = $_POST['ContinentPays'];
        $pays = $_POST['addPays'];

        if ($continant != "" and $pays != "") {

            foreach ($_SESSION["continent"] as $i) {
                if ($i['Nomcon'] === $continant) {
                    break;
                }
            }
            $continant = $i['Idcon'];

            $query = "INSERT into pays(idcon,nompay) values ('$continant','$pays');";
            $result = mysqli_query($connect, $query);
        }
    }
    header("Location: Ajouter ville.php");
    exit;
}

function insertVille()
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $pays = $_POST['Pays'];
        $ville = $_POST['Ville2'];
        $Descriptif = $_POST['Descriptif'];

        if ($ville != "" and $pays != "") {
            foreach ($_SESSION["pays"] as $i) {
                if ($i['Nompay'] === $pays) {
                    break;
                }
            }
           $pays = $i['Idpay'];

            /* insert ville details */
            $query = "INSERT INTO ville( Nomvil, descvil, Idpay) VALUES ('$ville','$Descriptif','$pays');";
            mysqli_query($connect, $query);

            $idvil = mysqli_insert_id($connect);

            /* insert site */
            if (isset($_POST['Sites'])) {
                insertSite($idvil ,$_POST['Photos'],$_POST['Sites']);
            }

            

            /* insert les 4 necessaire */
            if (isset($_POST['Hotels'])) {
                $hotel = $_POST['Hotels'];
                if ($hotel != '') {
                    foreach ($hotel as $i) {
                        insertNaiss($idvil, $i, 'Hotel');
                    }
                }
            }

            if (isset($_POST['Restaurants'])) {
                $restaurant = $_POST['Restaurants'];
                if ($restaurant != '') {
                    foreach ($restaurant as $i) {
                        insertNaiss($idvil, $i, 'Restaurant');
                    }
                }
            }

            if (isset($_POST['Gares'])) {
                $gares = $_POST['Gares'];
                if ($gares != '') {
                    foreach ($gares as $i) {
                        insertNaiss($idvil, $i, 'Gare');
                    }
                }
            }

            if (isset($_POST['Aeroports'])) {
                $Aeroports = $_POST['Aeroports'];
                if ($Aeroports != '') {
                    foreach ($Aeroports as $i) {
                        insertNaiss($idvil, $i, 'Aeroport');
                    }
                }
            }   
        }
    }
    header("Location: index.php");
}

function insertNaiss($idvil, $name, $type)
{
    $connect = connecter();
    $query = "INSERT INTO necessaire (typenec,nomnec,Idvil) Values ('$type','$name','$idvil');";
    $result = mysqli_query($connect, $query);
}

function insertSite($idvil , $photo , $site)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        

        if ($photo != "" and $site != "") {

            if (is_array($photo) && is_array($site)) {
                $photo = array_values($photo);
                $site = array_values($site);

            
                for ($i=0; $i < sizeof($photo); $i++) { 
                     $query = "INSERT into site(cheminphoto,nomsit,idvil) values ('$photo[$i]','$site[$i]',$idvil);";
                     $result = mysqli_query($connect, $query);
                     echo"<br> <h1>hhhhhhhhhhhhhhhhhh</h1> <br>";
                }
            }else{
                $query = "INSERT into site(cheminphoto,nomsit,idvil) values ('$photo','$site',$idvil);";
                $result = mysqli_query($connect, $query);
            }
        }
    }
}

/* les fonctions d'update */

function updateAll($idvil)
{
    $connexion = connecter();
    
    if (!($connexion)) {
        echo 'vide';
    } else {
        $sql1 = "SELECT continent.idcon , pays.idpay , site.idsit
                FROM ((( continent join pays on continent.idcon = pays.idcon) join ville on pays.idpay = ville.idpay ) join site on ville.idvil = site.idvil) 
                WHERE ville.idvil=$idvil; ";
        $sql = $connexion->query($sql1);
        $sql1 = $connexion->query($sql1)->fetch_assoc();

        if ($sql1) {
            
            if (isset($_POST['Continent']))
                updateContinant($sql1['idcon']);echo"<h1>update donne!! </h1>" ;  // update site
                // update continant

            if (isset($_POST['Pays']))
                updatepays($sql1['idpay']);echo"<h1>update donne!! </h1>" ;  // update site
                // update pays
            
            if (isset($_POST['Ville2']))
                updateVille($idvil);echo"<h1>update donne!! </h1>" ;  // update site
                // update ville
            
            $result = array(); // make a new array to hold all your data


            $index = 0;                 
            while($row = $sql->fetch_assoc()) {
                $result[$index] = $row['idsit'];
                $index++;                  
            }

            if (isset($_POST['Site']))print_r($sql);
                updateSite($result, $idvil);  echo"<h1>update donne!! </h1>" ;  // update site
    

            

            $arrayTypeNec = array('Aeroport', 'Restaurant', 'Hotel', 'Gare');
            foreach ($arrayTypeNec as $type){
                echo "<br>";
                $sql = "SELECT necessaire.idnec 
                        FROM (ville join necessaire on ville.idvil=necessaire.idvil)
                            where ville.idvil=$idvil and necessaire.typenec = '$type'; "; //avoir tablue de nec de meme type de cette ville
                
                $sql = $connexion->query($sql);

                $result = array(); // make a new array to hold all your data


                $index = 0;                 
                while($row = $sql->fetch_assoc()) {
                    $result[$index] = $row;
                    $index++;                  
                }
                
            
                if (isset($_POST[ $type."s" ])){
                   updateNaiss($idvil ,$result, $type);  // update nec de chaque type
                }    
            }
        }     
    }
}

function updateContinant($idcon)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $continant = $_POST['Continent']; 
        $query = "UPDATE continent SET nomcon = '$continant' WHERE idcon = $idcon ;"; 
        $result = mysqli_query($connect, $query);    
    }
}

function updatepays($idpays)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {    
        $pay = $_POST['Pays'];
        $query = "UPDATE pays SET nompay = '$pay' WHERE idpay = $idpays ;";
        $result = mysqli_query($connect, $query);
    }
}

function updateVille($idvil)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $ville = $_POST['Ville2'];
        $query = "UPDATE ville SET nomvil = '$ville' WHERE idvil = $idvil ;";
        $result = mysqli_query($connect, $query);

    }

}

function updateSite($idsite, $idville)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $site = $_POST['Sites'];
        $photos = $_POST['Photos'];

        echo"<br> <h5>hhhhhhhhhhhhhhhhhh</h5> <br>";
        print_r($photos);
        echo"<br> <h5>hhhhhhhhhhhhhhhhhh</h5> <br>";
        print_r($site);
        echo"<br> <h5>hhhhhhhhhhhhhhhhhh</h5> <br>";
                        print_r($idsite);

        if ($site  && $photos) {
            if (is_array($idsite)) {
                $idsite = array_values($idsite);
                for ($i=0; $i < sizeof($site); $i++) { 
                    /* pour chaque element de nec de meme type va avoir un new valuer */
                    if ($i >= sizeof($idsite) ) {
                        insertSite($idville, $photos[$i] ,$site[$i] ); // si le nombre de new element est grand que le nbr des element presedant
                    }else{
                        $query = "UPDATE site SET nomsit = '$site[$i]' , cheminphoto = '$photos[$i]'  WHERE idsit = $idsite[$i] ;";
                        $result = mysqli_query($connect, $query);

                        echo"<br> <h5>hhhhhhhhhhhhhhhhhh</h5> <br>";
                        print_r($idsite[$i]);
                    }
                }
            }else{

                // one value in the previous version
                if ( ! is_array($photos)) {
                    $query = "UPDATE site SET nomsit = '$site' , cheminphoto = '$photos'  WHERE idsit = $idsite ;";
                    $result = mysqli_query($connect, $query);
                }else {
                    for($i = 0 ; $i<sizeof($photos); $i++){
                        insertSite($idville, $photos[$i] ,$site[$i] ); // si le nombre de new element est grand que le nbr des element presedant
                    }
                }
            }
        }
    }
}

function updateNaiss($idvil , $idsnec, $type)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $newNecName = $_POST[$type."s"];
        
        $i = 0;

        if ($newNecName) {
            if (is_array($idsnec)) {
                // lot of values in the previous version
                $idsnec = array_values($idsnec);
                for($i = 0 ; $i<sizeof($newNecName); $i++){
                    /* pour chaque element de nec de meme type va avoir un new valuer */
                    if ($i >= sizeof($idsnec) ) {
                        insertNaiss($idvil,$newNecName[$i],$type); // si le nombre de new element est grand que le nbr des element presedant
                    }else{
                        $id = $idsnec[$i]['idnec'];
                        $query = "UPDATE necessaire SET nomnec = '$newNecName[$i]' WHERE idnec = $id ;";
                        $result = mysqli_query($connect, $query);
                    }
                    
                }
            }else{
                // one value in the previous version
                if ( ! is_array($newNecName) && $idsnec) {
                    $query = "UPDATE necessaire SET nomnec = '$newNecName' WHERE idnec = $idsnec[0]['idnec'];";
                    $result = mysqli_query($connect, $query);
                }else {
                    for($i = 0 ; $i<sizeof($newNecName); $i++){
                       
                        insertNaiss($idvil,$newNecName[$i],$type); // si le nombre de new element est grand que le nbr des element presedant
                        
                    }
                }
                
            }
        } 
    }
}




///
function OpenSession()
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $sql2 = $connect->query("SELECT * FROM continent ORDER BY Nomcon ASC;");
        $_SESSION["continent"] = $sql2->fetch_all(MYSQLI_ASSOC);

        $sql2 = $connect->query("SELECT * FROM pays ORDER BY Nompay ASC;");
        $_SESSION["pays"] = $sql2->fetch_all(MYSQLI_ASSOC);

        $sql2 = $connect->query("SELECT * FROM ville ORDER BY Nomvil ASC;");
        $_SESSION["ville"] = $sql2->fetch_all(MYSQLI_ASSOC);
    }
}

function listeselect($table, $code)
{
    echo "";
    foreach ($table as $i) {
        echo "<option value='" . $i[$code] . "'> </option>";
    }
}


/*  les fonctions de recherche */

function recherchNaiss()
{
    $connect = connecter();
    if ($connect) {
        $naiss = $_SESSION['Session'];
        $idvil = $naiss['Idvil'];
        if (isset($_GET['lien'])) {
            $arrayTypeNec = array('Aeroport', 'Restaurant', 'Hotel', 'Gare');
            foreach ($arrayTypeNec as $type) {
                $query = "SELECT * FROM necessaire where Idvil = $idvil and typenec='$type';";

                $result = $connect->query($query);
                $a = $result->fetch_all(MYSQLI_ASSOC);

                if ($a) {
                    echo "
                        <li>
                            <ul class= 'search-result' id ='$type'>
                    ";
                    foreach ($a as $row) {
                        echo "
                                <li>           
                                    <span class='ref'><h4>" . $row['nomnec'] . "</h4></span>
                                    
                                    <span class='icons'>
                                        <button type='submit' onclick='deletenec(".$row['Idnec'] . ")'> <img src='./src imgs/trash-bin.png' alt='delete'></button>
                                    </span>
                                </li>
                        ";
                    }
                    echo "    
                            </ul>
                        </li>
                    ";
                } else {
                    echo " <li><ul class= 'search-error' id ='$type'> <h4> Aucun $type Trouver !</h4></ul> </li>";
                }
            }

            echo "
            <section class='goTop' >
                <button id='goTop-button' onclick='window.location.href = \"#\"'><img src='./src imgs/up-arrow.png' alt='go top'></button>
            </section>
            ";
        }
    }
}

function rechercher()
{

    /* trouver les villes */

    $connexion = connecter();

    echo "";
    if (!($connexion)) {
        echo 'vide';
    } else {
        $continant = $pays = $ville = '';
        if (isset($_POST['RContinent']))
            $continant = $_POST['RContinent'];
        if (isset($_POST['RPays']))
            $pays = $_POST['RPays'];
        if (isset($_POST['RVille']))
            $ville = $_POST['RVille'];
        if ($continant == '' && $pays == '' && $ville == '')
            echo "";
        else {
            $sql = "SELECT * from ville  NATURAL join pays NATURAL join continent Where nomcon like '$continant%' and nompay like '$pays%' and nomvil like '$ville%' ORDER BY Nomvil ASC;";
            $sql = $connexion->query($sql);

            if ($sql == null) {
                echo 'vide';
            } else {
                echo "<div class='ligne' id='ligne''></div></br>

                <section id='search-Result-Section''>
                    
                
                    <div id='rech'>
                    <h3>Résultat de la recherche</h3>
                            <ul class= search-result>
                            <script> preparePage(); </script> 
                            ";
                $a = $sql->fetch_all(MYSQLI_ASSOC);

                if ($a == null)
                    echo " <li style=' text-align: center;'><span class='ref' style=' width : 100%'> <h4> Aucun Resultat Trouver !</h4></span> </li>";
                else {
                    $_SESSION["recherch"] = $a;
                    $cpt = 0;

                    foreach ($a as $i) {
                        echo "
                       
                    <li>
                            <span class='ref' onmousedown = 'window.location.href = \"affiche ville.php?lien=$cpt&idville=" .$i['Idvil'] ."\"'>
                                <a href=\"affiche ville.php?lien=$cpt&idville=" .$i['Idvil']."\">" . $i['Nomvil'] . "</a>
                            </span>
                            
                            <span class='icons'>
                                <button onclick='window.location.href = \" ./Ajouter ville.php?mode=modification&idville=" . $i['Idvil'] . " \" '><img src='./src imgs/pen.png' alt='edit'></button>
                                <button onclick='deleteVille(" . $i['Idvil'] . ")'><img src='./src imgs/trash-bin.png' alt='delete'></button>
                            </span>
                        
                    </li>";
                        $cpt = $cpt + 1;
                    }
                }
                echo "</ul>
                    </div>
                </section> 
                <section id='goTop' >
                    <button id='goTop-button' style='display: block;' onclick='goTop()'><img src='./src imgs/up-arrow.png' alt='go top'></button>
                </section>
            </div>";
            }
        }
    }
}

function recherchPhotos(){
    /* trouver les villes */

    $connexion = connecter();

    echo "";
    if (!($connexion)) {
        echo 'vide';
    } else {
        if (isset($_GET['idville'])){
            $idVille = $_GET['idville'];
        
            $sql = " SELECT ville.idvil ,site.nomsit ,site.cheminphoto FROM ville join site on ville.idvil = site.idvil where ville.idvil=". $idVille ."; "; //get all infos...
            $sql = $connexion->query($sql);

            if ($sql == null) {
                echo 'vide';
            } else {
                $countPhotos = 0;
                while($row = $sql->fetch_assoc()) {
                    echo "
                    <div class=\"mySlides fade\"  onmousedown = \"startPause()\">
                        <img  height=\"350px\" width=\"100%\" src=\"".$row['cheminphoto']."\" >
                        <H1 style='top: 60%; font-size: 25px;' class='h' id=\"h\">".$row['nomsit']."</H1>
                    </div>
                    
                    "; 
                    $countPhotos++;
                }
                $GLOBALS['countPhotos'] = $countPhotos;
            }

            
        }
    }
}

function addDotesForEveryPhoto(){
    if (isset($GLOBALS['countPhotos'])) {
        $var  = $GLOBALS['countPhotos'];
        for($i = 0 ; $i < $var ; $i++){
            echo"<span class=\"dot\" onclick=\"currentSlide(".$var.")\"></span>";
        }
    }
}

function detail()
{
    if (isset($_GET['lien'])) {
        $i = $_GET['lien'];
        $a = $_SESSION['recherch'];
        $Session = $a[$i];
        $_SESSION['Session'] = $Session;
        echo "
        <h2 id='Idvilnec'>" . $Session['Nompay'] . " <span>(" . $Session['Nomvil'] . "</span>,<span>" . $Session['Idvil'] . "</span>)</h2>    
                <h3>description</h3>
                <p>" . $Session['descvil'] . "</p>";
    }
}

/*  les fonctions de supression */
function supprimerNaiss($idnec)
{
    $connect = connecter();
    if ($connect) {
        $sql = "DELETE FROM necessaire WHERE Idnec = $idnec ;";
        $connect->query($sql);
    }
    header("Location:affiche ville.php");
    exit;
}

function suppnes($idvil)
{
    $connect = connecter();
    if ($connect) {
        $sql = "DELETE FROM necessaire WHERE Idvil = $idvil ;";
        $connect->query($sql);
    }
}

function supprimerVille($i)
{
    $connect = connecter();
    if ($connect) {
        $a = $_SESSION['recherch'];
        foreach ($a as $Session)
            if ($i == $Session['Idvil']) {
                suppnes($i);
                $sql = "DELETE FROM ville WHERE Idvil = $i ;";
                $connect->query($sql);
                break;
            }
    }
    header("Location:index.php");
    exit;
}

/* les fonction de mode modification */
function modification()
{
    if (isset($_GET['mode']))
        return ($_GET['mode'] == "modification");

    return 0;
}

function courantVilleInfo($i)
{
    $connect = connecter();
    $a = "";
    if ($connect) {
        // $sql = " SELECT continent.nomcon , pays.nompay , ville.idvil , ville.nomvil , ville.descvil ,necessaire.nomnec , necessaire.typenec ,site.nomsit ,site.cheminphoto
        //           FROM (((( continent join pays on continent.idcon = pays.idcon) join ville on pays.idpay = ville.idpay ) join necessaire on ville.idvil=necessaire.idvil ) join site on ville.idvil = site.idvil) where idvil=$i; "; //get all infos...
        $sql = "SELECT continent.nomcon , pays.nompay , ville.idvil , ville.nomvil , ville.descvil  FROM (( continent join pays on continent.idcon = pays.idcon) join ville on pays.idpay = ville.idpay )where ville.idvil=$i;";
        $sql = $connect->query($sql);
        $a = $sql->fetch_all(MYSQLI_ASSOC);

        return $a;
    }
}

function courantVillePhoto($idVille , $type )
{
    $connect = connecter();
    $a = "";
    if ($connect) {
        $sql ="SELECT site.nomsit , site.cheminphoto  
                 FROM ( ville join site on ville.idvil=site.idvil )
                     where ville.idvil=$idVille ;";

        $sql = $connect->query($sql);
        $a = $sql->fetch_all(MYSQLI_ASSOC);
       
        return $a;
    }
}

function courantVilleNec($idVille , $typeNec)
{
    
    $connect = connecter();
    $a = "";
    if ($connect) {
        
        $sql = "SELECT ville.idvil , necessaire.nomnec , necessaire.typenec  
                  FROM ( ville join necessaire on ville.idvil=necessaire.idvil )
                    where ville.idvil=$idVille and necessaire.typenec= '$typeNec' ;";

        $sql = $connect->query($sql);
        $a = $sql->fetch_all(MYSQLI_ASSOC);

        return $a;
    }
}

function getDataNec($type){
    if (modification()) {

        $a = courantVilleNec($_GET['idville'] , $type);

        if (is_array($a)) {
            
            foreach($a as $ligne){
                echo"<option value=".$ligne['nomnec'].">".$ligne['nomnec']."</option> <br>";
            }
        }else{
            echo"<option value=".$a['nomnec'].">".$a['nomnec']."</option> <br>";
        }
        
        
    } else {
        echo "";
    }
}

function getData($var)
{
    if (modification()) {
        $a = courantVilleInfo($_GET['idville']);
        if ($a) {
            $GLOBALS['a'] = $a;
            echo $GLOBALS['a'][0]["$var"];
        }
        
        
    } else {
        echo "";
    }
}

function getPhoto($type){
    if (modification()) {
        
        $a = courantVillePhoto($_GET['idville'] , $type);
        
        if ($type == 'Photo') {
            $type = 'cheminphoto';
        }else{
            $type = 'nomsit';
        }
         

        if (is_array($a)) {
            foreach($a as $ligne){
                echo"<option value=".$ligne[$type].">".$ligne[$type]."</option> <br>";
            }
        }else{
            echo"<option value=".$a[$type].">".$a[$type]."</option> <br>";
        }
    } else {
        echo "";
    }
}



/* les fonction pour optemese le code HTML */
function Binom()
{
    echo "
    <ul>
    <li class='Grey'>OUAHABI Benhenni </li>
    <li class='Atoui'>ATOUI Rayane </li>
    <li>Spécialité : INFO </li>
    <li>Section : 1 </li>
    <li>Groupe : 6 </li>
    <li>E-Mail :
        <ul>
            <li class='email'>Grey.lanisteur123@gmail.com    </li>
            <li class='email'>At.rayane03@gmail.com    </li>
        </ul> 
    </li>

    </ul>";
}
