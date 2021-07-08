<?php declare(strict_types=1);

// AssassinTest.php

require_once dirname(__DIR__) . '/lib/character.php';
require_once dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class AssassinTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "assassin";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'le';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "assassin";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'le';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertEquals('assassin', $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetAssassinStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "assassin";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'le';
    $character  = new Character($class, $mins, $race, $gender, $alignment);
    
    $this->assertGreaterThanOrEqual(12,  $character->stats['strength']);
    $this->assertGreaterThanOrEqual(11,  $character->stats['intelligence']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['wisdom']);
    $this->assertGreaterThanOrEqual(12,  $character->stats['dexterity']);
    $this->assertGreaterThanOrEqual(6,   $character->stats['constitution']);
  }


}
