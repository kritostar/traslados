<?php 
namespace App\Http\Controllers\Auth;

use Response;
use Spatie\WelcomeNotification\WelcomeController as BaseWelcomeController;

class MyWelcomeController extends BaseWelcomeController
{
    public function sendPasswordSavedResponse(): Response

    {
        return redirect()->route('home');
    }


}