<?php

// name:    village.php
// version: 0.0.1
// date:    20210604
// author:  Leam Hall
// desc:    Generate a village NPCs.

// NOTES:
//  1. Run via CLI:   php vilage.php
//

require 'lib/mins.php';
require 'lib/character.php';
require 'lib/names.php';

// Main
$mode = 'short';

$jobs = array( "Barkeep", "Farrier", "Stablehand", "Mayor", "Priest", "Boarding house owner", "Town drunk");
$races  = array("human", "dwarf");
$genders  = array("male", "female");

foreach ( $jobs as $job){
  $class      = $job;
  $race       = $races[array_rand($races)];
  $gender     = $genders[array_rand($genders)];
  $name_list  = $names[$race][$gender];
  $name       = $name_list[array_rand($name_list)];
  $character  = new Character($class, $mins, $race, $gender, $name);
  $character->print_character($mode);
  echo "\n";
}
