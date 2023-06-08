<?php
session_start();
function connecter(){ 
    return new mysqli('localhost' , 'root' , '' , 'voyage',3308);
}



function insertContinant(){
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{
        $continant= $_POST['Continent'];
        $query = "insert into contient values ('$continant');";
        $result = mysqli_query($connect, $query);
    }
}

function insertpays(){
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{
        $continant= $_POST['Continent'];
        $sql2 = $connect->query("SELECT idcon FROM Contient where Nomcon='$continant';");
        $a = $sql2->fetch_all(MYSQLI_ASSOC);
        if ($a == null)
        echo "<option value='VIDE'>";
        else {
            $continant=$a[$code];
            $pays= $_POST['Pays'];
            $query = "insert into contient values ('$continant','$pays');";
            $result = mysqli_query($connect, $query);
        }
    }
}

function insertVille(){
    $connect = connecter();
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{
        $pays= $_POST['Pays'];
        $ville= $_POST['Ville'];
        $Descriptif= $_POST['Descriptif'];
        $hotel= $_POST['hotel'];
        foreach ( $_SESSION["pays"] as $i ) { 
            if ($i['Nompay']===$pays) {
                break;
            }
        }
        $pays=$i['Idpay'];
        print_r($pays);
        $query = "INSERT INTO ville( Nomvil, descvil, Idpay) VALUES ('$ville','$Descriptif','$pays');";
        $result = mysqli_query($connect, $query);

        echo "Done" ; 
        $idvil=mysqli_insert_id($connect);

        foreach($hotel as $i ){ 
            insertNaiss($idvil,$i,'hotel',$connect);
        }
        

    }
}

function insertNaiss($idvil,$name,$type,$connect){
        $query = "INSERT INTO necessaire(typenec,nomnec,Idvil) Values ('$type','$name','$idvil');";
        $result = mysqli_query($connect, $query);
}

  
function Sauvgarder(){ 
        $connect = connecter();
        if ( !($connect) ) {
            die ('Connection Failed');
        }else{
            
            $hotel= $_POST['hotel'];
             
            $restaurant= $_POST['restaurantazes'];
            $Site= $_POST['Site'];
            $aeropore= $_POST['Aeroports'];
            $gare= $_POST['Gares'];
           
            $filephoto = $_FILES['Photos']['name'];
            $tempphoto= $_FILES['Photos']['tmp_name'];
            move_uploaded_file($tempphoto,$filephoto);
            
            $query = "insert into contient values ('$incr','$name');";
            $result = mysqli_query($connect, $query);
            echo "vous avez sauvgarder avec succés !";
        }
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


function refreshDynamiquePays (){
    
        $continant = $_POST['Continent'];
        foreach ( $_SESSION["contient"] as $i ) { 
            if ($i['Nomcon']===$continant) {
                break;
            }
        } 
        $_SESSION["paysF"] = filtertable( $_SESSION["pays"],$i["Idcon"],'Idcon');  
}

function refreshDynamiqueVille (){
$pays= $_POST["Pays"];
foreach ( $_SESSION["pays"] as $i ) { 
    if ($i['Nompay']===$pays) {
        break;
    }
}
$_SESSION["villeF"] =filtertable( $_SESSION["ville"],$i['Idpay'],'Idpay'); 
}


function filtertable($tableau,$codeFK,$column){
    $i=0;
    $tb=array();
    foreach( $tableau as $a ){
        if ( $a[$column] == $codeFK ){
            $tb[$i]= $a;
            $i=$i+1;
        }
    }
    return $tb;
}



function listeselect($table,$code){
    echo"";
    foreach ($table as $i) {
        echo "<option value='".$i[$code]."'>";
        }
} 


function recher(){
    $connect = connecter();
    $selectJson = json_encode([0,0,0]);
    if ( !($connect) )
        die ('Connection Failed');
    else{
        $sql2 = $connect->query("SELECT * FROM ville;");
        $a = $sql2->fetch_all(MYSQLI_ASSOC);
        $selectJson = json_encode($a);
        }
    return $selectJson;
}


function rechercher()
{       
    $connexion = connecter();
    
    echo "";
    if (!($connexion)){
        echo 'vide';
    } else {
        $continant=$pays='';
        if (isset($_POST['Continent']))
             $continant= $_POST['Continent'];
        if (isset($_POST['Pays']))   
             $pays= $_POST['Pays'];

        $sql = "SELECT * from ville  NATURAL join pays NATURAL join contient Where nomcon like '%$continant%' and nompay like '%$pays%';";
        $sql = $connexion->query($sql);

        if ($sql == null){
            echo 'vide';
        }else {
            $a = $sql->fetch_all(MYSQLI_ASSOC);
            if($a == null) 
            echo " <p>Aucun Resultat Trouver ! </p>";
            else { 
                echo "<div>";
                foreach ($a as $i ) 
                    {
                        echo "<p style = 'border : 1px solid; border-radius: 3px; margin: 5px; padding:5px;' 
                        ><a href='Ville Details.php'>".$i['Nomvil']."</a> /  ".$i['descvil']." </p>";
                    }
                    echo "</div>";
            }
           
        }
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