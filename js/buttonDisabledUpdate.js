// Modal update
    
    let inputCharNomUpdate = document.getElementById('update_nom');
    let inputCharPrenomUpdate = document.getElementById('update_prenom');
    let inputCharDateBirthUpdate = document.getElementById('update_ddn');
    let inputCharEmailUpdate = document.getElementById('update_email');
    let inputCharTelephoneUpdate = document.getElementById('update_tel');
    let inputCharAdresseUpdate = document.getElementById('update_adresse');
    let btnUpdate = document.getElementById('bouton-modifier');



    // Desactivation du bouton

    btnUpdate.disabled = true;

    // Ma fonction qui va permettre que le bouton soit cliquable ou non

    function isCharSetUpdate() {

    // Vérification des champs, tant qu'ils sont tous vides, le bouton enregistrer ne marchera pas

    if (inputCharNomUpdate.value != "" && inputCharPrenomUpdate.value != "" && inputCharDateBirthUpdate.value != "" && inputCharEmailUpdate.value != "" && inputCharTelephoneUpdate.value != "" && inputCharAdresseUpdate.value != ""){
        btnUpdate.disabled = false;
    } else {
        btnUpdate.disabled = true;
        }
    }