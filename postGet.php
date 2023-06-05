<?php
 Sauvgarder();
function connecter(){ 
    return new mysqli('localhost' , 'root' , '' , 'voyage',3308);
}
  
function Sauvgarder(){ 
    $connect = connecter();
    if ( !($connect) ) {
        die ('Connection Failed');
    }else{
        $name= $_POST['Continentajout'];
        $query = "insert into contient values (1,'$name');"
        $result = mysqli_query($conn, $query);
        echo "vous avez sauvgarder avec succés !";
    }
    }

function rechercher(){
    $connect = connecter();
    if ( !($connect) ) {
        die('Connection Failed');
    }else{
      $Continent = $_POST['Continent'];
      $Ville = $_POST['Ville'];
      $Pays = $_POST['Pays'];
      $Site = $_POST['Site'];

      $query = "SELECT * FROM cities WHERE continent='$continent' AND country='$country' AND city='$city' AND sites='$site'";

      $result = mysqli_query($conn, $query);

      if ($result) {

          while ($row = mysqli_fetch_assoc($result)) {
              // Access the row data
              $cityName = $row['city'];
              $countryName = $row['country'];

              // Display the data
              echo "<p>$cityName ($countryName)</p>";
          }

          // Free the result set
          mysqli_free_result($result);
      } else {
            // Handle the case when the query fails
          echo "Error: " . mysqli_error($conn);
      }

      // Close the database connection
      mysqli_close($conn);

    }

}


?>