function closeDialogADD(namedig){
    var dialog = document.getElementById(namedig);
    alert('Ajouté avec succes !!');
    dialog.close();
}

function Select( array,param ){
    element = document.createElement('p');

    element.textContent = array[0]['idpay'];

    const ajouter = document.getElementsByID(param) ;
    
    ajouter.appendChild(element);
}

function openDialog(namedg) {
    var dialog = document.getElementById(namedg);
    dialog.showModal();
}

function closeDialog(namedig) {
    var dialog = document.getElementById(namedig);
    dialog.close();
}


function deleteVille(x){
    // Créer un objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Définir la méthode et l'URL de la requête
    xhr.open("POST", "API.php", true);

    // Définir l'en-tête de la requête
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    console.log(x);

    // Envoyer la requête avec la valeur en tant que paramètre
    xhr.send("x=" + encodeURIComponent(x));
    alert("la ville que vous avez selectionnee a ete supprimee" + x);
    location.reload();
}
