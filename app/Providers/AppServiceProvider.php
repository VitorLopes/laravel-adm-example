<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Form::component('bsText', 'admin.components.forms.input-text', ['name', 'value', 'attributes']);
    }

    public function register()
    {

    }
}
