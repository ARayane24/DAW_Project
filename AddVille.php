<?php 
echo "<div class='contain'>
<label for='Continent'>Continent </label> <input type='text' id='Continent' name='Continent' size='10' list='continent' required>
<datalist id='continent'>
    <option value='Afrique'>  
    <option value='Amérique'>
    <option value='Antarctique'>
    <option value='Asie'>
    <option value='Europe'>
    <option value='Océanie'>
</datalist>
</div>
<div class='contain'>
<label for='Ville'>Ville </label>  <input type='text' id='Ville' name='Ville' size='10' required>
</div>
<div class='contain'>
<label for='Pays'>Pays </label>  <input type='text' id='Pays' name='Pays' size='10' required>
</div>
<div class='contain'>
<label for='Site'>Site </label>  <input type='text' id='Site' name='Site' size='10' placeholder='Casbas' required>    
</div>
</div>

<div id='details'>
<div class='contain'>
<label for='Descriptif'>Descriptif </label> <br>
<textarea id='Descriptif' name='Descriptif' placeholder='description' size='255' required></textarea>        
</div>
<div class='contain'>
<label for='Photos'>Photos </label> <br>
<input type='url' id='Photos' name='Photos' multiple='multiple' placeholder='C:\Users\admin\Desktop' required>
<button id='add' onclick='' name='add'>Ajouter</button>
<select name='Photos' size='5' multiple>  
    <option value='Photo1'>  C:\Users\admin\Desktop\Photo1 </option>  
    <option value='Photo2'>  C:\Users\admin\Desktop\Photo2 </option>  
    <option value='Photo3'>  C:\Users\admin\Desktop\Photo3 </option>   
</select>        
</div>";
?>