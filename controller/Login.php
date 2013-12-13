<?php

namespace controller;

use dao\MySqlDao;

class Login {

    public function action() {
        $dao = new MysqlDao(); 
        if(isset($_SESSION['login_error'])){
            unset($_SESSION['login_error']);
        }
        $messages_login = array();
//        var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $messages_login = array();
            if (!isset($_POST['login']) || $_POST['login'] == "" ) {
                $messages_login['login'] = "Login requiered.";
            } else {
                $login = htmlentities($_POST['login']);
            }
            if (!isset($_POST['password']) || $_POST['password'] == "" ) {
                $messages_login['password'] = "Password requiered.";
            } else {
                $mot_de_passe = htmlentities($_POST['password']);
            }

            if (count($messages_login) == 0) {

                if (!$dao->checkLoginPassword($login, $mot_de_passe)) {
                    $messages_login['connexion'] = "Login ou password incorrect.";
                    $_SESSION['login_error'] = $messages_login;
//                    var_dump(array($login, sha1($mot_de_passe)));die();
                    header('location:/Accueil');
                } else {
                    $user =$dao->checkLoginPassword($login, $mot_de_passe);
                    $_SESSION['user'] = $user;
                    $_SESSION['auth_level'] = $user->getNiveau();
//                    include VIEW . "message_connexion.php";
//                    var_dump($_SESSION);die();
                    header('location:/BackOffice');//TODO heder backEnd
                }
            } else {
               $_SESSION['login_error'] = $messages_login;
               header('location:/Accueil');
            }
        } else {
            $_SESSION['login_error'] = $messages_login;
            header('location:/Accueil');
//            var_dump($_SESSION);//test
        }
    }

    public function deconnect() {
//        unset($_SESSION);
        session_destroy();
        header('location:/Accueil');
    }

}

?>
