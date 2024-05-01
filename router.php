<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/dashboard' => 'controllers/dashboard.php',
    '/home' => 'controllers/home.php',
    '/paymentHistory' => 'controllers/payment_history.php',
    '/pendingPayments' => 'controllers/pending_payments.php',
    '/tenants' => 'controllers/tenants.php'
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        // abort();
    }
}

// function abort($code = 404)
// {
//     http_response_code($code);
//     require "views/{$code}.php";
//     die();
// }

routeToController($uri, $routes);