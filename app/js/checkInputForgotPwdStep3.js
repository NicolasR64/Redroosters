let change = document.querySelector('#newPwd');

var errors = 0;

change.addEventListener('submit',function(event){
    let pwd = document.forms["newPwd"]["inputPwd"].value;
    let cPwd = document.forms["newPwd"]["inputCPwd"].value;

    errors = 0;

    if (pwd == ""){
      alert("veuillez renseigner un mdp");
      errors++;
    }
    var reg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
    if (!reg.exec(pwd)){
      alert("veuillez renseigner un mdp contenant au minimum une majuscule, un chiffre et 8 caractères");
      errors++;
    }
    if (!(cPwd == pwd)){
      alert("Le mot de passe et la confirmation ne correspondent pas");
      errors++;
    }
    if(errors>0)event.preventDefault();
})