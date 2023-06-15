<?php

/*
    // to do later : 
    -> rename nec  types ex : Hôtels --> hotel

*/

session_start();

/* les fonctions de connection  */
function connecter()
{
    // connect a la base de donne
    return new mysqli('localhost', 'root', '', 'voyage');
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
        $continant = $_POST['Continent'];
        $query = "insert into contient values ('$continant');";
        $result = mysqli_query($connect, $query);
    }
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

            foreach ($_SESSION["contient"] as $i) {
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

            $query = "INSERT INTO ville( Nomvil, descvil, Idpay) VALUES ('$ville','$Descriptif','$pays');";
            mysqli_query($connect, $query);

            $idvil = mysqli_insert_id($connect);


            if (isset($_POST['hotles'])) {
                $hotel = $_POST['hotles'];
                print_r($hotel);
                if ($hotel != '') {
                    foreach ($hotel as $i) {
                        insertNaiss($idvil, $i, 'Hotel');
                    }
                }
            }


            if (isset($_POST['Restaurantss'])) {
                $restaurant = $_POST['Restaurantss'];
                print_r($restaurant);
                if ($restaurant != '') {
                    foreach ($restaurant as $i) {
                        insertNaiss($idvil, $i, 'Restaurant');
                    }
                }
            }

            if (isset($_POST['Garess'])) {
                $gares = $_POST['Garess'];
                print_r($gares);
                if ($gares != '') {
                    foreach ($gares as $i) {
                        insertNaiss($idvil, $i, 'Gare');
                    }
                }
            }

            if (isset($_POST['Aeroports'])) {
                $Aeroports = $_POST['Aeroports'];
                print_r($Aeroports);
                if ($Aeroports != '') {
                    foreach ($Aeroports as $i) {
                        insertNaiss($idvil, $i, 'Aeroport');
                    }
                }
            }
        }
    }
    header("Location: index.php");
    exit;
}

function insertNaiss($idvil, $name, $type)
{
    $connect = connecter();
    $query = "INSERT INTO necessaire (typenec,nomnec,Idvil) Values ('$type','$name','$idvil');";
    $result = mysqli_query($connect, $query);
}

function insertSite()
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $photo = $_POST['Photos'];
        $site = $_POST['Site'];

        if ($photo != "" and $site != "") {
            $query = "INSERT into sites(nomsit,cheminphoto,idvil) values ('$site','$photo','$');";
            $result = mysqli_query($connect, $query);
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
        $sql1 = "SELECT contient.idcon , pays.idpay , sites.idsit
                FROM ((( contient join pays on contient.idcon = pays.idcon) join ville on pays.idpay = ville.idpay ) join sites on ville.idvil = sites.idvil) 
                WHERE ville.idvil=$idvil; ";

        $sql1 = $connexion->query($sql1)->fetch_assoc();

        if (isset($_POST['Continent']))
            updateContinant($sql1['idcon']); // update continant

        if (isset($_POST['Pays']))
            updatepays($sql1['idpay']);      // update pays
        
        if (isset($_POST['Ville2']))
            updateVille($idvil);    // update ville
        
        if (isset($_POST['Site']))
            updateSite($sql1['idsit']);     // update site
 

        

        $necTypes = ['hotle', 'gare', 'aeroport', 'restaurant'];
        for ($j = 0; $j < 4; $j++){

            $sql = "SELECT necessaire.nomnec 
                     FROM (ville join necessaire on ville.idvil=necessaire.idvil)
                         where ville.idvil=$idvil and necessaire.typenec = '$necTypes[$j]'; "; //avoir tablue de nec de meme type de cette ville
            
            $sql = $connexion->query($sql)->fetch_assoc();
            print_r($sql);
            if (isset($_POST[ $necTypes[$j]."s" ]))
                updateNaiss($idvil ,$sql , $necTypes[$j]);  // update nec de chaque type
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
        $query = "UPDATE contient SET nomcon = '$continant' WHERE idcon = $idcon ;"; 
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

function updateSite($idsite)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $site = $_POST['Site'];
        $query = "UPDATE sites SET nomsit = '$site' WHERE idsit = $idsite ;";
        $result = mysqli_query($connect, $query);

    }
}

