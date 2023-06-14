/* pour ajouter ville ou continent */
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

/* add functions*/

function addDetails(idNec){
    let newNec = document.getElementById(idNec).value;
    let text = document.createTextNode(newNec);
    let option  = document.createElement('option');
    option.appendChild(text);

    let selectListe;
    switch(idNec){
        case 'Aéroports' :selectListe = 'selectAéroports'; break;
        case 'Gares' :selectListe = 'selectGares'; break;
        case 'Restaurants' :selectListe = 'selectRestaurants'; break;
        case 'Hôtels' :selectListe = 'selectHôtels'; break;
    }

     document.getElementById(selectListe);
     selectListe.appendChild(option);
}

/* pour suprime*/
function deleteVille(x){
    // pour exe. code PHP depuis JS

    // Créer un objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Définir la méthode et l'URL de la requête
    xhr.open("POST", "API.php", true);

    // Définir l'en-tête de la requête
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Envoyer la requête avec la valeur en tant que paramètre
    xhr.send("x=" + encodeURIComponent(x));
    alert("la ville que vous avez selectionnee a ete supprimee" + x);
    location.reload();
}

