let submit = document.querySelector('#submitUpdateProfile');

var existe;

//Il reste à  check le mail par ajax et c'est fini

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
        alert("Email et/ou mot de passe erroné");
      }
    }
  }

submit.addEventListener('submit',handler = function(event){
    var errors = 0;

    let fName = document.forms["submitUpdateProfile"]["inputFirstName"].value;
    let lName = document.forms["submitUpdateProfile"]["inputLastName"].value;
    let nckName = document.forms["submitUpdateProfile"]["inputNickName"].value;
    let mail = document.forms["submitUpdateProfile"]["inputMail"].value;
    let emgMail = document.forms["submitUpdateProfile"]["inputEmergencyMail"].value;
    let parentMail = document.forms['submitUpdateProfile']['inputParentMail'].value;
    let dateBirth = document.forms["submitUpdateProfile"]["inputDateBirth"].value;
    let phone = document.forms["submitUpdateProfile"]["inputPhone"].value;

    //FAIRE TEST
    //WORK
    //prénom
    let FirstNameError = document.getElementById("FirstNameError");
    if (fName == ""){
      FirstNameError.innerHTML  = "veuillez renseigner un prénom!";
      errors++;
    }else if(fName.length < 2){
      FirstNameError.innerHTML  = "prénom trop court!";
      errors++;
    }else if(fName.length > 50){
      FirstNameError.innerHTML  = "prénom trop long!";
      errors++;
    }else{
      FirstNameError.innerHTML  = "";
    }

    //FAIRE TEST
    //WORK
    //nom
    let LastNameError = document.getElementById("LastNameError");
    if (lName == ""){
      LastNameError.innerHTML  = "veuillez renseigner un nom!";
      errors++;
    }else if(lName.length < 2){
      LastNameError.innerHTML  = "nom trop court!";
      errors++;
    }else if(lName.length > 50){
      LastNameError.innerHTML  = "nom trop long!";
      errors++;
    }else{
      LastNameError.innerHTML  = " ";
    }

    //FAIRE TEST
    //WORK
    //surnom
    let NickNameError = document.getElementById("NickNameError");
    if (nckName == ""){
      NickNameError.innerHTML  = "veuillez renseigner un nom!";
      errors++;
    }else if(nckName.length < 2){
      NickNameError.innerHTML  = "nom trop court!";
      errors++;
    }else if(nckName.length > 50){
      NickNameError.innerHTML  = "nom trop long!";
      errors++;
    }else{
      NickNameError.innerHTML  = "";
    }

    //FAIRE TEST
    //WORK
    //Mail
    let MailError = document.getElementById("MailError");
    if(!mail.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
      MailError.innerHTML  = "veuillez renseigner un mail valide!";
      errors++;
    }else if(mail == ""){
      MailError.innerHTML  = "veuillez renseigner un mail!";
      errors++;
    }else if(mail.length < 10){
      MailError.innerHTML  = "mail trop court!";
      errors++;
    }else if(mail.length > 255){
      MailError.innerHTML  = "mail trop long!";
      errors++;
    }else{
      MailError.innerHTML  = "";
    }

    //FAIRE TEST
    //WORK
    //EmergencyMail
    let EmergencyMailError = document.getElementById("EmergencyMailError");
    if(emgMail != "Non Renseignée"){
      if(!emgMail.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        EmergencyMailError.innerHTML  = "veuillez renseigner un mail valide!";
        errors++;
      }else if(emgMail == ""){
        EmergencyMailError.innerHTML  = "veuillez renseigner un mail!";
        errors++;
      }else if(emgMail.length < 10){
        EmergencyMailError.innerHTML  = "mail trop court!";
        errors++;
      }else if(emgMail.length > 255){
        EmergencyMailError.innerHTML  = "mail trop long!";
        errors++;
      }else{
        EmergencyMailError.innerHTML  = "";
      }
    }

    
    //FAIRE TEST
    //WORK
    //ParentMail
    let ParentMailError = document.getElementById("ParentMailError");
    if(parentMail != "Non renseignée"){
      if(!parentMail.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){

        ParentMailError.innerHTML  = "veuillez renseigner un mail valide!";
        errors++;
      }else if(parentMail == ""){
        errors++;
        ParentMailError.innerHTML  = "veuillez renseigner un mail!";
      }else if(parentMail.length < 10){
        ParentMailError.innerHTML  = "mail trop court!";
        errors++;
      }else if(parentMail.length > 255){
        ParentMailError.innerHTML  = "mail trop long!";
        errors++;
      }else{
        ParentMailError.innerHTML  = "";
      }
    }

    //FAIRE TEST
    //WORK
    //date de naissance
    let DateBirthError = document.getElementById("DateBirthError");
    if (dateBirth == ""){
      DateBirthError.innerHTML  = "veuillez renseigner une date de naissance!";
      errors++;
    }else{
      DateBirthError.innerHTML = "";
    }
    
    //FAIRE TEST
    //WORK
    //téléphone
    let PhoneError = document.getElementById("PhoneError");
    if (phone == ""){
      PhoneError.innerHTML  = "veuillez renseigner un numéros de téléphone!";
      errors++;
    }else if(!phone.match(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/im)){
      PhoneError.innerHTML  = "veuillez renseigner un numéros de téléphone valide!";
      errors++;
    }else{
      PhoneError.innerHTML = "";
    }

    
    let isStaff = document.forms['submitUpdateProfile']["isStaff"].value
    if(isStaff == 1){
      //l'utilisateur est un staff
      let functions = document.forms['submitUpdateProfile']["inputFunction"].value;
      let seasonArrivedStaff = document.forms['submitUpdateProfile']["inputSeasonArrivedStaff"].value;

      /* STAFF */
    
      //FAIRE TEST
      //WORK
      //Fonction staff
      let FunctionStaffError = document.getElementById("FunctionStaffError");
      if(functions == ""){
        FunctionStaffError.innerHTML  = "veuillez renseigner une fonction!";
        errors++;
      }else{
        FunctionStaffError.innerHTML  = "";
      }

      //FAIRE TEST
      //Work
      //season d'arrivée
      let SeasonArrivedError = document.getElementById("SeasonArrivedError");
      if (seasonArrivedStaff == ""){
        SeasonArrivedError.innerHTML  = "veuillez renseigner une date d'arrivée!";
        errors++;
      }else{
        SeasonArrivedError.innerHTML = "";
      }

    }else{
      //l'utilisateur est un joueur
      let position = document.forms['submitUpdateProfile']["inputPosition"].value;
      let jsPlayer = document.forms['submitUpdateProfile']['inputJerseyNumber'].value;
      let seasonArrivedPlayer = document.forms['submitUpdateProfile']["inputSeasonArrivedPlayer"].value;
      let hddPlayer = document.forms['submitUpdateProfile']["inputHandedness"].value;
      let lcNbr = document.forms['submitUpdateProfile']['inputLicenseNumber'].value;
      let size = document.forms['submitUpdateProfile']['inputSize'].value;
      let weight = document.forms['submitUpdateProfile']['inputWeight'].value;      
      let isSick = document.form['submitUpdateProfile']['inputIsSick'].value;
      let isBan = document.form['submitUpdateProfile']['inputIsBan'].value;
      let isCarpooling = document.form['submitUpdateProfile']['inputIsCarpooling'].value; 

      /* PLAYER */
    
      //FAIRE TEST
      //WORK
      //Position
      let PositionError = document.getElementById("PositionError");
      if (position == ""){
        PositionError.innerHTML  = "veuillez renseigner une date d'arrivée!";
        errors++;
      }else{
        PositionError.innerHTML = "";
      }

      //FAIRE TEST
      //WORK
      //jersey number
      let JerseyNumberError = document.getElementById("JerseyNumberError");
      if (jsPlayer == ""){
        JerseyNumberError.innerHTML  = "veuillez renseigner un numéro de maillot!";
        errors++;
      }else if(jsPlayer < 0 && jsPlayer > 99){
        JerseyNumberError.innerHTML  = "veuillez renseigner un numéro de maillot valide!";
        errors++;
      }else{
        JerseyNumberError.innerHTML  = "";
      }

      //FAIRE TEST
      //Work
      //season d'arrivée
      let SeasonArrivedError = document.getElementById("SeasonArrivedError");
      if (seasonArrivedPlayer == ""){
        SeasonArrivedError.innerHTML  = "veuillez renseigner une date d'arrivée!";
        errors++;
      }else{
        SeasonArrivedError.innerHTML = "";
      }

      //FAIRE TEST
      //WORK
      //handedness
      let handednessError = document.getElementById("handednessError");
      if (hddPlayer == ""){
        handednessError.innerHTML = "Veuillez renseigner une valeur!";
        errors++;
      }else if(hddPlayer != 1 && hddPlayer != 0){
        handednessError.innerHTML = "Veuillez renseigner une valeur valide!";
        errors++;
      }else{
        handednessError.innerHTML = "";
      }
    
      //FAIRE TEST
      //WORK
      //license number
      let licenseNumberError = document.getElementById("licenseNumberError");
      if (lcNbr == ""){
        licenseNumberError.innerHTML = "veuillez renseigner un numéro de license";
        errors++;
      }else if(lcNbr.length > 10 || lcNbr.length < 2){
        licenseNumberError.innerHTML = "veuillez renseigner un numéro de license valide";
        errors++;
      }else{
        licenseNumberError.innerHTML = "";
      }

      //FAIRE TEST
      //WORK
      //size
      let sizeError = document.getElementById("sizeError");
      if (size == ""){
        sizeError.innerHTML = "veuillez renseigner une taille";
        errors++;
      }else if(size > 250 || size < 120){
        sizeError.innerHTML = "veuillez renseigner une taille valide";
        errors++;
      }else{
        sizeError.innerHTML = "";
      }

      //FAIRE TEST
      //WORK
      //height
      let weightError = document.getElementById("weightError");
      if (weight == ""){
        weightError.innerHTML = "veuillez renseigner un poid";
        errors++;
      }else if(weight > 250 || weight < 30){
        weightError.innerHTML = "veuillez renseigner un poid valide";
        errors++;
      }else{
        weightError.innerHTML = "";
      }

      //FAIRE TEST
      //WORK
      //isSick
      let isSickError = document.getElementById("isSickError");
      if (isSick == ""){
        isSickError.innerHTML = "Veuillez renseigner une valeur!";
        errors++;
      }else if(isSick != 1 && isSick != 0){
        isSickError.innerHTML = "Veuillez renseigner une valeur valide!";
        errors++;
      }else{
        isSickError.innerHTML = "";
      }

      //FAIRE TEST
      //WORK
      //isBan
      let isBanError = document.getElementById("isBanError");
      if (isBan == ""){
        isBanError.innerHTML = "Veuillez renseigner une valeur!";
        errors++;
      }else if(isBan != 1 && isBan != 0){
        isBanError.innerHTML = "Veuillez renseigner une valeur valide!";
        errors++;
      }else{
        isBanError.innerHTML = "";
      }

      
      //FAIRE TEST
      //
      //isCarpooling
      let isCarpoolingError = document.getElementById("isCarpoolingError");
      if (isCarpooling == ""){
        isCarpoolingError.innerHTML = "Veuillez renseigner une valeur!";
        errors++;
      }else if(isCarpooling != 1 && isCarpooling != 0){
        isCarpoolingError.innerHTML = "Veuillez renseigner une valeur valide!";
        errors++;
      }else{
        isCarpoolingError.innerHTML = "";
      }

  }
  

    alert(errors);
    if(errors>0)event.preventDefault();
    
    /*
    event.preventDefault();
    if(errors == 0){
      xhr.open("GET","/app/ajax/emailCheckReg.php?email="+mail,true);
      xhr.send(null);
    } 
    */
});
