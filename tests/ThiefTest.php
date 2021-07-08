<?php declare(strict_types=1);

// ThiefTest.php

require_once dirname(__DIR__) . '/lib/character.php';
require_once dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class ThiefTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "thief";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'ne';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "thief";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'ne';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertEquals('thief',    $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetThiefStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "thief";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'ne';
    $character  = new Character($class, $mins, $race, $gender, $alignment);
    
    $this->assertGreaterThanOrEqual(6,   $character->stats['strength']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['intelligence']);
    $this->assertGreaterThanOrEqual(9,   $character->stats['dexterity']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['constitution']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['charisma']);
  }

}
