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

