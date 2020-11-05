<?php

require_once '../location.php';

$reponse = array ();

$location = new location ();

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['id']) and isset ($_POST ['latitude']) and isset ($_POST['longitude'])) {

        if ($location ->storeLocation ($_POST['id'], $_POST['latitude'], $_POST['longitude'])) {
            
            $reponse ['message'] = "Store location succesfully";
            $reponse ['error'] = false;
            $reponse ['latitude'] = $_POST ['latitude'];
            $reponse ['longitude'] = $_POST ['longitude'];
        }
        
        else  {
            $reponse ['message'] = "Store location fail";
            $reponse ['error'] = true;
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