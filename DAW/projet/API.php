<?php
session_start();
function connecter(){ 
    return new mysqli('localhost' , 'root' , '' , 'voyage',3308);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
   if(isset($_POST['ContinentPays']))
     insertpays();
     elseif(isset($_POST['Continent']))
        insertVille();

    if(isset($_GET['liendelete']))
        supprimerVille();
        
            
}


function insertContinant(){
    $connect = connecter();
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{
        $continant= $_POST['Continent'];
        $query = "insert into contient values ('$continant');";
        $result = mysqli_query($connect, $query);
    }
}

function insertpays() {
    $connect = connecter();
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{ 
        $continant= $_POST['ContinentPays'];
        $pays= $_POST['addPays'];

        print_r($pays);
        if ($continant!="" and $pays!="" ){
           
            foreach ( $_SESSION["contient"] as $i ) { 
                if ($i['Nomcon']===$continant) {
                    break;
                }
            }
            $continant=$i['Idcon'];
                
                $query = "INSERT into pays(idcon,nompay) values ('$continant','$pays');";
                $result = mysqli_query($connect, $query);
            }
    }
    header("Location: Ajouter ville.php");
    exit;
}

function insertVille(){
    $connect = connecter();
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{
        $pays= $_POST['Pays'];
        $ville= $_POST['Ville2'];
        $Descriptif= $_POST['Descriptif'];
        
        if ($ville!="" and $pays!="" ){
        foreach ( $_SESSION["pays"] as $i ) { 
            if ($i['Nompay']===$pays) {
                break;
            }
        }
        $pays=$i['Idpay'];
        
            $query = "INSERT INTO ville( Nomvil, descvil, Idpay) VALUES ('$ville','$Descriptif','$pays');";
        mysqli_query($connect, $query);
       
        $idvil=mysqli_insert_id($connect);

        
       if (isset($_POST['hotles'])){
        $hotel= $_POST['hotles'];
        print_r($hotel);
        if ( $hotel != '' ){ 
            foreach($hotel as $i ){ 
                insertNaiss($idvil,$i,'Hotel');
            }
        }}


         if (isset($_POST['Restaurantss'])){
        $restaurant= $_POST['Restaurantss'];
        print_r($restaurant);
        if ( $restaurant != '' ){ 
            foreach($restaurant as $i ){ 
                insertNaiss($idvil,$i,'Restaurant');
            }
        }}

        if (isset($_POST['Garess'])){
        $gares= $_POST['Garess'];
        print_r($gares);
        if ( $gares != '' ){ 
            foreach($gares as $i ){ 
                insertNaiss($idvil,$i,'Gare');
            }
        }}
        
        if (isset($_POST['Aeroports'])){
            $Aeroports= $_POST['Aeroports'];
            print_r($Aeroports);
            if ( $Aeroports != '' ){ 
                foreach($Aeroports as $i ){ 
                    insertNaiss($idvil,$i,'Aeroports');
                }
            }}
    }

    }
    header("Location: index.php");
    exit;
}

function insertNaiss($idvil,$name,$type){
    $connect=connecter();
        $query = "INSERT INTO necessaire (typenec,nomnec,Idvil) Values ('$type','$name','$idvil');";
        $result = mysqli_query($connect, $query);
}

function OpenSession(){
    $connect = connecter();
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{
        $sql2 = $connect->query("SELECT * FROM contient;");
        $_SESSION["contient"] = $sql2->fetch_all(MYSQLI_ASSOC);

        $sql2 = $connect->query("SELECT * FROM pays;");
        $_SESSION["pays"] = $sql2->fetch_all(MYSQLI_ASSOC); 
        
        $sql2 = $connect->query("SELECT * FROM ville;");
        $_SESSION["ville"] = $sql2->fetch_all(MYSQLI_ASSOC);

        $_SESSION["paysF"] =array();
        $_SESSION["villeF"]=array();
    }
}


// function refreshDynamiquePays (){
    
