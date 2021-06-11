<!DOCTYPE HTML>
<link rel="stylesheet" href="lib/usschargen.css">
<html>
<body>
<!-- <img src="images/background3.jpg"> -->

<?php
  require 'lib/prefs.php';
  require 'lib/mins.php';
  require 'lib/names.php';
  require 'lib/character.php';
 
  if ( isset($_POST['class']) ){ 
    
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $class      = $_POST['class'];
    $gender     = $_POST['gender'];
    $race       = $_POST['race'];
    $name_list  = $names[$race][$gender];
    $name       = $name_list[array_rand($name_list)];
    $character  = new Character($class, $prefs, $mins, $race, $gender, $name);
    $character->print_character($mode);

    echo "<hr>";
  };

  require 'lib/form.html';
?>
