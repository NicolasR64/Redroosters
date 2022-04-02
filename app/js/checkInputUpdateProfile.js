let submit = document.querySelector('#updtP');

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
    let fName = document.forms["updtP"]["inputFirstName"].value;
    let lName = document.forms["updtP"]["inputLastName"].value;
    let nckName = document.forms["updtP"]["inputNickName"].value;
    let dateBirth = document.forms["updtP"]["inputDateBirth"].value;
    let phone = document.forms["updtP"]["inputPhone"].value;
    let email = document.forms["updtP"]["inputMail"].value;
    let emgEmail = document.forms["updtP"]["inputEmergencyMail"].value;
    let parentMail = document.forms['updtP']['inputParentMail'].value;

    if(document.forms['updtP']["inputFunction"].value){
        //l'utilisateur est un staff
        let functionStaff = document.forms['updtP']["inputFunction"].value;
        let saStaff = document.forms['updtP']["inputSeasonArrivedStaff"].value;
    } else {
        //l'utilisateur est un player
        let positionPlayer = document.forms['updtP']["inputPosition"].value;
        let jsPlayer = document.forms['updtP']['inputJerseyNumber'].value;
        let hddPlayer = document.forms['updtP']["inputHandedness"].value;
        let saPlayer = document.forms['updtP']["inputSeasonArrivedPlayer"].value;
        let lcNbr = document.forms['updtP']['inputLicenseNumber'].value;
        let size = document.forms['updtP']['inputSize'].value;
        let weight = document.forms['updtP']['inputWeight'].weight;
    }

    errors = 0;

    //prénom
    if (fName == "") {
      alert("veuillez renseigner un prénom");
      errors++;
    }

    //surnom
    if (nckName == ""){
      alert("veuillez renseigner un surnom");
      errors++;
    }

    //nom
    if (lName == ""){
      alert("veuillez renseigner un nom");
      errors++;
    }

    //date de naissance
    if (dateBirth == ""){
      alert("veuillez renseigner une date de naissance");
      errors++;
    }

    //téléphone
    if (phone == ""){
      alert("veuillez renseigner un numéros de téléphone");
      errors++;
    }
    
    if(!phone.toLowerCase().match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im)){
      alert("veuillez renseigner un numéros de téléphone valide");
      errors++;
    }

    //email
    if (email == ""){
      alert("veuillez renseigner un email");
      errors++;
    }
    
    if(!email.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
      alert("veuillez renseigner un email valide");
      errors++;
    }
    
    event.preventDefault();
    if(errors == 0){
      xhr.open("GET","/app/ajax/emailCheckReg.php?email="+email,true);
      xhr.send(null);
    }

    //emergency email
    if (emgEmail == ""){
      alert("veuillez renseigner un email");
      errors++;
    }
    
    if(!emgEmail.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
      alert("veuillez renseigner un email valide");
      errors++;
    }

    //parentMail
    if (parentMail == ""){
      alert("veuillez renseigner un email");
      errors++;
    }
    
    if(!parentMail.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
      alert("veuillez renseigner un email valide");
      errors++;
    }

      

})



