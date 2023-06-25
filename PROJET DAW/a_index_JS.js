/* pour ajouter ville ou continent */
function closeDialogADD(namedig){
    var dialog = document.getElementById(namedig);
    alert('Ajouté avec succes !!');
    window.location.reload("Refresh");
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
let  hasBeenIni = false; // pour conne si les variable a ete insialise ou non

if ( ! hasBeenIni ) {
    if(document.getElementById('selectAeroports'))
    var nbrElementAeroportPre  = document.getElementById('selectAeroports').children.length;
    if(document.getElementById('selectGares'))
    var nbrElementGarePre  = document.getElementById('selectGares').children.length;
    if(document.getElementById('selectRestaurants'))
    var nbrElementRestaurantPre  = document.getElementById('selectRestaurants').children.length;
    if(document.getElementById('selectHôtels'))
    var nbrElementHotelPre  = document.getElementById('selectHôtels').children.length;
    if(document.getElementById('selectSites'))
    var nbrElementSitePre = document.getElementById('selectSites').children.length; 


    var elementAeroportPre_N = 0;
    var elementGarePre_N  = 0;
    var elementRestaurantPre_N= 0;
    var elementHotelPre_N = 0;
    var elementSitePre_N = 0;

    hasBeenIni = true;
}

function addDetails(idNec , bool){
    let newNec = document.getElementById(idNec).value;
    let text = document.createTextNode(newNec);
    

    let selectListe;
    let liste;

    switch(idNec){
        case 'Aeroport' :
            selectListe = 'selectAeroports';

            liste = document.getElementById(selectListe);

            if (bool && nbrElementAeroportPre>=1 && nbrElementAeroportPre > elementAeroportPre_N) {
                alert("la valeur suivant : " + liste.children[ elementAeroportPre_N ].innerText + " dans liste "+ idNec +" a ete remplace par : " + newNec);
                liste.children[ elementAeroportPre_N ].innerText =  newNec;
                liste.children[ elementAeroportPre_N ].value =  newNec;
                elementAeroportPre_N ++ ;
            }else{
                let option  = document.createElement('option');
                option.appendChild(text);
                option.value = newNec;
                liste.appendChild(option);
            }
            
            break;
        case 'Gare' :
            selectListe = 'selectGares'; 
            
            liste = document.getElementById(selectListe);

            if (bool && nbrElementGarePre>=1 && nbrElementGarePre > elementGarePre_N) {
                alert("la valeur suivant : " + liste.children[ elementGarePre_N ].innerText + " dans liste "+ idNec +" a ete remplace par : " + newNec);
                liste.children[ elementGarePre_N ].innerText =  newNec;
                liste.children[ elementGarePre_N ].value =  newNec;
                elementGarePre_N ++ ;
            }else{
                let option  = document.createElement('option');
                option.appendChild(text);
                option.value = newNec;
                liste.appendChild(option);
            }
            
            break;
        case 'Restaurant' :
            selectListe = 'selectRestaurants';
            
            liste = document.getElementById(selectListe);

            if (bool && nbrElementRestaurantPre>=1 && nbrElementRestaurantPre > elementRestaurantPre_N) {
                alert("la valeur suivant : " + liste.children[ elementRestaurantPre_N ].innerText + " dans liste "+ idNec +" a ete remplace par : " + newNec);
                liste.children[ elementRestaurantPre_N ].innerText =  newNec;
                liste.children[ elementRestaurantPre_N ].value =  newNec;
                elementRestaurantPre_N ++ ;
            }else{
                let option  = document.createElement('option');
                option.appendChild(text);
                option.value = newNec;
                liste.appendChild(option);
            }

            break;
        case 'Hotel' :
            selectListe = 'selectHôtels'; 
            
            liste = document.getElementById(selectListe);

            if (bool && nbrElementHotelPre>=1 && nbrElementHotelPre > elementHotelPre_N) {
                alert("la valeur suivant : " + liste.children[ elementHotelPre_N ].innerText + " dans liste "+ idNec +" a ete remplace par : " + newNec);
                liste.children[ elementHotelPre_N ].innerText =  newNec;
                liste.children[ elementHotelPre_N ].value =  newNec;
                elementHotelPre_N ++ ;
            }else{
                let option  = document.createElement('option');
                option.appendChild(text);
                option.value = newNec;
                liste.appendChild(option);
            }

            break;
        case 'Site' :
            let newNec1 = document.getElementById('Photo').value;
            let text1 = document.createTextNode(newNec1);

            selectListe = 'selectSites'; 
            selectListe1 = 'selectPhotos'; 
            
            liste = document.getElementById(selectListe);
            liste1 = document.getElementById(selectListe1);

            if (bool && nbrElementSitePre>=1 && nbrElementSitePre > elementSitePre_N) {
                alert("la valeur suivant : " + liste.children[ elementSitePre_N ].innerText + " dans liste "+ idNec +" a ete remplace par : " + newNec);

                liste.children[ elementSitePre_N ].innerText =  newNec;
                liste.children[ elementSitePre_N ].value =  newNec;


                liste1.children[ elementSitePre_N ].innerText =  newNec1;
                liste1.children[ elementSitePre_N ].value =  newNec1;
                elementSitePre_N ++ ;
            }else{
                let option  = document.createElement('option');
                option.appendChild(text);
                option.value = newNec;
                liste.appendChild(option);

                let option1  = document.createElement('option');
                option1.appendChild(text1);
                option1.value = newNec1;
                liste1.appendChild(option1);
            }
            
            break;
    }
        
      
}

function addSite(idNec1 , idNec2 , bool){
    if (document.getElementById(idNec1).value && document.getElementById(idNec2).value) {
        addDetails(idNec1 , bool);
    }else{
        alert('chaque site doit avoir une photo !! ');
    }
    
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

/* verifier la form  */
function checkForm(){
    continent = document.getElementById('Continent').value;
    pay = document.getElementById('Pays').value;

    isContinentsExist = false;
    isPaysExist = false;

    if (isContinentsExist && isPaysExist){
        alert("Les information de votre ville a ete ajoutees avec succes");
        document.frmMr.submit();
    }
    else{
        if ( !isContinentsExist && isPaysExist) {
            alert("Le continent que vous avez selectionnes ne se trouvent pas dans notre base de donne, \n veuillez les ajouter ou choisir un autre !!");
        }else if ( !isPaysExist && isContinentsExist) {
            alert("Le pays que vous avez selectionnes ne se trouvent pas dans notre base de donne, \n veuillez les ajouter ou choisir un autre !!");
        }else{
            alert("Le continent et le pays que vous avez selectionnes ne se trouvent pas dans notre base de donne, \n veuillez les ajouter ou choisir un autre pays et continent !!");
        }
    }
}