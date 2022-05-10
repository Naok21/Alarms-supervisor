<?php

function dbConnect($dbname, $username, $password){

//    $dbname = "miniprojet";
//    $username = "root";
//    $password = "root";
    try {
        $dbh = new PDO("mysql:host=localhost:3306;dbname=" . $dbname , $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Dans le cas ou la bdd n'est pas crée :
        // $table = "ticket";     
        // $sql="CREATE TABLE IF NOT EXISTS $table(
        //     id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        //     nom varchar(255) NOT NULL ,
        //     prenom varchar(255) NOT NULL ,
        //     dateBirth Date NOT NULL ,
        //     mail varchar(255) NOT NULL UNIQUE,
        //     telephone varchar(255) NOT NULL);     
        //     adresse varchar(255)  NOT NULL  ,";
    
        // $dbh->exec($sql);

    } catch (PDOException $exception) {
        die( "Erreur connexion à la base de données : ". $exception->getMessage() );
    }
    return $dbh;

}

?>
