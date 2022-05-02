let checker = document.getElementById("all");

checker.addEventListener('click',function(event){
    let checkboxes = document.getElementsByName('invite[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = checker.checked;
    }
})