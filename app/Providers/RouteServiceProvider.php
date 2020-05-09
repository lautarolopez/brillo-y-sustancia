<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::macro('localizeAuth', function ($options = []){
            // Authentication Routes...
            Route::get(__('routes.login'), 'Auth\LoginController@showLoginForm')->name('login');
            Route::post(__('routes.login'), 'Auth\LoginController@login');
            Route::post(__('routes.logout'), 'Auth\LoginController@logout')->name('logout');
            // Registration Routes...
            if ($options['register'] ?? true) {
                Route::get(__('routes.register'), 'Auth\RegisterController@showRegistrationForm')->name('register');
                Route::post(__('routes.register'), 'Auth\RegisterController@register');
            }
            // Password Reset Routes...
            if ($options['reset'] ?? true) {
                Route::get(__('routes.password.reset'), 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
                Route::post(__('routes.password.email'), 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
                Route::get(__('routes.password.reset-token'), 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
                Route::post(__('routes.password.reset'), 'Auth\ResetPasswordController@reset')->name('password.update');
            }
            // Email Verification Routes...
            if ($options['verify'] ?? false) {
                Route::get(__('routes.email.verify'), 'Auth\VerificationController@show')->name('verification.notice');
                Route::get(__('routes.email.verify-id'), 'Auth\VerificationController@verify')->name('verification.verify');
                Route::get(__('routes.email.resend'), 'Auth\VerificationController@resend')->name('verification.resend');
            }
        });
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
