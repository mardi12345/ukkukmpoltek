<?php

if(!isset($_SESSION))
{
    session_start();
}

$base_url = "http://localhost/ukkukmpoltek/";

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'ukkukmpoltek'
) or die(mysqli_error($mysqli));



?>
