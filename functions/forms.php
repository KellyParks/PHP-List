<?php

function formWasSubmitted(){
    return !empty($_POST);
}

function submittedValue($field){
    
  if(formWasSubmitted()) {
    return htmlspecialchars($_POST[$field]);
  }
  return '';
}

function printError($errors){
    echo '<span class="error">' . $errors . '</span><br>';
}

function areLoginFieldsCompleted(){
    
    if(formWasSubmitted()){

        $enteredEmail = $_POST['email'];
        $enteredPassword = $_POST['password'];

        if($enteredEmail == ""){
            printError("Please enter an email.");
        } else if($enteredPassword == ""){
            printError("Please enter a password.");
        } else {
            compaireLoginInfotoDB($enteredEmail, $enteredPassword);
        }

    }

}

function isUserLoggedIn(){

    // Check if user is NOT logged in, redirect to login page
    if(empty($_SESSION['user_id'])){
        header("location: login.php");
        die;
    } else {
    // If user IS signed in, display content related to user
    showContentRelatedToUserID();
    }

}

function validateMainForm(){

    if(formWasSubmitted()){
        if(empty($_POST['item'])){
            printError("Please enter something.");
        } else {
            sendNewUserContentToDB();
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }

    }

}
