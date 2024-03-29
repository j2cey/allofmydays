<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Repositories\Eloquent\SubjectRepository;
use App\Repositories\Contracts\IUserRepositoryContract;
use App\Repositories\Eloquent\ReportRepositoryContract;
use App\Repositories\Contracts\IReportRepositoryContract;
use App\Repositories\Contracts\ISubjectRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserRepositoryContract::class, UserRepository::class);
        $this->app->bind(ISubjectRepositoryContract::class, SubjectRepository::class);
        $this->app->bind(IReportRepositoryContract::class, ReportRepositoryContract::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Laravel Macros are great way of extending Laravel's core classes and add extra functionality
         * required for our application.
         * It is a way to add somme missing functionality to Laravel's internal component with a piece of code
         * that doesn't exist in the Laravel class.
         *
         * Blueprint is macroable, so we can just define a macro on it in this service provider to get base fields
         */
        Blueprint::macro('baseFields', function () {
            $this->uuid('uuid');
            $this->string('tags')->nullable()->comment('Tags, if any');
            $this->foreignId('status_id')->nullable()
                ->comment('status reference')
                ->constrained('statuses')->onDelete('set null');
            $this->boolean('is_default')->default(false)->comment('determine whether is the default one.');
            $this->timestamps();
        });
        Blueprint::macro('dropBaseForeigns', function () {
            $this->dropForeign(['status_id']);
        });

        JsonResource::withoutWrapping();

        /**
         * tell Laravel that, when the App boots,
         * which is after all other Services are already registered,
         * we are gonna add to the config array our own settings
         */
        config([
            'Settings' => Setting::getAllGrouped()
        ]);

        /*Validator::extend('stepcanexpire_if', function($attribute, $value, $parameters, $validator) {
            $rule = new StepCanExpire($parameters[0]);

            return $rule->passes($attribute, $value);
        });*/
    }
}
