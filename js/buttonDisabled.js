window.addEventListener("DOMContentLoaded", (event) => {
    console.log("DOM entièrement chargé et analysé");
  });

    // Modal de base
    
    let inputCharNom = document.getElementById('nom');
    let inputCharPrenom = document.getElementById('prenom');
    let inputCharDateBirth = document.getElementById('ddn');
    let inputCharEmail = document.getElementById('email');
    let inputCharTelephone = document.getElementById('tel');
    let inputCharAdresse = document.getElementById('adresse');
    let btn = document.getElementById('bouton-ajout');



    // Desactivation du bouton

    btn.disabled = true;

    // Ma fonction qui va permettre que le bouton soit cliquable ou non

    function isCharSet() {

    // Vérification des champs, tant qu'ils sont tous vides, le bouton enregistrer ne marchera pas

    if (inputCharNom.value != "" && inputCharPrenom.value != "" && inputCharDateBirth.value != "" && inputCharEmail.value != "" && inputCharTelephone.value != "" && inputCharAdresse.value != ""){
        btn.disabled = false;
    } else {
        btn.disabled = true;
        }
    }


    // function isCharSetPrenom() {

    // // Vérification des champs, tant qu'ils sont tous vides, le bouton enregistrer ne marchera pas

    // if (inputCharPrenom.value != "") {
    //     btn.disabled = false;
    // } else {
    //     btn.disabled = true;
    // }  
    // }

    // function isCharSetDateBirth() {

    // // Vérification des champs, tant qu'ils sont tous vides, le bouton enregistrer ne marchera pas

    // if (inputCharDateBirth.value != "") {
    //     btn.disabled = false;
    // } else {
    //     btn.disabled = true;
    // }  
    // }

    // function isCharSetEmail() {

    // // Vérification des champs, tant qu'ils sont tous vides, le bouton enregistrer ne marchera pas

    // if (inputCharEmail.value != "") {
    //     btn.disabled = false;
    // } else {
    //     btn.disabled = true;
    // }  
    // }

    // function isCharSetTelephone() {

    // // Vérification des champs, tant qu'ils sont tous vides, le bouton enregistrer ne marchera pas

    // if (inputCharTelephone.value != "") {
    //     btn.disabled = false;
    // } else {
    //     btn.disabled = true;
    // }  
    // }

    // function isCharSetAdresse() {

    // // Vérification des champs, tant qu'ils sont tous vides, le bouton enregistrer ne marchera pas

    // if (inputCharAdresse.value != "") {
    //     btn.disabled = false;
    // } else {
    //     btn.disabled = true;
    // }  
    // }
