<?php

namespace App\Providers;

use App\Views\ClothingInstructionComposer;
use App\Views\RegistrationListComposer;
use App\Views\RegistrationProcedureComposer;
use App\Views\ScheduleComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.candidate.candidate', ScheduleComposer::class);
        View::composer('candidate.pages.auth.login', RegistrationListComposer::class);
        View::composer('layouts.candidate.candidate', RegistrationProcedureComposer::class);
        View::composer('layouts.candidate.candidate', ClothingInstructionComposer::class);
    }
}
