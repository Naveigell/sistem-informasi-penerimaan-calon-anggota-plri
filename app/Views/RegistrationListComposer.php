<?php

namespace App\Views;

use App\Models\Registration;
use Illuminate\View\View;

class RegistrationListComposer
{
    public function compose(View $view)
    {
        $registrations = Registration::all();

        $view->with('registrations', $registrations);
    }
}
