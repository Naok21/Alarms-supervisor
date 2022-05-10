/**
* Permet d'afficher le formulaire
*/
function displayForm(){
    let openForm = document.getElementById('new-ticket');
    openForm.classList.add('new-ticket-click');
    openForm.classList.remove('new-ticket');
}
/**
* Permet de fermer le formulaire
*/
function closeForm(){
    let closeForm = document.getElementById('new-ticket');
    closeForm.classList.remove('new-ticket-click');
    closeForm.classList.add('new-ticket');
}