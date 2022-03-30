let submit = document.querySelector('#insc');
let button = document.querySelector('#confStep2');

var existe;
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
    //var jsonResponse = (string) JSON.parse(data);
    //console.log(jsonResponse);
    if(data == "false"){
      submit.removeEventListener('submit',handler);
      button.click();
    } else {
      alert("L'email est déjà utilisée");
    }
  }
}

submit.addEventListener('submit',handler = function(event){
    let fName = document.forms["insc"]["inputFirstName"].value;
    let lName = document.forms["insc"]["inputLastName"].value;
    let dateBirth = document.forms["insc"]["inputDateBirth"].value;
    let phone = document.forms["insc"]["inputPhone"].value;
    let email = document.forms["insc"]["inputEmail"].value;
    let pwd = document.forms["insc"]["inputPassword"].value;
    let cPwd = document.forms["insc"]["inputPasswordConfirm"].value;

    errors = 0;

    if (fName == "") {
        alert("veuillez renseigner un prénom");
        errors++;
      }
      if (pwd == ""){
        alert("veuillez renseigner un mdp");
        errors++;
      }
      var reg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
      if (!reg.exec(pwd)){
        alert("veuillez renseigner un mdp contenant au minimum une majuscule, un chiffre et 8 caractères");
        errors++;
      }
      if (lName == ""){
        alert("veuillez renseigner un nom");
        errors++;
      }
      if (dateBirth == ""){
        alert("veuillez renseigner une date de naissance");
        errors++;
      }
      dateItem = new Date(dateBirth);
      if((dateItem === "Invalid Date") || isNaN(dateItem)){
        alert("veuillez rentrer une date valide (format aaaa-mm-jj)");
        errors++;
      }
      if (email == ""){
        alert("veuillez renseigner un email");
        errors++;
      }
      if(!email.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        alert("veuillez renseigner un email valide");
        errors++;
      }
      if (phone == ""){
        alert("veuillez renseigner un numéros de téléphone");
        errors++;
      }
      if(!phone.toLowerCase().match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im)){
        alert("veuillez renseigner un numéros de téléphone valide");
        errors++;
      }
      if (!(cPwd == pwd)){
        alert("Le mot de passe et la confirmation ne correspondent pas");
        errors++;
      }
      event.preventDefault();
      if(errors == 0){
        xhr.open("GET","/app/ajax/emailCheckReg.php?email="+email,true);
        xhr.send(null);
      }
      

})



