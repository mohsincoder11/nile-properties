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