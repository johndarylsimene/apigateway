<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();
$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->middleware([
    App\Http\Middleware\AuthenticateAccess::class
]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;


//eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNmNjk3NmI1MjI1OTU2OWZiNmJmZDUxZjlhM2M2ODJlMmRiYmY4ZjFhYjc3ZTIwYzk3Mjc4ZWJiNmU3YmViOWYzMzY3YWZkZmZkNDdkMGI2In0.eyJhdWQiOiI0IiwianRpIjoiY2Y2OTc2YjUyMjU5NTY5ZmI2YmZkNTFmOWEzYzY4MmUyZGJiZjhmMWFiNzdlMjBjOTcyNzhlYmI2ZTdiZWI5ZjMzNjdhZmRmZmQ0N2QwYjYiLCJpYXQiOjE2MDc1OTU3MzUsIm5iZiI6MTYwNzU5NTczNSwiZXhwIjoxNjM5MTMxNzM0LCJzdWIiOiIiLCJzY29wZXMiOltdfQ.hbKvTQ2GAjgtAVJMghYI_aSp4PSqzKLIYU3tKEXJBWAAoECt4GbZ0qzKWywFvtJzsEAGX0kxzNjDvDUQWJxCkA3ykE52jnOA1ziwVV0jR94ojp_xiYtlCEMEr7cDjjn5VW0NJ9aGqO199v0zlwpbHj3OD0TY0dFqxSfsu_B8qqgZnkmUurM_BaH5BfuSW_-FH-gjTy9gJXgJB5e134vxEXU23Gu4hY-HjZVVx0Mu6v_sQGbkcfSn_mne9PIwb_XPIs_25IDDuGvKHd39KeikgXEeN_NN49Iywg4mvaJ_oJViOPIQpvVFRNDEM0SM8zaBpJtWRCqAk5e9PGAjs1AeRGb8bAJAdTM8z9ntdJEm7IFKrmI9po5ikncvBUxDsVyUwkZi5X_LNyx1pTYeC363g9_DjpEe5wunRibCwS31XsaFNmb6s1NyjjDgYvr-ENBbJCJuoGqcUqWFHJY8PER7rAE_NEXYyk5rmija7yAiaiXvoxUiTuPNdI9LKus43YeSMSSmsvzKXqOf6rMnYgpq0FOD9Wi-KUEmMlVyBLRz42MQ8ayFZU1qvOwboT2hVzjra9KAmkRFde0Q6WvdqGwIER5DDD_7SKFH_wn11Yd0LlHMieTByedmOoWxayZ7SKuh4U0Ak1_uTE4nN62ylUsqluBHE0rsbDX7P-acoywkLio