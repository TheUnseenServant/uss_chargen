<?php

// name:    character.php
// version: 0.0.1
// date:    20210604
// author:  Leam Hall
// desc:    NPC class that meets game class and racial minimums.

// NOTES:


class Character {

  function __construct( $class, $mins, $race, $gender, $alignment ){
    $this->class      = $class;
    $this->mins       = $mins;
    $this->race       = $race;
    $this->gender     = $gender;
    $this->alignment  = $alignment;
    $this->gen_name();
    $this->gen_stats();
    $this->arrange_for_class();
    $this->racial_mods();
    $this->minimums_for_class();
    $this->validate_alignment();
    $this->finish_stat_assignment();
  }

  var $stats = array("strength" => 0, "intelligence" => 0, "wisdom" => 0,
    "dexterity" => 0, "constitution" => 0, "charisma" => 0);
  var $rolls;
  var $class;

  function gen_name(){
    require 'names.php';
    $name_list  = $names[$this->race][$this->gender];
    $this->name       = $name_list[array_rand($name_list)];
  }

  function racial_mods(){
    require 'racial.php';
    if ( isset( $racial[$this->race] )){
      foreach ( $this->stats as $s => $s_value ){
        if ( isset( $racial[$this->race][$s] )){
          $this->stats[$s] += $racial[$this->race][$s];
        }
      }
    }
  }

  function validate_alignment(){
    require 'alignment.php';
    if ( ! isset($alignments[$this->class] )){
      $this->alignment = 'tn';
    } elseif ( ! in_array($this->alignment, $alignments[$this->class] ) ){
      $this->alignment = $alignments[$this->class][array_rand($alignments[$this->class])];
    }

  }

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
    $newline  = "\n";
    $break    = "<br>";
    $_class   = ucfirst($this->class);
    $_race    = ucfirst($this->race);
    $_gender  = ucfirst($this->gender); 
    $_align   = strtoupper($this->alignment);
    
    echo "$this->name $break $_race $_gender $_align $_class $break"; 
    foreach ( $this->stats as $s => $s_value ){
      echo $break . "<b>" . ucfirst($s) . "</b>    " . $s_value ;
    }
    echo $break;
  }

  function arrange_for_class(){
    // Character classes have preferred stats. The prefs array lists them in
    //  order of preference, and the array_pop takes the last (highest) 
    //  value and assigns it.

    // Skip out if using a class not defined in mins.php.
    if ( ! isset($this->mins[$this->class] )){
      return;
    }

    // $prefs are the preferred stats, in descending order of preference.
    $prefs        = array();
    // $prefs_groups are the groups of stats that have the same minimum.
    $prefs_groups = array();

    // Look through all minimums.
    foreach ( $this->mins[$this->class] as $m => $m_value ){
      // Converting the number to a string, as PHP chokes on numeric hash keys.
      $m_value_str = strval($m_value);
      // Make the value an array, if it doesn't exist.
      if ( ! isset( $prefs_groups[$m_value_str] )){
        $prefs_groups[$m_value_str] = [];
      }
      // Push the stat onto the array.
      array_push($prefs_groups[$m_value_str], $m);
    }
    
    $prefs_keys = array_keys($prefs_groups);

    // Go highest to lowest
    rsort($prefs_keys);
    foreach ( $prefs_keys as $k ){

      // If several stats have the same minumum, shuffle the list.
      if ( count($prefs_groups[$k]) > 1 ){
        shuffle($prefs_groups[$k]);
      }

      // Put the stat onto the $prefs array.
      foreach ( $prefs_groups[$k] as $v ){
        array_push($prefs, $v);
      }
    }

    // Finally! $prefs is a sorted high to low of stats.
    // Assign highest stat rolls to highest preferences, 
    //  each in turn.
    // This way, if there are adjustments required for minimums,
    //  the most minimial change should be done.
    foreach ( $prefs as $p ){
      $this->stats[$p] = array_pop($this->rolls);
    }
    foreach ( array_keys($this->stats) as $s ){
      if ( $this->stats[$s] == 0 ){
        $this->stats[$s] = array_pop($this->rolls);
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

