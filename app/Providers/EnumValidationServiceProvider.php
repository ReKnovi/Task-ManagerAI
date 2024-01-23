<?php
// app/Providers/EnumValidationServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class EnumValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('enum', function ($attribute, $value, $parameters, $validator) {
            return in_array($value, ['pending', 'ongoing', 'completed']);
        });
    }
}

