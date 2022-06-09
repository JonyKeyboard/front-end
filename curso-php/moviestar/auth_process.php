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

// Verifica o tipo de formulário
if($type === "register") {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    // Verificar o envio dos dados
    if($name && $lastname && $email && $password) {

        if($password === $confirmpassword) {
            // Verificar se o email já tem cadastro
            if($userDao->findByEmail($email) === false) {
                
                $user = new User();

                // Criação de token e senha
                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword($password);

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->password = $finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDao->create($user, $auth);

            } else {
                // Enviar msg de erro para usuario já existe
                $message->setMessage("Usuário já cadastrado, tente outro email.", "error", "back");
            }

        } else {
             // Enviar msg de erro para confirmação de senha
            $message->setMessage("As senhas não são iguais.", "error", "back");
        }

    } else {
        // Enviar msg de erro para dados faltantes
        $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
    }

} else if($type === "login") {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    // Tenta autenticar usuário
    if($userDao->authenticateUser($email, $password)){

        // Redireciona o usuário, caso não conseguir autenticar
        $message->setMessage("Seja bem-vindo!", "success", "/editprofile.php");
    
    } else {

        $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");

    }

} else {

    $message->setMessage("Informações inválidas!", "error", "/index.php");

}