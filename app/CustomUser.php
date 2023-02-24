<?php

namespace App;

class CustomUser
{

    public $username = null;
    public $password = null;
    public $userid = null;
    public $firstname = null;
    public $lastname = null;
    public $usertime = 0;
    public $logged = false;

    public function __construct() {
        session_name("formularios-laravel");
        session_start();
    }
    
    /**
     * Verifica si la sesión está iniciada
     *
     * @return bool Sesión iniciada o no
     */
    public function is_logged() {
        if (isset($_SESSION['logged'])) {
            $this->username = $_SESSION['username'];
            $this->firstname = $_SESSION['firstname'];
            $this->lastname = $_SESSION['lastname'];
            $this->userid = $_SESSION['userid'];
            $this->usertime = intval((time() - $_SESSION['usertime']) / 60);
            $this->logged = true;
            return true;
        } else {
            $this->logged = false;
            return false;
        }
    }

    /**
     * Inicia la sesión local para el Usuario.
     */
    public function login() {
        session_destroy();
        session_start();
        $_SESSION['username'] = $this->username;
        $_SESSION['userid'] = $this->userid;
        $_SESSION['firstname'] = $this->firstname;
        $_SESSION['lastname'] = $this->lastname;
        $_SESSION['logged'] = true;
        $_SESSION['usertime'] = time();
        $this->logged = $_SESSION['logged'];
    }

    /**
     * Detiene la sesión local para el Usuario.
     */
    public function logout() {
        $this->logged = false;
        unset($_SESSION["logged"]);
        session_destroy();
    }


}

?>