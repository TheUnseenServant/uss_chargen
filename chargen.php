<?php

// name:    chargen.php
// version: 0.0.1
// date:    20210601
// author:  Leam Hall
// desc:    Generate an NPC that meets class and racial minimums.

// NOTES:
//  1. Run via CLI:   php chargen.php
//


// Data structures
$prefs = array(
  "Cleric"    => array("Wisdom"),
  "Paladin"   => array("Charisma", "Wisdom", "Strength"),
  "Thief"     => array("Dexterity"),
  );

$mins = array(
  "Paladin"   => array("Charisma" => 17, "Wisdom" => 12, "Strength" => 12),
  "Cleric"    => array("Wisdom" => 9),
);

$character    = array( 
  "Stats" => array("Strength" => 0, "Intelligence" => 0, "Wisdom" => 0,
    "Dexterity" => 0, "Constitution" => 0, "Charisma" => 0),
  "Rolls" =>  gen_stats(),
);


// Functions

function gen_stats(){
  // Generate a set of six 3d6 rolls.
  $stats  = array();
  $x      = 0;
  for( $x = 0; $x < 6; $x++) {
    $roll = random_int(1,6) + random_int(1,6) + random_int(1,6);
    array_push($stats, $roll);
  }
  sort($stats);
  return $stats;
}

function print_character($character){
  // The end product.   
  foreach ( $character['Stats'] as $s => $s_value ){
    echo $s . ":  " . $s_value . "\n";;
  }
  echo "\n";
}

function arrange_for_class($character, $prefs, $class){
  // Character classes have preferred stats. The prefs array lists them in
  //  order of preference, and the array_pop takes the last (highest) 
  //  value and assigns it.
  foreach ( $prefs[$class] as $p ){
    $character['Stats'][$p] = array_pop($character['Rolls']);
  }
  return $character; 
}

function minimums_for_class($character, $mins, $class){
  // Certain character classes have minimum stats.
  // Since this character is of the class, they must have at least
  //  the minimum.
  foreach ( $mins[$class] as $m => $m_value ){
    $character['Stats'][$m] = max( $character['Stats'][$m], $m_value);
  } 
  return $character;
}

function finish_stat_assignment($character){
  // Randomly assign the rest of the stats.
  shuffle($character['Rolls']);
  foreach ( $character['Stats'] as $s => $s_value ){
    if ( $s_value == 0 ){
      $character['Stats'][$s] = array_pop($character['Rolls']);
    } 
  }
  return $character;
}

 
// Main

$class      = "Paladin";
$character  = arrange_for_class($character, $prefs, $class);
$character  = minimums_for_class($character, $mins, $class);
$character  = finish_stat_assignment($character);
print_character($character);

?>

