<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Movie.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$movieDao = new MovieDAO($conn, $BASE_URL);

// Regate do tipo de formulário
$type = filter_input(INPUT_POST, "type");

$userData = $userDao->verifyToken();

if($type === "create"){

    // Receber os dados dos inputs
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $trailer = filter_input(INPUT_POST, "trailer");
    $category = filter_input(INPUT_POST, "category");
    $length = filter_input(INPUT_POST, "length");

    $movie = new Movie();

    // Validação mínima dos dados
    if(!empty($title) && !empty($description) && !empty($category)) {

        $movie->title = $title;
        $movie->description = $description;
        $movie->trailer = $trailer;
        $movie->category = $category;
        $movie->length = $length;
        $movie->users_id = $userData->id;

        // Upload da imagem
        if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])){

            $image = $_FILES["image"];
            $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
            $jpgArray = ["image/jpeg", "image/jpg"];
            
            // Checando tipo da imagem
            if(in_array($image["type"], $imageTypes)) {

                // Checa se imagem é jpg
                if(in_array($image["type"], $jpgArray)){
                    $imageFile = imagecreatefromjpeg($image["tmp_name"]);
                } else {
                    $imageFile = imagecreatefrompng($image["tmp_name"]);
                }

                // Gerando nome da imagem
                $imageName = $movie->imageGenerateName();

                imagejpeg($imageFile, "./img/movies/". $imageName, 100);

                $movie->image = $imageName;

            } else {
                $message->setMessage("Tipo de imagem inválida, insira png ou jpg!", "error", "back");
            }
        }

        //print_r($_POST);print_r($_FILES);exit;

        $movieDao->create($movie);

    } else {
        $message->setMessage("Adicione : título, descrição e categoria!", "error", "back");
    }

} else if($type === "delete") {

    // Recebe os dados do form
    $id = filter_input(INPUT_POST, "id");

    $movie = $movieDao->findById($id);

    if($movie) {

        // Verifica se o filme é do user
        if($movie->users_id === $userData->id) {
            
            $movieDao->destroy($movie->id);

        } else {

            $message->setMessage("Informações inválidas!", "error", "/index.php");
        
        }

    } else {
        $message->setMessage("Informações inválidas!", "error", "/index.php");
    }
    
} else {

    $message->setMessage("Informações inválidas!", "error", "/index.php");

}