function updateNaiss($idvil , $idsnec, $type)
{
    $connect = connecter();
    if (!($connect)) {
        die('Connection Failed');
    } else {
        $necName = $_POST[$type."s"];
        $a = array();
        $a = $idsnec;
        $idvil = array_values($a); // convert associative tab a une tab 
        print_r($a);
        $i = 0;

        if ($necName != '') {
           
            foreach($necName as $nec){
                /* pour chaque element de nec de meme type va avoir un new valuer */
                if ($i >= sizeof($idsnec) ) {
                    insertNaiss($idvil,$nec,$type); // si le nombre de new element est grand que le nbr des element presedant
                }else{
                    $query = "UPDATE necessaire SET nomnec = '$nec' WHERE idnec = $idsnec[$i] AND typenec = '$type';";
                    $result = mysqli_query($connect, $query);
                    print_r($result);
                    $i++;
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
        $sql2 = $connect->query("SELECT * FROM contient;");
        $_SESSION["contient"] = $sql2->fetch_all(MYSQLI_ASSOC);

        $sql2 = $connect->query("SELECT * FROM pays;");
        $_SESSION["pays"] = $sql2->fetch_all(MYSQLI_ASSOC);

        $sql2 = $connect->query("SELECT * FROM ville;");
        $_SESSION["ville"] = $sql2->fetch_all(MYSQLI_ASSOC);

        $_SESSION["paysF"] = array();
        $_SESSION["villeF"] = array();
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
                                        <button onclick='deletenec(" . $row['Idnec'] . ")'><img src='./src imgs/trash-bin.png' alt='delete'></button>
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
            $sql = "SELECT * from ville  NATURAL join pays NATURAL join contient Where nomcon like '$continant%' and nompay like '$pays%' and nomvil like '$ville%';";
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
                            <span class='ref' onmousedown = 'window.location.href = \"affiche ville.php?lien=$cpt\"'>
                                <a href='affiche ville.php?lien=$cpt'>" . $i['Nomvil'] . "</a>
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
        // $sql = " SELECT contient.nomcon , pays.nompay , ville.idvil , ville.nomvil , ville.descvil ,necessaire.nomnec , necessaire.typenec ,sites.nomsit ,sites.cheminphoto
        //           FROM (((( contient join pays on contient.idcon = pays.idcon) join ville on pays.idpay = ville.idpay ) join necessaire on ville.idvil=necessaire.idvil ) join sites on ville.idvil = sites.idvil) where idvil=$i; "; //get all infos...
        $sql = "SELECT contient.nomcon , pays.nompay , ville.idvil , ville.nomvil , ville.descvil  FROM (( contient join pays on contient.idcon = pays.idcon) join ville on pays.idpay = ville.idpay )where ville.idvil=$i;";
        $sql = $connect->query($sql);
        $a = $sql->fetch_all(MYSQLI_ASSOC);

        return $a;
    }
}

function courantVillePhoto($i)
{
    $connect = connecter();
    $a = "";
    if ($connect) {
        $sql = "SELECT contient.nomcon , pays.nompay , ville.idvil , ville.nomvil , ville.descvil  FROM (( contient join pays on contient.idcon = pays.idcon) join ville on pays.idpay = ville.idpay )where ville.idvil=$i;";
        $sql = $connect->query($sql);
        $a = $sql->fetch_all(MYSQLI_ASSOC);

        return $a;
    }
}

function courantVilleNec($i)
{
    $connect = connecter();
    $a = "";
    if ($connect) {

        $sql = "SELECT ville.idvil , necessaire.nomnec , necessaire.typenec  FROM ( ville join necessaire on ville.idvil=necessaire.idvil ) where ville.idvil=$i;";
        $sql = $connect->query($sql);
        $a = $sql->fetch_all(MYSQLI_ASSOC);

        return $a;
    }
}

function getData($var)
{
    if (modification()) {
        $a = courantVilleInfo($_GET['idville']);
        if (isset($a)) {
            $GLOBALS['a'] = $a;
        }
        echo $GLOBALS['a'][0]["$var"];
    } else {
        echo "";
    }
}



function getNecData($var)
{
    if (modification()) {
        $a = courantVilleNec($_GET['idville']);
        if (isset($a)) {
            $GLOBALS['a'] = $a;
        }
        echo $GLOBALS['a'][0]["$var"];
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
