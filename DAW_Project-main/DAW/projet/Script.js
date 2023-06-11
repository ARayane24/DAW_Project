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
 //////
              /* header imges */
            let h =document.getElementById('h');
            let img1 = document.getElementById('id1');
            let img2 =document.getElementById('id2');
            let img3 =document.getElementById('id3');
            let img4 =document.getElementById('id4');
            let img5 =document.getElementById('id5');
            
            let img1Hover = false;
            let img2Hover = false;
            let img3Hover = false;
            let img4Hover = false;
            let img5Hover = false;

            function hideAll() {
                 img1.style.display = 'none';
                 img2.style.display = 'none';
                 img3.style.display = 'none';
                 img4.style.display = 'none';
                 img5.style.display = 'none';
            }

            function showAll() {
                 img1.style.display = 'block';
                 img2.style.display = 'block';
                 img3.style.display = 'block';
                 img4.style.display = 'block';
                 img5.style.display = 'block';

                img1.style.width = '100%';

                img2.style.width = '100%';

                img3.style.width = '100%';
                
                img4.style.width = '100%';

                img5.style.width = '100%';        
            }

            img1.addEventListener("mouseover", function() {
              img1Hover = !img1Hover;
              
                hideAll();
                img1.style.display = 'block';
                img1.style.width = '100%';
                img1.style.left = '0%';
              
            });

            img2.addEventListener("mouseover", function() {
              img2Hover = !img2Hover;
                hideAll();
                img2.style.display = 'block';
                img2.style.width = '100%';
                img2.style.left = '0%';              
            });
            
            img3.addEventListener("mouseover", function() {
              img3Hover = !img3Hover;
                hideAll();
                img3.style.display = 'block';
                img3.style.width = '100%';
                img3.style.left = '0%';
            });

            h.addEventListener("mouseover", function() {
                hideAll();
                img3.style.display = 'block';
                img3.style.width = '100%';
                img3.style.left = '0%';
                img3.style.transform = 'skew(0)';
                img3.style.margin = '0px';
            });

            img4.addEventListener("mouseover", function() {
              img4Hover = !img4Hover;
                hideAll();
                img4.style.display = 'block';
                img4.style.width = '100%';
                img4.style.left = '0%';
              
            });

            img5.addEventListener("mouseover", function() {

              img5Hover = !img5Hover;
                hideAll();
                img5.style.display = 'block';
                img5.style.width = '100%';
                img5.style.left = '0%';
            });


            img1.addEventListener("mouseout", function() {
                if( !img2Hover || !img3Hover || !img4Hover || !img5Hover)
                    showAll();
              
            });

            img2.addEventListener("mouseout", function() {
                if(!img1Hover || !img3Hover || !img4Hover || !img5Hover)
                showAll();
            });
            
            img3.addEventListener("mouseout", function() {
                if(!img1Hover || !img2Hover || !img4Hover || !img5Hover){
                    img3.style.transform = 'skew(15deg)';
                    showAll();
                }
                
            });

            h.addEventListener("mouseout", function() {
                if(!img3Hover){
                    img3.style.transform = 'skew(15deg)';
                    showAll();
                }
                
            });

            img4.addEventListener("mouseout", function() {
                if(!img1Hover || !img2Hover || !img3Hover || !img5Hover)
                showAll();
            });

            img5.addEventListener("mouseout", function() {
                if(!img1Hover || !img2Hover || !img3Hover || !img4Hover)
                showAll();
            });