<?php

namespace App\Views;

use App\Models\RegistrationProcedure;
use Illuminate\View\View;

class RegistrationProcedureComposer
{
    public function compose(View $view)
    {
        $procedure = RegistrationProcedure::first();

        $view->with('procedure', $procedure);
    }
}
