<?php

require_once '../db/location.php';

$reponse = array ();

$location = new location ();

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['id']) and isset ($_POST ['latitude']) and isset ($_POST['longitude'])) {

        //If the data is not null then overwrite    
        
        $result = $location -> overWrite ($_POST['id'], $_POST['latitude'], $_POST['longitude']); 

            if ($result == 0) {
                
                $reponse ['message'] = "location update successfully";
                $reponse ['error'] = false;
                $reponse ['latitude'] = $_POST ['latitude'];
                $reponse ['longitude'] = $_POST ['longitude'];
            }
            
            elseif ($result == 1) {

                if ($location ->storeLocation ($_POST['id'], $_POST['latitude'], $_POST['longitude'])) {
                    $reponse ['message'] = "Store location succesfully";
                    $reponse ['error'] = false;
                    $reponse ['latitude'] = $_POST ['latitude'];
                    $reponse ['longitude'] = $_POST ['longitude'];
                }
                
                else {
                    $reponse ['error'] = true;
                    $reponse ['message'] = "Fields are missing";
                }
            }

            elseif ($result == 2) {
                $reponse ['error'] = true;
                $reponse ['message'] = 'error';
            }


    }
    else {
        $reponse ['message'] = "Require fields are missing";
        $reponse ['error'] = true;

    }
}
else {
    $reponse ['message'] = "The request method should be POST";
    $reponse ['error'] = true;
}

echo json_encode ($reponse);

?>