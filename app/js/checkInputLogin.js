let submit = document.querySelector('#log');
let button = document.querySelector('#logButton');
let mdp = document.querySelector('#inputPassword');

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
        mdp.value="";
        alert("Email et/ou mot de passe erroné");
      }
    }
  }

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