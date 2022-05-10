<?php

require_once('includes/connection.php');
   
    /**
     * Fonction pour enregistrer un ticket en base de données
     * @return void
     */
function sendTicket(){
    require_once('classTicket.php');

    error_log(json_encode($_POST));

       $nom = $_POST["nom"];
       $prenom = $_POST["prenom"];
       $ddn = $_POST["ddn"];
       $email = $_POST["email"];
       $tel = $_POST["telephone"];       
       $adresse = $_POST["adresse"];
           
        $dbh = dbConnect("miniProjet", "root", "");

        $query = "INSERT INTO ticket ( nom, prenom, ddn, email, telephone, adresse) VALUES (:nom, :prenom, :ddn, :email, :telephone, :adresse)";      
        try{
            $stmt = $dbh -> prepare($query);       
            $stmt -> execute([
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":ddn" => $ddn,
                ":email"=> $email,
                ":telephone" => $tel,
                ":adresse" => $adresse,
            ]);
        }
        catch(Exception $e) {
                //En cas d'erreur :
                echo "Problème lors de la requète : " . $e->getMessage();            
        } 

        /* Test pour vérifier si la contrainte d'unicité sur un email a été déclenché. Si c'est le cas, le code d'état 23000 et le code d'erreur 1062 seront renvoyé dans errorInfo */
        if ($stmt->errorInfo()[0] === "23000" && $stmt->errorInfo()[1] === 1062) {           
            echo " L'adresse ". $email . " existe déjà !";
        }

}

function getTickets()
{
    $dbh = dbConnect("miniProjet", "nassim", "root");

  // var_dump($dbh->quote() );
    $valeur = "";
    $valeur ='<table class ="table">
                <div>  
                    <tr>                
                        <td class="tableName"> Nom : </td>                                        
                                      
                    </tr>
                </div>';
  
    $query = "SELECT * from ticket";
    try{
        $stmt = $dbh->prepare($query);
        $stmt-> execute();
    }
    catch(Exception $e) {
        //En cas d'erreur :
        echo "Problème lors de la requète" . $e->getMessage();            
    }     

    $result = $stmt-> fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row){
            // On récupère l'ID de chaque ticket
                $id = +$row["id"] ;

                $valeur .= '
                        <div > 
                            <tr>
                                <td id="card-ticket" ticketId='.$id.' ondblclick="getOneTicket()">'. htmlspecialchars(ucfirst(strtoupper($row["nom"]))).'                        
                                <input type="button" class = "button-close btn btn-danger" id = "delete-ticket" ticketId='.$id.' value="Supprimer">
                                <input type="button" class = "btn btn-dark" id = "edit-ticket" ticketId='.$id.' value="Modifier"></td>
                            </tr>
                        </div>';
            
        }
    $valeur .= '</table>'; 
    echo json_encode(['status'=> 'success', 'html'=> $valeur]);
}

function moveTicket()
{
    
    $dbh = dbConnect("miniProjet", "root", "");



  // var_dump($dbh->quote() );
    $valeur = "";
    $valeur ='<table class ="table">
                <div>  
                    <tr>                
                        <td class="tableName"> Nom : </td>                                        
                                      
                    </tr>
                </div>';

    $IdTicket = +$_POST['IdTicket'];
    
    $query = "SELECT * from ticket WHERE id = $IdTicket ";
    $data = [$IdTicket];

    try{
        $stmt = $dbh->prepare($query);
        $stmt-> execute($data);
    }
    catch(Exception $e) {
        //En cas d'erreur :
        echo "Problème lors de la requète" . $e->getMessage();            
    }     

    $result = $stmt-> fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row){
            // On récupère l'ID de chaque ticket
            $id = +$row["id"] ;

                $valeur .= '
                        <div > 
                            <tr>
                               
                                <td id="move-ticket" ticketId='.$id.'>'. htmlspecialchars(ucfirst(strtoupper($row["nom"]))).'                        
                                <input type="button" class = "button-close btn btn-danger" id = "delete-ticket" ticketId='.$id.' value="Supprimer">
                                <input type="button" class = "btn btn-dark" id = "edit-ticket" ticketId='.$id.' value="Modifier"></td>
                            </tr>
                        </div>';
            
        }
    $valeur .= '</table>'; 
    echo json_encode(['status'=> 'success', 'html'=> $valeur]);
}

function editTicket(){

    $dbh = dbConnect("miniProjet", "root", "");
    
    $IdTicket = $_POST['IdTicket'];
    $editTicket = "SELECT * FROM ticket WHERE id = $IdTicket";

    try{
        $stmt= $dbh->prepare($editTicket);
        $stmt-> execute();
    }
    catch(Exception $e) {
        //En cas d'erreur :
        echo "Problème lors de la requète" . $e->getMessage();            
    } 

    $result = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row){

        $userData = "";
        $userData[0]=$row['id'];
        $userData[1]=$row['nom'];
        $userData[2]=$row['prenom'];
        $userData[3]=$row['ddn'];
        $userData[4]=$row['email'];
        $userData[5]=$row['telephone'];
        $userData[6]=$row['adresse'];
    }
    
    echo json_encode($userData);
}

