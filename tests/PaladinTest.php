<?php declare(strict_types=1);

// PaladinTest.php

require_once dirname(__DIR__) . '/lib/character.php';
require_once dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class PaladinTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "paladin";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'lg';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "paladin";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'lg';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertEquals('paladin', $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetAssassinStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "paladin";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'lg';
    $character  = new Character($class, $mins, $race, $gender, $alignment);
    
    $this->assertGreaterThanOrEqual(12,  $character->stats['strength']);
    $this->assertGreaterThanOrEqual(9,   $character->stats['intelligence']);
    $this->assertGreaterThanOrEqual(13,  $character->stats['wisdom']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['dexterity']);
    $this->assertGreaterThanOrEqual(9,   $character->stats['constitution']);
    $this->assertGreaterThanOrEqual(17,  $character->stats['charisma']);
  }


}
