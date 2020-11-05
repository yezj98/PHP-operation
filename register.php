<?php

require_once '../dboperation.php';

$reponse = array ();

$db = new dbOperation ();

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email']) and isset ($_POST ['password']) and isset ($_POST['username'])) {
        $result = $db ->createUser ($_POST['username'], $_POST['password'], $_POST['email']);

        if ($result == 0) {
            $reponse ['message'] = "Register sucessfully";
            $reponse ['error'] = false;
        }
           
        elseif ($result == 1) {
                $reponse ['message'] = "User existing";
                $reponse ['error'] = true;
        }
        
        elseif ($result == 2) {
                $reponse ['message'] = "Regist failed";
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