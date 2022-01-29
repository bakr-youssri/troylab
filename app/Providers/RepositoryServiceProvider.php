<?php

namespace App\Providers;

use App\Http\Controllers\Api\SchoolController as ApiSchoolController;
use App\Http\Controllers\Api\StudentController as ApiStudentController;
use App\Repositories\BaseCrudRepositoryInterface;
use App\Http\Controllers\SchoolController;
use App\Repositories\Schools\SchoolRepository;
use App\Http\Controllers\StudentController;
use App\Repositories\Students\StudentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Elquent
        $this->app->when(SchoolController::class)->needs(BaseCrudRepositoryInterface::class)->give(SchoolRepository::class);
        $this->app->when(StudentController::class)->needs(BaseCrudRepositoryInterface::class)->give(StudentRepository::class);
        
        //Api
        $this->app->when(ApiSchoolController::class)->needs(BaseCrudRepositoryInterface::class)->give(SchoolRepository::class);
        $this->app->when(ApiStudentController::class)->needs(BaseCrudRepositoryInterface::class)->give(StudentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
