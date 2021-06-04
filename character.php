<?php

// name:    character.php
// version: 0.0.1
// date:    20210604
// author:  Leam Hall
// desc:    NPC class that meets game class and racial minimums.

// NOTES:


class Character {

  function __construct($class, $prefs, $mins, $race, $gender, $name){
    $this->class  = $class;
    $this->prefs  = $prefs;
    $this->mins   = $mins;
    $this->race   = $race;
    $this->gender = $gender;
    $this->name   = $name;
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

  function print_character($mode = 'full'){
    // The end product.   
    $newline = "\n";
    if ( $mode == 'short' ){
      $spacer   = "   ";
    } elseif ( $mode == 'full' ){
      $spacer   = "\n";
    }
    $_class   = ucfirst($this->class);
    $_race    = ucfirst($this->race);
    $_gender  = ucfirst($this->gender); 
    echo "$this->name, $_race $_gender $_class $newline"; 
    foreach ( $this->stats as $s => $s_value ){
      echo $s . ":  " . $s_value . $spacer;
    }
    echo $newline;
  }

  function arrange_for_class(){
    // Character classes have preferred stats. The prefs array lists them in
    //  order of preference, and the array_pop takes the last (highest) 
    //  value and assigns it.
    if ( isset($this->prefs[$this->class])){
      foreach ( $this->prefs[$this->class] as $p ){
        $this->stats[$p] = array_pop($this->rolls);
      }
    }
  }

  function minimums_for_class(){
    // Certain character classes have minimum stats.
    // Since this character is of the class, they must have at least
    //  the minimum.
    if ( isset( $this->mins[$this->class] )){
      foreach ( $this->mins[$this->class] as $m => $m_value ){
        $this->stats[$m] = max( $this->stats[$m], $m_value);
      } 
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

?>

