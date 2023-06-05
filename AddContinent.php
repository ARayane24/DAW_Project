<?php 
echo "
<div class='contain'>
<label for='Continent'>Continent </label> <input type='text' id='Continent' name='Continent' size='10' required>
</div>
<?php include 'postGet.php'?>  
<button id='add' onclick='Sauvgarder();' name='addContinent'>Ajouter <?php Sauvgarder(); ?>  </button>
";
?>