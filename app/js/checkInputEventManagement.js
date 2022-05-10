let button = document.querySelector('#submitButton');
let nom = document.querySelector('#inputName');
let submit = document.querySelector('#formEventManagement');
let match = document.querySelector('#inputMatch');


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
        nom.value="";
        alert("Nom erroné");
      }
    }
  }

submit.addEventListener('submit', handler = function(event){
    let name = document.forms["formEventManagement"]["inputName"].value;
    let beginDate = document.forms["formEventManagement"]["inputBeginDate"].value;
    let rdvHours = document.forms["formEventManagement"]["inputRdvHours"].value;
    let endDate = document.forms["formEventManagement"]["inputEndDate"].value;
    let rdvDate = document.forms["formEventManagement"]["inputRdvDate"].value;
    let endHour = document.forms["formEventManagement"]["inputEndHour"].value;
    let street = document.forms["formEventManagement"]["inputStreet"].value;
    let city = document.forms["formEventManagement"]["inputCity"].value;
    let postalCode = document.forms["formEventManagement"]["inputPostalCode"].value;
    let rdvStreet = document.forms["formEventManagement"]["inputRdvStreet"].value;
    let rdvCity = document.forms["formEventManagement"]["inputRdvCity"].value;
    let rdvPostalCode = document.forms["formEventManagement"]["inputRdvPostalCode"].value;

    errors = 0;

    if (name == "" && errors == 0){
        alert("Veuillez renseigner un nom");
        errors++;
    }
    if(beginDate == ""  && errors == 0){
        alert("Veuillez renseigner une date de début");
        errors++;
    }
    if(endDate == ""  && errors == 0){
        alert("Veuillez renseigner une date de fin");
        errors++;
    }
    if(rdvHours == ""  && errors == 0){
        alert("Veuillez renseigner une heure de rendez-vous");
        errors++;
    }
    if(rdvDate == ""  && errors == 0){
        alert("Veuillez renseigner une date de rendez-vous");
        errors++;
    }
    if(endHour == ""  && errors == 0){
        alert("Veuillez renseigner une heure de fin");
        errors++;
    }
    if(street == ""  && errors == 0){
        alert("Veuillez renseigner une rue");
        errors++;
    }
    if(city == ""  && errors == 0){
        alert("Veuillez renseigner une ville");
        errors++;
    }
    if(postalCode == ""  && errors == 0){
        alert("Veuillez renseigner un code postal");
        errors++;
    }
    if(rdvStreet == ""  && errors == 0){
        alert("Veuillez renseigner une rue de rendez-vous");
        errors++;
    }
    if(rdvCity == ""  && errors == 0){
        alert("Veuillez renseigner une rue de rendez-vous ");
        errors++;
    }
    if(rdvPostalCode == ""  && errors == 0){
        alert("Veuillez renseigner un code postal pour la ville de rendez-vous");
        errors++;
    }

    if(errors>0)event.preventDefault();
})

match.addEventListener('click',function(event){
    let status = match.checked;
    if(status){
        document.getElementById('match').classList.remove('d-none');
    } else {document.getElementById('match').classList.add('d-none');}
})