function updateTicket(){

    $dbh = dbConnect("miniProjet", "root", "");

    $updateId = $_POST['id'];
    $updateNom = $_POST['nom'];
    $updatePrenom = $_POST['prenom'];
    $updateDdn = $_POST['ddn'];
    $updateEmail = $_POST['email'];
    $updateTelephone = $_POST['telephone'];
    $updateAdresse = $_POST['adresse'];

    $query = "UPDATE ticket SET nom='$updateNom', prenom='$updatePrenom', ddn='$updateDdn', email='$updateEmail', telephone='$updateTelephone', adresse='$updateAdresse' WHERE id='$updateId'";
    
    try{
        $stmt= $dbh->prepare($query);
        // $stmt-> execute();
         $stmt-> execute([
             "nom" => $updateNom,
             "prenom" => $updatePrenom,
             "ddn" => $updateDdn,
             "email"=> $updateEmail,
             "telephone" => $updateTelephone,
             "adresse" => $updateAdresse,
         ]);

    }
    catch(Exception $e) {
        //En cas d'erreur :
        echo "Problème lors de la requète" . $e->getMessage();            
    } 

    $result = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    
    if ($result) {
        echo 'Vos modifications ont bien été appliquées.';
    }
    else {
        echo 'Erreur lors de la modification.';
    }

}

    /**
     * Supprime un ticket via son id
     * @return void
     */
function deleteTicket(){
    
    $dbh = dbConnect("miniProjet", "nassim", "root");


    if(!$_POST['IdTicket']){
        var_dump('Le ticket n\'existe pas ou plus'); 
    }
    else{
        $IdTicket = +$_POST['IdTicket'];
    
        $deleteTicket = "DELETE FROM ticket WHERE id = ? ";
        $data= [$IdTicket];
        try{
            $stmt = $dbh -> prepare($deleteTicket);        
            $stmt -> execute($data);
        }
        catch(Exception $e) {
                //En cas d'erreur :
                echo "Problème lors de la requète" . $e->getMessage();            
        }
        getTickets();
    }
}

    /**
     * Récupère un ticket par son id
     * @return object|null
     */
function getOneTicket(){
   
    $dbh = dbConnect("miniProjet", "root", "");
    $value = "";
   
    if(!$_POST['IdTicket']){
        var_dump('Le ticket n\'existe pas ou plus'); 
    }
    else{
        $IdTicket = +$_POST['IdTicket'];   

        $query = "SELECT * FROM ticket WHERE id = ?";
        $data = [$IdTicket];

        try{
            $stmt = $dbh -> prepare($query);        
            $stmt -> execute($data);
        }
        catch(Exception $e) {
                //En cas d'erreur :
                echo "Problème lors de la requète" . $e->getMessage();            
        }
        $result =  $stmt->fetchObject() ;

        $dateNow = new \DateTime('now');
        $ddn = new \DateTime($result->ddn);
        $YearNow = $dateNow->format('Y');      
        $age = $YearNow - $ddn->format('Y');
        $ddn->modify('this year');

        $thisYear = $dateNow->format('Y');
        $thisMonth = $ddn->format('m');
        $thisDay = $ddn->format('d');
   
         //on crée une date avec +7 jours par rapport à la ddn
        $newDdn = (new \DateTime())->setDate($thisYear, $thisMonth, $thisDay);  
       
        $interval = $dateNow->diff($newDdn)->format("%a");
        
        $num = intval($interval); // on converti la string en int             
           
                //Si c'est le jour anniversaire :
                if( $ddn->format('d') == $dateNow->format('d') ){
                    $value .= '<p> Age : <span class="red">'.$age.' ans</span></p>';
                }
                //Si c'est la semaine qui précède : 
                elseif($num > 0 && $num < 8 &&  $dateNow > $newDdn  )
                {                   
                    $value .= '<p> Age : <span class="yellow">'.$age.' ans</span></p>';
                }  
                
                 //Si c'est la semaine suivante :
                elseif( $num > 0 && $num < 8 &&  $dateNow < $newDdn   ){
                    
                        $value .= '<p> Age : <span class="orange">'.$age.' ans</span></p>';                        
                    
                }else {
                    $value .= '<p class=""> Age : '.$age.' ans</p>';
                }
           
        $nom = htmlspecialchars(ucfirst($result->nom));
        $prenom =  htmlspecialchars(ucfirst($result->prenom));
        $ddn = htmlspecialchars($ddn->format('d-m-Y'));
        $email = htmlspecialchars(strtolower($result->email));
        $telephone = htmlspecialchars($result->telephone);
        $adresse = htmlspecialchars(ucfirst($result->adresse));
       
      
        $value .= ' 
                    
                    <p> Nom : '.($nom).' </p>
                    <p> Prénom :  '.($prenom).' </p>
                    <p> Date de Naissance : '.$ddn.' </p>
                    <p> Email : '.($email).' </p>
                    <p> Téléphone : 0'. $telephone.' </p>
                    <p> Adresse : '.($adresse).' </p>
                    ';            
        
        echo json_encode(['status'=> 'success', 'html'=> $value]);   
         /* return $result;  */
    
    }
}