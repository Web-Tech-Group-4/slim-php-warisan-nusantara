<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    $app = AppFactory::create();

    $app->get('/all', function (Request $request, Response $response){
        $sql = 'SELECT * FROM nusantara';

        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn -> query($sql);
            $nusantara = $stmt -> fetchAll(PDO::FETCH_OBJ);

            $db = null;
            $response->getBody()->write(json_encode($nusantara));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (PDOException $e){
            $error = array(
                "message" => $e -> getMessage()
            );

            $response->getBody()->write(json_encode($error));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(500);
        }
    });