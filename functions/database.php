<?php

function getDbConnection() {
  $host = ''; 
  $user = '';
  $pass = '';
  $dbName = '';

  $db = new mysqli(
    $host,
    $user,
    $pass,
    $dbName
  );

  return $db;
}

function sendRegistrationInfotoDB($username, $email, $password){
    $db = getDbConnection();
    $db->query(
        "INSERT INTO `dbName`.`users`
        (`user_id`, `username`, `email`, `password`) 
        VALUES 
        (NULL, '$username', '$email', '$password')"
    );
}

function compaireLoginInfotoDB($enteredEmail, $enteredPassword){

    $db = getDbConnection();
    $sql = "SELECT * FROM users WHERE email ='" . $enteredEmail . "'";
    $result = $db->query($sql);

    $userInfo = $result->fetch_assoc();

    $hash = $userInfo['password'];

    if(empty($userInfo)){
        printError("That email does not match our records. Please try again.");
    } else if(!password_verify($enteredPassword, $hash)){
        printError("Wrong password.");
    } else {
        session_start();
        $_SESSION['username'] = $userInfo['username'];
        $_SESSION['user_id'] = $userInfo['user_id'];
        header('Location: main.php');
        exit();
    }

}

function showContentRelatedToUserID(){

    $db = getDbConnection();
    $sql = "SELECT item FROM items WHERE user_id = '" . $_SESSION['user_id'] . "'";
    $result = $db->query($sql);
    $userContent = array();

    while($row = $result->fetch_assoc()){
        $userContent[] = $row;
    }

    return $userContent;
}

function sendNewUserContentToDB(){
    $db = getDbConnection();
    $db->query(
        "INSERT INTO `items`
        (`id`, `user_id`, `content`) 
        VALUES 
        (NULL, '" . $_SESSION['user_id'] . "', '" . $_POST['item'] . "')"
    );
}
