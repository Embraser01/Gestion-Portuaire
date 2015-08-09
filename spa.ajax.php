<?php

/*session_start();

if(!isset($_SESSION["email"])) {
    //Erreur
    header('Location: index.php');
}*/



$result = array("error" => 0, "resp" => null);

$error = 0;

if(isset($_POST["req"]) && isset($_POST["res"]) && isset($_POST["ctx"])) {
    
    require('lib/Database/class.Database.php');
    
    $req = trim($_POST["req"]);
    $res = trim($_POST["res"]);
    $ctx = trim($_POST["ctx"]);
    
  
    
    switch($req) {
        
        case "company":
          
            if($res == "create") {
                
                $tab = explode("|", $ctx,3);
                
                $query = "INSERT INTO Personne_CompagnieMaritime (nom,adresse,pays) VALUES('$tab[0]', '$tab[1]', '$tab[2]')";
                
                $stmt  = $db->prepare($query);
                $stmt ->execute();
                
                //sql avec $nom et $pays
                
                //tu fou ça dans $result["resp"]
                
            }
            else if($res == "update") {
                
            }
            else if($res == "select") {
                
                $query = "SELECT * FROM  `Personne_CompagnieMaritime`";
                
                $stmt  = $db->prepare($query);
                $stmt ->execute();
               // $rslt = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
                      $result["resp"][] = $row;
                    //  print $data;
                    }
                
               // print_r($rslt);
              // $result["resp"] = $data;
                
            }
            else if($res == "delete") {
                
            }
            
            
            break;
            
        case "client":
            
            if($res == "create") {
                
                $tab = explode("|", $ctx,3);
                
                $query = "INSERT INTO Personne_Client (nom,adresse,pays) VALUES('$tab[0]', '$tab[1]', '$tab[2]')";
                
                $stmt  = $db->prepare($query);
                $stmt ->execute();
                
                //sql avec $nom et $pays
                
                //tu fou ça dans $result["resp"]
                
            }
            else if($res == "update") {
                
            }
            else if($res == "select") {
                
                $query = "SELECT * FROM  `Personne_Client`";
                
                $stmt  = $db->prepare($query);
                $stmt ->execute();
                $rslt = $stmt->fetch(PDO::FETCH_OBJ);
                
               // print_r($rslt);
                $result["resp"] = $rslt;
                
            }
            else if($res == "delete") {
                
            }
            break;
            
            
        default:
            //$result["error"] = 1;
        
    }
    
    
}

echo json_encode($result);


?>