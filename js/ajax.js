$(document).ready(function () {
    sendTicket();
    getTickets();
    deleteTicket();
    getOneTicket();
    editTicket();
    updateTicket();
    moveTicket();
})

function sendTicket() {
    $(document).on('click', '#bouton-ajout', function () {
        let nom = $('#nom').val();
        let prenom = $('#prenom').val();
        let ddn = $('#ddn').val();
        let email = $('#email').val();
        let telephone = $('#tel').val();
        let adresse = $('#adresse').val();
        

      
            $.ajax({
                method: 'post',
                url: 'insertTicket.php',
                data: {
                    nom: nom,
                    prenom: prenom,
                    ddn: ddn,
                    telephone: telephone,
                    email: email,
                    adresse: adresse,
                },
                success: function (data) {
                    $('#message').html('Votre ticket à bien été sauvegardé.');
                    $('#NewTicket').modal('show');
                    getTickets();
                },
            })
        })
   
}

function getTickets() {
    $.ajax({
        type: 'post',
        url: 'getTickets.php',
        success: function (data) {
            console.log(data)

            data = $.parseJSON(data);
            if (data.status == 'success') {
                $('#table').html(data.html)
            }
        }
    });
}

function editTicket() {
    $(document).on('click', '#edit-ticket', function(){
        let id = $(this).attr('ticketId');
        $.ajax(
            {
                url: 'editTicket.php',
                method: 'post',
                data: {IdTicket: id},
                dataType: 'JSON',
                success: function(data)
                {
                    $('#update_id').val(data[0]);
                    $('#update_nom').val(data[1]);
                    $('#update_prenom').val(data[2]);
                    $('#update_ddn').val(data[3]);
                    $('#update_email').val(data[4]);
                    $('#update_tel').val(data[5]);
                    $('#update_adresse').val(data[6]);
                    $('#update').modal('show');
                }

            })
    })
}

 function updateTicket() {
  
     $(document).on('click', '#bouton-modifier', function()
     {
         
        let updateId = $('#update_id').val();
        let updateNom = $('#update_nom').val();
        let updatePrenom = $('#update_prenom').val();
        let updateDdn = $('#update_ddn').val();
        let updateEmail = $('#update_email').val();
        let updateTelephone = $('#update_tel').val();
        let updateAdresse = $('#update_adresse').val();

        $.ajax(
            {
                url: 'updateTicket.php',
                method: 'post',
                data: {
                    id: updateId,
                    nom: updateNom,
                    prenom: updatePrenom,
                    ddn: updateDdn,
                    email: updateEmail,
                    telephone: updateTelephone,
                    adresse: updateAdresse,
                },
                success: function(data)
                {
                    $('#message').html('Les modifications ont bien été enregistrées.');
                }
            })
     })
 }


function deleteTicket() {
    $(document).on('click', '#delete-ticket', function () {

        let res = confirm("Êtes-vous sûr de vouloir supprimer?");
        let id = +$(this).attr('ticketId');
        /*   console.log(id)*/
        if (!id) {
            $('#message').html('Problème lors de la suppression.');
        }
         else if (!res) {
             return;
         }
        else {
            $.ajax({
                url: 'deleteTicket.php',
                method: 'post',
                data: {
                    IdTicket: id
                },
                success: function (data) {
                    $('#message').html('Le ticket a été supprimé.');

                    getTickets();
                }
            })
        }
    })
}

function getOneTicket() {
    $(document).on('dblclick', '#card-ticket', function () {

        let id = +$(this).attr('ticketId');

        if (!id) {
            $('#message').html('Problème pour récupérer le ticket.');
        }
        else {
            $.ajax({
                url: 'getOneTicket.php',
                method: "post",
                data: {
                    IdTicket: id
                },
                success: function (data) {
                    data = $.parseJSON(data);
                    if (data.status == 'success') {
                        $('#detail-ticket').html(data.html)
                   console.log(data); }
                }
                
            })
        }
  

    })
}

function moveTicket() {
    $(document).on('dblclick', '#card-ticket', function () {

        let id = +$(this).attr('ticketId');

        if (!id) {
            $('#message').html('Problème pour récupérer le ticket.');
        }
        else {
            $.ajax({
                url: 'moveTicket.php',
                method: "post",
                data: {
                    IdTicket: id
                },
                success: function (data) {
                    data = $.parseJSON(data);
                    if (data.status == 'success') {
                        $('#move-ticket').html(data.html)
                   console.log(data); }
                }
                
            })
        }
  

    })
}


function hide() {
    
}

function show() {
    
}