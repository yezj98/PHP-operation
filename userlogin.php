<?php

require_once '../dboperation.php';

$reponse = array ();

$db = new dbOperation ();

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email']) and isset ($_POST ['password'])) {
        if ($db ->userLogin ($_POST['email'], $_POST['password'])) {

            $reponse ['message'] = "welcome";
            $reponse ['error'] = false;

        }
        else {
            $reponse ['message'] = "wRONG PASSWORD OR EMAIL";
            $reponse ['error'] = true;
        }

    }
    else {
        $reponse ['message'] = "Request fields are missing";
        $reponse ['error'] = true;

    }
}
else {
    $reponse ['message'] = "The request method should be POST";
    $reponse ['error'] = true;

}

echo json_encode ($reponse);

?>