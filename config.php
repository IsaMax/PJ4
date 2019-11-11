<?php

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '438837093291647',
  'app_secret'     => '501bf3c52c5b506fb1f01d3f6180b818',
  'default_graph_version'  => 'v4.0'
]);

?>
