<?php

use Geraldo\CepDigital\Search;

  require_once "vendor/autoload.php";

  $get = new Search();

  $res = $get->getAddress('55870000');

  print_r($res);