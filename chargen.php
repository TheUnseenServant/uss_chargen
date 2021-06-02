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
require 'prefs.php';
require 'mins.php';


class Character {

  function __construct($class, $prefs, $mins){
    $this->class  = $class;
    $this->prefs  = $prefs;
    $this->mins   = $mins;
    $this->gen_stats();
    $this->arrange_for_class();
    $this->minimums_for_class();
    $this->finish_stat_assignment();
  }

  var $stats = array("Strength" => 0, "Intelligence" => 0, "Wisdom" => 0,
    "Dexterity" => 0, "Constitution" => 0, "Charisma" => 0);
  var $rolls;
  var $class;

  function gen_stats(){
    // Generate a set of six 3d6 rolls.
    $this->rolls  = array();
    $x      = 0;
    for( $x = 0; $x < 6; $x++) {
      $roll = random_int(1,6) + random_int(1,6) + random_int(1,6);
      array_push($this->rolls, $roll);
    }
    sort($this->rolls);
  }

  function print_character(){
    // The end product.   
    foreach ( $this->stats as $s => $s_value ){
      echo $s . ":  " . $s_value . "\n";;
    }
    echo "\n";
  }

  function arrange_for_class(){
    // Character classes have preferred stats. The prefs array lists them in
    //  order of preference, and the array_pop takes the last (highest) 
    //  value and assigns it.
    foreach ( $this->prefs[$this->class] as $p ){
      $this->stats[$p] = array_pop($this->rolls);
    }
  }

  function minimums_for_class(){
    // Certain character classes have minimum stats.
    // Since this character is of the class, they must have at least
    //  the minimum.
    foreach ( $this->mins[$this->class] as $m => $m_value ){
      $this->stats[$m] = max( $this->stats[$m], $m_value);
    } 
  }

  function finish_stat_assignment(){
    // Randomly assign the rest of the stats.
    shuffle($this->rolls);
    foreach ( $this->stats as $s => $s_value ){
      if ( $s_value == 0 ){
        $this->stats[$s] = array_pop($this->rolls);
      } 
    }
  }

}
 
// Main

$class      = "Paladin";
$character  = new Character($class, $prefs, $mins);
$character->print_character();

?>