//         $continant = $_POST['Continent'];
//         foreach ( $_SESSION["contient"] as $i ) { 
//             if ($i['Nomcon']===$continant) {
//                 break;
//             }
//         } 
//         $_SESSION["paysF"] = filtertable( $_SESSION["pays"],$i["Idcon"],'Idcon');  
// }

// function refreshDynamiqueVille (){
// $pays= $_POST["Pays"];
// foreach ( $_SESSION["pays"] as $i ) { 
//     if ($i['Nompay']===$pays) {
//         break;
//     }
// }
// $_SESSION["villeF"] =filtertable( $_SESSION["ville"],$i['Idpay'],'Idpay'); 
// }


// function filtertable($tableau,$codeFK,$column){
//     $i=0;
//     $tb=array();
//     foreach( $tableau as $a ){
//         if ( $a[$column] == $codeFK ){
//             $tb[$i]= $a;
//             $i=$i+1;
//         }
//     }
//     return $tb;
// }



function listeselect($table,$code){
    echo"";
    foreach ($table as $i) {
        echo "<option value='".$i[$code]."'>";
        }
} 


function rechercher()
{       
    $connexion = connecter();
    
    echo "";
    if (!($connexion)){
        echo 'vide';
    } else {
        $continant=$pays=$ville='';
        if (isset($_POST['RContinent']))
             $continant= $_POST['RContinent'];
        if (isset($_POST['RPays']))   
             $pays= $_POST['RPays'];
             if (isset($_POST['RVille']))   
             $ville= $_POST['RVille'];

        $sql = "SELECT * from ville  NATURAL join pays NATURAL join contient Where nomcon like '$continant%' and nompay like '$pays%' and nomvil like '$ville%';";
        $sql = $connexion->query($sql);

        if ($sql == null){
            echo 'vide';
        }else {
            $a = $sql->fetch_all(MYSQLI_ASSOC);
            if($a == null) 
            echo " <p>Aucun Resultat Trouver ! </p>";
            else { 
                $_SESSION["recherch"] = $a;
                $cpt=0;
                echo "<ul id= search-result>";
                foreach ($a as $i ) 
                    { echo"
                    <li>
                            <span class='ref' onmousedown = 'window.location.href = 'alger''>
                                <a href='Ville Details.php?lien=$cpt'>".$i['Nomvil']."</a>
                            </span>
                            
                            <span class='icons'>
                            <button onclick=''><img src='./src imgs/pen.png' alt='edit'></button>
                                <a  href='index.php?liendelete=".$i['Idvil']."'> <img src='./src imgs/trash-bin.png'></a>
                            </span>
                        
                    </li>";
                     $cpt=$cpt+1;
                    }
                    echo "</ul>";

            }
           
        }
    }
}

function suppnaiss($idvil){
    $connect = connecter();
    if($connect){
        $sql = "DELETE FROM necessaire WHERE Idvil = $idvil ;";
        $connect->query($sql);
    }
    
}

function supprimerVille(){
    $connect = connecter();
    if($connect){
        if(isset($_GET['liendelete'])){   
            $i=$_GET['liendelete'];
            $a=$_SESSION['recherch'];
            foreach ( $a as $Session)
            if ($i==$Session['Idvil']){
                 suppnaiss($i);
                $sql = "DELETE FROM ville WHERE Idvil = $i ;";
                $connect->query($sql); break;
            }
        }
    }
    header("Location:index.php");
    exit;
}

function detail(){
if(isset($_GET['lien'])){     
    $i=$_GET['lien'];
    $a=$_SESSION['recherch'];
    $Session = $a[$i];
    echo "<li> Ville : ".$Session['Nomvil']."</li> 
    <li> Pays : ".$Session['Nompay']."</li>
    <li> Continent : ".$Session['Nomcon']."</li>
    <li>Description : <br> ".$Session['descvil']." </li>
 ";
}
}

function Binom(){
    echo"
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


?>