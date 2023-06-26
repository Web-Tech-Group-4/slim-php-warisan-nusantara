<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/createdb.php';
require __DIR__ . '/../config/createtable.php';

$app = AppFactory::create();

// $app->get('/', function (Request $request, Response $response){
//     $response->getBody()->write("Hello World");
//     return $response;
// });

$app->get('/', function (Request $request, Response $response){
    $response->getBody()->write(file_get_contents('../public/nusantara.html'));
    return $response;
});

//routes
// require __DIR__ . '/../routes/routes.php';

$app->run();

?>