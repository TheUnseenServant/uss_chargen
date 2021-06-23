<?php declare(strict_types=1);

// FighterTest.php

require_once dirname(__DIR__) . '/lib/character.php';
require_once dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class FighterTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "fighter";
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
    $class      = "fighter";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $mins, $race, $gender, $name);

    $this->assertEquals('Sally',    $character->name);
    $this->assertEquals('fighter',  $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetFighterStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "fighter";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $mins, $race, $gender, $name);
    
    $this->assertGreaterThan(8,   $character->stats['strength']);
    $this->assertGreaterThan(2,   $character->stats['intelligence']);
    $this->assertGreaterThan(5,   $character->stats['wisdom']);
    $this->assertGreaterThan(5,   $character->stats['dexterity']);
    $this->assertGreaterThan(6,   $character->stats['constitution']);
    $this->assertGreaterThan(5,   $character->stats['charisma']);
  }


}
