<?php

// name:    chargen.php
// version: 0.0.2
// date:    20210604
// author:  Leam Hall
// desc:    Generate an NPC that meets class and racial minimums.

// NOTES:
//  1. Run via CLI:   php chargen.php
//


// Data structures
require 'prefs.php';
require 'mins.php';
require 'character.php';

 
// Main

$class      = "Paladin";
$mode       = 'short';  // $mode can currently be 'full' or 'short'
$name       = "Sally";
$race       = 'human';
$gender     = 'female';
$character  = new Character($class, $prefs, $mins, $race, $gender, $name);
$character->print_character($mode);

?>

