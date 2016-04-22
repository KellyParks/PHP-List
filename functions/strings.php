<?php

function validateRegForm(){
    
	$usernamePattern = '/[a-zA-Z0-9]+/';
    $emailPattern = '/^[a-zA-Z0-9_.-]+\@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/';
    $passwordPattern = '/[a-zA-Z0-9\W]+/';
    
    if(formWasSubmitted()){
        
        if(empty($_POST['username'])){
            printError("Please enter a username.");
        } else if(!preg_match($usernamePattern, $_POST['username'])){
            printError("Please enter an alphanumeric valid username, without symbols.");
        } else if(empty($_POST['email'])){
            printError("Please enter an email.");
        } else if(!preg_match($emailPattern, $_POST['email'])){
            printError("Please enter a valid email");
        } else if(empty($_POST['password'])){
            printError("Please enter a password.");
        } else if(!preg_match($passwordPattern, $_POST['password'])) {
            printError("Please enter an alphanumeric password, with capitals and symbols.");
        } else {
            //if all inputs pass, store intputs in variables and pass to database function
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            sendRegistrationInfotoDB($username, $email, $password);
            header ('Location: login.php');
            exit();
        }
    }
} 
