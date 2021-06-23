<?php declare(strict_types=1);

// DruidTest.php

require_once dirname(__DIR__) . '/lib/character.php';
require_once dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class DruidTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "druid";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $mins, $race, $gender, $name);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "druid";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $mins, $race, $gender, $name);

    $this->assertEquals('Sally',    $character->name);
    $this->assertEquals('druid',    $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetDruidStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "druid";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $mins, $race, $gender, $name);
    
    $this->assertGreaterThan(5,   $character->stats['strength']);
    $this->assertGreaterThan(5,   $character->stats['intelligence']);
    $this->assertGreaterThan(11,  $character->stats['wisdom']);
    $this->assertGreaterThan(5,   $character->stats['dexterity']);
    $this->assertGreaterThan(5,   $character->stats['constitution']);
    $this->assertGreaterThan(14,  $character->stats['charisma']);
  }


}
