let change = document.getElementById('newCode');


if(change != null){
    change.addEventListener('submit',function(event){
        let code = document.forms["newCode"]["inputCode"].value;
        let length = String(code).length
        
        if (length != 0){
            if (length>15 || length<8){
                alert("veuillez renseigner un code valide");
                event.preventDefault();
            }
        }
        

    })
}
