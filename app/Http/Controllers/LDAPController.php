<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomUser;

class LDAPController extends Controller
{

    public function login(){

        return view('login');

    }

    public function log_user(){

        $user = new CustomUser();
        if ($user->is_logged()) {
            echo "loggeado";
        }
        else {
            echo "no loggeado";
        }
        $user->username = "newton@forumsys.com";
        $user->password = "password";
        $user->userid = 1;
        $user->firstname = "Isaac";
        $user->lastname = "Newton";
        $user->usertime = 0;
        $user->login();



    }
}