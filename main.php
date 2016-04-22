<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

require_once 'functions/forms.php';
require_once 'functions/output.php';
require_once 'functions/database.php';

isUserLoggedIn();
$errors = validateMainForm();
layout('main', $errors);