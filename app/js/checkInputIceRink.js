//TODO mettre les bons champs
let category = document.querySelector('#inputCategorie');
let seasonYear = document.querySelector('#inputSeasonYear');
let button = document.querySelector('#submitButton');
let submit = document.querySelector('#formLeagueManagement');

var errors = 0;

function getXhr(){
    var xhr = null;
    if(window.XMLHttpRequest || window.ActiveXObject){
        if(window.ActiveXObject){
            try{
                xhr = new ActiveXObject("Msxm12.XMLHTTP");
            } catch(e){
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    }
    return xhr;
  }
  
  var xhr = getXhr();
  
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0) ){
      var data=xhr.responseText.toString();
      console.log(data);
      if(data == "true"){
        submit.removeEventListener('submit',handler); //TODO changer le nom
        button.click();
      } else {
        category.value="";  //TODO changer le nom
        alert("Erreur");
      }
    }
  }

//TODO adapter avec les infos de la patinoire 
submit.addEventListener('submit',handler = function(event){
    let category = document.forms["formLeagueManagement"]["inputCategorie"].value;
    let seasonYear = document.forms["formLeagueManagement"]["inputSeasonYear"].value;

    errors = 0;

    if (category == ""){
        alert("veuillez renseigner la catégorie");
        errors++;
        event.preventDefault();
      }
    if (seasonYear == ""){
        alert("veuillez renseigner la saison");
        errors++;
        event.preventDefault();
    }
    if(seasonYear >=2100 || seasonYear <= 1980 && seasonYear != ""){
        alert("veuillez rentrer une année valide");
        errors++;
        event.preventDefault();
    }
   
})