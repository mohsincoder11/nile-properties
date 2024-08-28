<?php

namespace App\Providers;

use App\Models\UserActionLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('UserActionLogger', function () {
            return new class {
                public function logAction($action, $entityId = null, $entityType = null, $details = null)
                {
                    $user = Auth::user();

                    $log = new UserActionLog();
                    $log->user_id = $user ? $user->id : null;
                    $log->action = $action;
                    $log->entity_id = $entityId;
                    $log->entity_type = $entityType;
                    $log->details = $details;
                    $log->save();

                    return $log;
                }
            };
        });

        $this->app->singleton('agentProfile', function () {
            return function($level) {
                $profiles = [
                    '1' => 'Assistant Sales Executive',
                    '2' => 'Sales Executive',
                    '3' => 'Senior Sales Executive',
                    '4' => 'Sales Representative',
                    '5' => 'Assistant Sale Representative',
                    '6' => 'Senior Sale Representative',
                    '7' => 'Assistant Manager',
                    '8' => 'Manager',
                    '9' => 'Senior Manager',
                    '10' => 'Director',
                    '11' => 'King'
                ];
                return $profiles[$level] ?? '';
            };
        });
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
