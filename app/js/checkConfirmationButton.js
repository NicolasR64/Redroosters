// Affichage boîte de confirmation
document.getElementById('confirm-box').addEventListener('click', function(event) {
    if (confirm('Voulez-vous vraiment supprimer cet évènement ?')) {
        console.log('Oui')
    } else {
        event.preventDefault();
        console.log('Non'); 
    }
});