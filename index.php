<?php

include ('includes/connection.php');

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <script src='js/dateHeure.js'></script>

    <title>T2i Télécom</title>
</head>

<body>

    <!-- Affichage de l'heure -->

    <div id="date">
        <script>
            afficherDate();
        </script>
      </div>
 
    <!-- Modal :  Superviseur Général -->
    <div id="ticket-container">
        <h3 class="display-4">Alarmes Libres</h3>

    </div>
    </div>

        <hr>

                </div>
                    <p id="message" class='text-dark'></p>
                    <!-- <p id="messageTicket" class='text-dark'></p>
                    <p id="update_messageTicket" class='text-dark'></p> -->
                    <div class="card-body">
                    <div id="table"></div>
                </div>

                
    <hr>

    <!-- Modal :  Alarmes Prises -->
    <div>
        <h3 class="display-4">Alarmes prises</h3>
    </div>

    <div id="move-ticket"></div>

    <!-- Modal :  Affichages des infos -->

    <hr>

        <h3 class="display-4">Zone d'affichage des infos</h3>

                <div id="container-ticket">
                <div id="detail-ticket"></div>

        </div>

        <hr>

        <div id="thumb-ticket"></div>
        
        <div class="button">
      
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       New Ticket
      </button>
      </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

              <form id=formulaire name="form" method="post" action="">

                <div class="form-group">
                    <label for="nom">Nom : </label>
                    <input id="nom" onkeyup="isCharSet()" type="text" class="form-control" name="nom" placeholder="Nom" maxlength="20"/>
                  </div>

                <div class="form-group">
                    <label for="prenom">Prénom : </label>
                    <input id="prenom" onkeyup="isCharSet()" type="text" class="form-control" name="prenom" placeholder="Prénom" maxlength="20"/>
                  </div>

                  <div class="form-group">
                    <label for="dateBirth">Date de naissance : </label>
                    <input id="ddn" onkeyup="isCharSet()" type="date" class="form-control" name="dateBirth" maxlength="8"/>
                  </div>

                  <div class="form-group">
                    <label for="email">Adresse mail : </label>
                    <input id="email" onkeyup="isCharSet()" type="email" class="form-control" name="email" placeholder="nassim@t2i.fr" maxlength="35"/>
                  </div>

                  <div class="form-group">
                    <label for="telephone">Téléphone : </label>
                    <input id="tel" onkeyup="isCharSet()" type="number" class="form-control" name="telephone" placeholder="0123456789" minlength="10" maxlength="10"/>
                  </div>

                  <div class="form-group">
                    <label for="nom">Adresse : </label>
                    <input id="adresse" onkeyup="isCharSet()" type="text" class="form-control" name="adresse" placeholder="99 Rue de" maxlength="50"/>
                  </div>
                
                  <!-- <button name="annuler" type="reset" method=post class="btn btn-primary" style="background-color:red; border-color: red;">Annuler</button> -->

              </div>
              <div class="modal-footer">
                <button id="bouton-fermer" name="fermer" type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="closeForm()">Fermer</button>
                <button id="bouton-ajout" name="enregistrer" type="submit" method=post class="btn btn-primary" onclick="closeForm()">Enregistrer</button>
              </div>
            </div>
          </div>
        </div>
        

        <!-- Update Modal -->

        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
              
              <form id=formulaire_update name="form" method="post" action="">

                <div class="form-group">

                    <input id="update_id" type="hidden" class="form-control" name="nom" placeholder="Nom" maxlength="20"/>

                    <label for="nom">Nom : </label>
                    <input id="update_nom" onkeyup="isCharSetUpdate()" type="text" class="form-control" name="nom" placeholder="Nom" maxlength="20"/>
                  </div>

                <div class="form-group">
                    <label for="prenom">Prénom : </label>
                    <input id="update_prenom" onkeyup="isCharSetUpdate()" type="text" class="form-control" name="prenom" placeholder="Prénom" maxlength="20"/>
                  </div>

                  <div class="form-group">
                    <label for="dateBirth">Date de naissance : </label>
                    <input id="update_ddn" onkeyup="isCharSetUpdate()" type="date" class="form-control" name="dateBirth" maxlength="8"/>
                  </div>

                  <div class="form-group">
                    <label for="email">Adresse mail : </label>
                    <input id="update_email" onkeyup="isCharSetUpdate()" type="email" class="form-control" name="email" placeholder="nassim@t2i.fr" maxlength="35"/>
                  </div>

                  <div class="form-group">
                    <label for="telephone">Téléphone : </label>
                    <input id="update_tel" onkeyup="isCharSetUpdate()" type="number" class="form-control" name="telephone" placeholder="0123456789" minlength="10" maxlength="10"/>
                  </div>

                  <div class="form-group">
                    <label for="nom">Adresse : </label>
                    <input id="update_adresse" onkeyup="isCharSetUpdate()" type="text" class="form-control" name="adresse" placeholder="99 Rue de" maxlength="50"/>
                  </div>
                
                  <!-- <button name="annuler" type="reset" method=post class="btn btn-primary" style="background-color:red; border-color: red;">Annuler</button> -->

              </div>
              <div class="modal-footer">
                <button id="bouton-fermer" name="fermer" type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="closeForm()">Fermer</button>
                <button id="bouton-modifier" name="enregistrer" type="submit" method=post class="btn btn-primary" onclick="closeForm()">Modifier</button>
              </div>
            </div>
          </div>
        </div>

      </form>

</body>

    <script src="js/jquery.js"></script>
    <script src='js/functions.js'></script>
    <script src="js/ajax.js"></script>
    <script src='js/bootstrap/bootstrap.js'></script>
    <script src='js/dateHeure.js'></script>
    <script type="text/javascript"> </script>
    <script src="js/resetForm.js"></script>
    <script src="js/buttonDisabled.js"></script>
    <script src="js/buttonDisabledUpdate.js"></script>

</html>