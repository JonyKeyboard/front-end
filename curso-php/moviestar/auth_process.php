<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

// Regate do tipo de formulário
$type = filter_input(INPUT_POST, "type");

// Verifica o tipo de formulário
if($type === "register") {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    // Verificar o envio dos dados
    if($name && $lastname && $email && $password) {

    } else {
        // Enviar msg de erro para dados faltantes
        $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }

} else if($type === "login") {

}