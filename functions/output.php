<?php

function layout($templateName, $errors = ''){
  $templateName = 'templates/'.$templateName.'.php';
  ob_start();
  require $templateName;
  $content = ob_get_clean();

  require 'templates/layout.php';
}
