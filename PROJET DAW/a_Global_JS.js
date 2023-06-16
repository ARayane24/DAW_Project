 
 /* themes */


theme(cook()); // pour avoir la dernier theme selectione


function cook(){
  if(document.cookie){
    let themeTab = ['blue' , 'red' , 'green'];
    let coooke = document.cookie;

    for(let i = 0 ; i < 3 ; i++){
      if (coooke.search(themeTab[i]) > -1) 
        return themeTab[i];
      
    }  
    return 'd';
  }
}

function theme(color){
  document.cookie = color; // sauvgarde de theme dans le cookie
  
  let clr, bgclr , lcolor;

  let theme = document.querySelector(':root');
  

  switch(color){ // change les colors 
      case 'red'      : clr = "#fff0f0"; bgclr = "#ffccc6"; lcolor= "#fce0dd"; break; 
      case 'blue'     : clr = "#d2e8ff"; bgclr = "#95bcfc"; lcolor= "#c9ddff"; break; 
      case 'green'    : clr = "#eefae3"; bgclr = "#88e2ae"; lcolor= "#ccffe2"; break; 
      default  : clr = "#f2fcff"; bgclr = "#adddff"; lcolor = "#d7eeff"; break; 
  }

  // affecter les nouvelles colors
  theme.style.setProperty('--Background',bgclr);
  theme.style.setProperty('--front',clr);
  theme.style.setProperty('--borders',bgclr);
  theme.style.setProperty('--ButtonsBackgound',lcolor);
}

//////
/* nav fonctions*/
let isShown = false;
let clicked = false;
let element = document.getElementById("job");

function onclickShowHide() {
  clicked = !clicked;
}

element.addEventListener("mouseover", function () {
  if (!isShown && !clicked) {
    showHide();
  }
});

element.addEventListener("mouseout", function () {
  if (isShown && !clicked) {
    showHide();
  }
});

function showHide() {
  isShown = !isShown;
  let nav = document.getElementById("nav");
  let showHide = document.getElementById("show-hide");

  if (isShown) {
    showHide.innerHTML = "&#10094;"; // c-a-d: <
    document.getElementById("job").style.borderRadius = "20px"; //new nav border radius
    nav.style.display = "block";
  } else {
    showHide.innerHTML = "&#10095;"; // c-a-d: >
    nav.style.display = "none";
    document.getElementById("job").style.borderRadius = "100px"; //original nav border radius
  }
}

//////

/* header imges */
let h =document.getElementById('h'); // titre de page
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
    img1.style.left = '-1%';
    img1.style.transform = 'skew(15deg)';
    img1.style.margin = '5px';
    img1.style.marginTop = '0px';
    
    
    img2.style.width = '100%';
    img2.style.left = '-1%';
    img2.style.transform = 'skew(15deg)';
    img2.style.margin = '5px';
    img2.style.marginTop = '0px';
    
   

    img3.style.width = '100%';
    img3.style.left = '-1%';
    img3.style.transform = 'skew(15deg)';
    img3.style.margin = '5px';
    img3.style.marginTop = '0px';
    

    img4.style.width = '100%';
    img4.style.left = '-1%';
    img4.style.transform = 'skew(15deg)';
    img4.style.margin = '5px';
    img4.style.marginTop = '0px';
    
    img5.style.width = '100%';
    img5.style.left = '-1%';
    img5.style.transform = 'skew(15deg)';
    img5.style.margin = '5px';
    img5.style.marginTop = '0px';

}

if(img1) 
  img1.addEventListener("mouseover", function() {
  // detect hover sur img1
  img1Hover = !img1Hover;
  
    hideAll();

    img1.style.display = 'block';
    img1.style.width = '100%';
    img1.style.left = '0%';
    img1.style.margin = '0px';
    img1.style.transform = 'skew(0deg)';
    
  
});

if(img2) 
img2.addEventListener("mouseover", function() {
  // detect hover sur img2
  img2Hover = !img2Hover;

    hideAll();
  
    img2.style.display = 'block';
    img2.style.width = '100%';
    img2.style.left = '0%';  
    img2.style.transform = 'skew(0deg)';
    img2.style.margin = '0px';            
});

if(img3)
img3.addEventListener("mouseover", function() {
  // detect hover sur img3
  img3Hover = !img3Hover;

    hideAll();
  
    img3.style.display = 'block';
    img3.style.width = '100%';
    img3.style.left = '0%';
    img3.style.transform = 'skew(0)';
    img3.style.margin = '0px';
});

if(h)
h.addEventListener("mouseover", function() {
  // detect hover sur titre de page

    img3Hover = !img3Hover;

    hideAll();

    img3.style.display = 'block';
    img3.style.width = '100%';
    img3.style.left = '0%';
    img3.style.transform = 'skew(0)';
    img3.style.margin = '0px';

});

if(img4)
img4.addEventListener("mouseover", function() {
  // detect hover sur img4
  img4Hover = !img4Hover;

    hideAll();
  
    img4.style.display = 'block';
    img4.style.width = '100%';
    img4.style.left = '0%';
    img4.style.transform = 'skew(0deg)';
    img4.style.margin = '0px';
});

if(img5)
img5.addEventListener("mouseover", function() {
  // detect hover sur img5
  img5Hover = !img5Hover;

    hideAll();

    img5.style.display = 'block';
    img5.style.width = '100%';
    img5.style.left = '0%';
    img5.style.transform = 'skew(0deg)';
    img5.style.margin = '0px';
});

if(img1)
img1.addEventListener("mouseout", function() {
  // detect un-hover sur img1
    img1Hover = false;

    if( !img2Hover || !img3Hover || !img4Hover || !img5Hover)
        showAll();
  
});

if(img2)
img2.addEventListener("mouseout", function() {
  // detect un-hover sur img2
  img2Hover = false;

    if(!img1Hover || !img3Hover || !img4Hover || !img5Hover)
    showAll();
});

if(img3)
img3.addEventListener("mouseout", function() {
  // detect un-hover sur img3
    img3Hover = false;

    if(!img1Hover || !img2Hover || !img4Hover || !img5Hover){
        img3.style.transform = 'skew(15deg)';
        showAll();
    }
    
});

if(h)
h.addEventListener("mouseout", function() {
  // detect un-hover sur le titre de la page

    if(!img3Hover){
        img3.style.transform = 'skew(15deg)';

        showAll();
    }
    
});

if(img4)
img4.addEventListener("mouseout", function() {
  // detect un-hover sur img4
    img4Hover = false;

    if(!img1Hover || !img2Hover || !img3Hover || !img5Hover)
    showAll();
});

if(img5)
img5.addEventListener("mouseout", function() {
  // detect un-hover sur img5
    img5Hover = false;

    if(!img1Hover || !img2Hover || !img3Hover || !img4Hover)
    showAll();
});

/*    mouvement     */

function goTop(){
  //Pour revenir en haut de page
   return window.location.href = '#';
}


/*   preparations pour les affichages   */
function preparePage(){
  let Bodyleft = document.getElementById('Bodyleft');
  Bodyleft.style.borderRadius = '15px';
  let headerImg = document.getElementById('show');
  headerImg.style.borderRadius = '15px';
  
}
