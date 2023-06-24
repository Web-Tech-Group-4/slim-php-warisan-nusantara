<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/../config/db.php';

    $app = AppFactory::create();

    $app->get('/all', function (Request $request, Response $response){
        $sql = 'SELECT * FROM koleksi';

        try{
            $db = new db();
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

    //get based on category
    $app->get('/category/{category}', function (Request $request, Response $response, $args){
        $category = $args['category'];

        $sql = "SELECT * FROM nusantara WHERE kategori = :category";

        try{
            $db = new db();
            $conn = $db->connect();

            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(':category', $category);

            $stmt -> execute();

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

    //add item
    $app->post('/add', function (Request $request, Response $response){
        $nama = $request->getParsedBody()['nama'];
        $kategori = $request->getParsedBody()['kategori'];
        $descript = $request->getParsedBody()['descript'];
        $date = $request->getParsedBody()['date'];
        $gambar = $request->getParsedBody()['gambar'];

        $sql = "INSERT INTO nusantara (nama, kategori, descript, date, gambar) VALUES (:nama, :kategori, :descript, :date, :gambar)";

        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(':nama', $nama);
            $stmt -> bindParam(':kategori', $kategori);
            $stmt -> bindParam(':descript', $descript);
            $stmt -> bindParam(':date', $date);
            $stmt -> bindParam(':gambar', $gambar);

            $stmt -> execute();

            $db = null;
            $response->getBody()->write(json_encode(array("message" => "Item added")));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
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

    //delete
    $app->delete('/delete/{id}', function (Request $request, Response $response, $args){
        $id = $args['id'];

        $sql = "DELETE FROM nusantara WHERE id = :id";

        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(':id', $id);

            $stmt -> execute();

            $db = null;
            $response->getBody()->write(json_encode(array("message" => "Item deleted")));
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

    //update
    $app->put('/update/{id}', function (Request $request, Response $response, $args){
        $id = $args['id'];

        $nama = $request->getParsedBody()['nama'];
        $kategori = $request->getParsedBody()['kategori'];
        $descript = $request->getParsedBody()['descript'];
        $date = $request->getParsedBody()['date'];
        $gambar = $request->getParsedBody()['gambar'];

        $sql = "UPDATE nusantara SET nama = :nama, kategori = :kategori, descript = :descript, date = :date, gambar = :gambar WHERE id = :id";

        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(':nama', $nama);
            $stmt -> bindParam(':kategori', $kategori);
            $stmt -> bindParam(':descript', $descript);
            $stmt -> bindParam(':date', $date);
            $stmt -> bindParam(':gambar', $gambar);
            $stmt -> bindParam(':id', $id);

            $stmt -> execute();

            $db = null;
            $response->getBody()->write(json_encode(array("message" => "Item updated")));
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