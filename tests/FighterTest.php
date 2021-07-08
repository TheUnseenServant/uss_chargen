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
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'ng';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "fighter";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'ng';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertEquals('fighter',  $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetFighterStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "fighter";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'ng';
    $character  = new Character($class, $mins, $race, $gender, $alignment);
    
    $this->assertGreaterThanOrEqual(9,   $character->stats['strength']);
    $this->assertGreaterThanOrEqual(3,   $character->stats['intelligence']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['wisdom']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['dexterity']);
    $this->assertGreaterThanOrEqual(7,   $character->stats['constitution']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['charisma']);
  }


}
