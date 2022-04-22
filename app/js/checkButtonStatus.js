let active = 0;

document.getElementById("btn").onclick = function(){

    let propriete = document.getElementById("btn");
    
  
    if(active == 0){
      propriete.style.backgroundColor = "#00FF00";
      propriete.style.borderColor = "#00FF00";
      propriete.innerHTML = "Présent";
      propriete.style.boxShadow = "0 0 0 0.25rem rgb(0 255 0 / 50%)";
      active = 1;
      
    }else{
      propriete.innerHTML = "Absent";
      propriete.style.backgroundColor = "#dc3545";
      propriete.style.borderColor = "#dc3545";
      propriete.style.boxShadow = "0 0 0 0.25rem rgb(225 83 97 / 50%)";
      active = 0;
    }
}