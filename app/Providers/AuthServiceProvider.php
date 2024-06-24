<?php

namespace App\Providers;

use App\Models\WorkoutType;
use App\Models\Exercise;
use App\Policies\ExercisePolicy;
use App\Policies\WorkoutTypePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
 
    protected $policies = [
        WorkoutType::class => WorkoutTypePolicy::class,
        Exercise::class => ExercisePolicy::class,
        
    ];

    

    
    public function boot()
    {
        $this->registerPolicies();
    }
}


