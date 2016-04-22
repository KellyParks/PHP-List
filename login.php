<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once 'functions/forms.php';
require_once 'functions/output.php';
require_once 'functions/database.php';

$errors = areLoginFieldsCompleted();
layout('login', $errors);