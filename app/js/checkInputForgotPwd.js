let submit = document.querySelector('#forgot');
let button = document.querySelector('#mailSend');

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
    if(data == "true"){
      submit.removeEventListener('submit',handler);
      button.click();
    } else {
      alert("L'email n'existe pas");
    }
  }
}

submit.addEventListener('submit',handler = function(event){
    let email = document.forms["forgot"]["inputEmail"].value;
    errors = 0;
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
})