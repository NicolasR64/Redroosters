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
        submit.removeEventListener('submit',handler);
        button.click();
      } else {
        category.value="";
        alert("Categorie et/ou année de la saison erroné");
      }
    }
  }

  //TODO changer le nom des forms 
submit.addEventListener('submit',handler = function(event){
    let email = document.forms["log"]["inputEmail"].value;
    let pwd = document.forms["log"]["inputPassword"].value;

    errors = 0;

    if (pwd == ""){
        alert("veuillez renseigner un mot de passe");
        errors++;
      }
    if (email == ""){
        alert("veuillez renseigner un email");
        errors++;
    }

    event.preventDefault();
      if(errors == 0){
        xhr.open("GET","/app/ajax/coCheckLog.php?email="+email+"&pwd="+pwd,true);
        xhr.send(null);
      }
})