<?php

function layout($templateName){
    $templateName = 'templates/' . $templateName . '.php';
    ob_start();
    require $templateName;
    $content = ob_get_clean();
    
    require 'templates/layout.php';
}

layout('registration');