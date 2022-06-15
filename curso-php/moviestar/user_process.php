<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

// Regate do tipo de formulário
$type = filter_input(INPUT_POST, "type");

// Atualizar usuario
if($type === "update") {

    $userData = $userDao->verifyToken();

    // Receber dados do post
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");

    // Criar novo objeto de usuário
    //$user = new User();

    // preencher dados do usuario
    $userData->name = $name;
    $userData->lastname = $lastname;
    $userData->email = $email;
    $userData->bio = $bio;

    $userDao->update($userData);

// Atualizar senha do usuário
} else if($type === "changepassword") {

} else {
    $message->setMessage("Informações inválidas!", "error", "/index.php");
}