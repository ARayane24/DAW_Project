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

////

            /* nav fonctions*/
            let isShown = false;
            let clicked = false;
            let element = document.getElementById('job');

            function onclickShowHide(){
                clicked = !clicked;
            }
            
            element.addEventListener("mouseover", function() {
                if (!isShown && !clicked) {
                    showHide();
                }
            });

            element.addEventListener("mouseout", function() {
                if (isShown && !clicked) {
                    showHide();
                }
            });

            
            

            function showHide(){
                isShown = !isShown;
                let nav = document.getElementById('nav');
                let showHide = document.getElementById('show-hide');

                if (isShown) {
                   
                    showHide.innerHTML ='&#10094;';
                  

                    document.getElementById("job").style.borderRadius = '20px';
                    nav.style.display = "block";
                }else{
                    
                    showHide.innerHTML ='&#10095;';
                    

                    nav.style.display = "none";
                    document.getElementById("job").style.borderRadius = '100px';
                }
            }
            //////

            /* add functions*/

            function addAéroport(){
                let newAeroport = document.getElementById('Aéroports').value;
                let text = document.createTextNode(newAeroport);
                let option  = document.createElement('option');
                option.appendChild(text);

                let selectAéroports = document.getElementById('selectAéroports');
                selectAéroports.appendChild(option);
            }

            function addGares(){
                let newGares = document.getElementById('Gares').value;
                let text = document.createTextNode(newGares);
                let option  = document.createElement('option');
                option.appendChild(text);

                let selectGares = document.getElementById('selectGares');
                selectGares.appendChild(option);
            }

            function addRestaurants(){
                let newRestaurants = document.getElementById('Restaurants').value;
                let text = document.createTextNode(newRestaurants);
                let option  = document.createElement('option');
                option.appendChild(text);

                let selectRestaurants = document.getElementById('selectRestaurants');
                selectRestaurants.appendChild(option);
            }

            function addHôtels(){
                let newHôtels = document.getElementById('Hôtels').value;
                let text = document.createTextNode(newHôtels);
                let option  = document.createElement('option');
                option.appendChild(text);

                let selectHôtels = document.getElementById('selectHôtels');
                selectHôtels.appendChild(option);
            }