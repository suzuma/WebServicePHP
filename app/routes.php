<?php
/* Controllers */
$router->controller('/home', 'App\\Controllers\\HomeController');
$router->controller('/auth', 'App\\Controllers\\AuthController');


$router->get('/', function(){
    if(!\Core\Auth::isLoggedIn()){
        \App\Helpers\UrlHelper::redirect('auth');
    } else {
        \App\Helpers\UrlHelper::redirect('home');
    }
});

$router->get('/welcome', function(){
    return 'Welcome page';
}, ['before' => 'auth']);

$router->get('/test', function(){
    return 'Welcome page';
}, ['before' => 'auth']);